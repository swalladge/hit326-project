<?php
namespace App\Utils;

use Cake\ORM\TableRegistry;
use Cake\Log\Log;
use Cake\Datasource\ConnectionManager;


class BookingUtils
{

    // separate function to validate a booking date
    // here so that admins can manually save without fighting the system, but
    // users are blocked from booking when overlap
    public static function validateBookingDates($booking, $equipment)
    {
        $Bookings = TableRegistry::get('Bookings');
        $ClosedTimes = TableRegistry::get('ClosedTimes');
        $WeeklyClosedTimes = TableRegistry::get('WeeklyClosedTimes');
        $connection = ConnectionManager::get('default');

        $equipment_id = $booking->equipment_id;
        $start = $booking->start_date;
        $end = $booking->end_date;

        // overlap with another booking
        $overlaps = $connection->execute('
            select * from bookings
            where (equipment_id = :equipment_id)
            and ((start_date >= :start and start_date < :end)
                 or (end_date > :start and end_date <= :end)
                 or (start_date <= :start and end_date >= :end)
                )
            and (state != \'rejected\')
            ', ['equipment_id' => $equipment_id, 'start' => $start, 'end' => $end])->fetchAll('assoc');

        // only valid if there are more of this equipment available than bookings for it
        $quantity = $equipment->quantity;
        if (count($overlaps) >= $quantity) {
            return [false, 'Another booking conflicts with this.'];
        }

        // make sure it's during opening hours

        $d = date_create_from_format('Y-m-d H:i', $start);
        $weekday = $d->format('w'); // sunday = 0, ..., saturday = 6

        $in_opening_hours = $connection->execute('
            select * from opening_hours
            where
                weekday = :weekday
                and :end <= end_time
                and :start >= start_time
            ', ['weekday' => $weekday, 'start' => explode(' ', $start)[1], 'end' => explode(' ', $end)[1]])->fetchAll('assoc');

        if (count($in_opening_hours) < 1) {
            return [false, 'Time not within opening hours.'];
        }

        return [true, null];


        // during a once-off closed time
        $overlaps = $connection->execute('
            select * from closed_times
            where (equipment_id = :equipment_id or equipment_id is null)
            and ((start_time >= :start and start_time < :end)
                 or (end_time > :start and end_time <= :end)
                 or (start_time <= :start and end_time >= :end)
                )
            ', ['equipment_id' => $equipment_id, 'start' => $start, 'end' => $end])->fetchAll('assoc');

        if (count($overlaps) > 0) {
            $reason = '';
            $first = $overlaps[0];
            if ($first['reason'] != null && strlen($first['reason']) > 0) {
                $reason = ' ' . $first['reason'];
            }
            return [false, 'Not available during this time.' . $reason];
        }

        return [true, null];

    }

    // query the database and calculate available times for booking
    public static function getAvailableTimes(&$data, $equip_id, $date_str) {
        $times = [];
        $Bookings = TableRegistry::get('Bookings');
        $ClosedTimes = TableRegistry::get('ClosedTimes');
        $WeeklyClosedTimes = TableRegistry::get('WeeklyClosedTimes');
        $equipmentTable = TableRegistry::get('Equipment');
        $connection = ConnectionManager::get('default');

        $equipment = $equipmentTable->get($equip_id);

        // setup date variables
        $today_str = $date_str;
        $today = date_create_from_format('Y-m-d', $date_str);
        $tomorrow = date_add(date_create_from_format('Y-m-d', $date_str), date_interval_create_from_date_string('1 day'));
        $tomorrow_str = $tomorrow->format('Y-m-d');

        $s = 0;
        $e = 1;
        $timeSorter = function($a, $b) {
            // note: breaks ties on start/end - starts come before ends
            return strcmp($a[0] . $a[1], $b[0] . $b[1]);
        };

        $existing_bookings = $connection->execute('
            select * from bookings
            where (equipment_id = :equipment_id)
            and ((start_date >= :start and start_date < :end)
                 or (end_date > :start and end_date <= :end)
                 or (start_date <= :start and end_date >= :end)
                )
            and (state != \'rejected\')
            order by start_date
            ', ['equipment_id' => $equip_id, 'start' => $today_str . ' 00:00', 'end' => $today_str . ' 23:59'])->fetchAll('assoc');

        // get closed times
        $closed_times = $connection->execute('
            select * from closed_times
            where (equipment_id = :equipment_id or equipment_id is null)
            and ((start_time >= :start and start_time < :end)
                 or (end_time > :start and end_time <= :end)
                 or (start_time <= :start and end_time >= :end)
                )
            ', ['equipment_id' => $equip_id, 'start' => $today_str, 'end' => $tomorrow_str])->fetchAll('assoc');

        // process bookings for equipment to take into account quantity > 1
        $closed_times_processed = [];
        foreach ($closed_times as $b) {
            $closed_times_processed[] = [explode(' ', $b['start_time'])[1], $s];
            $closed_times_processed[] = [explode(' ', $b['end_time'])[1], $e];
        }

        // get opening hours
        $opening_hours = $connection->execute('
            select * from opening_hours
            where
                weekday = :weekday
            order by start_time
            ', ['weekday' => $today->format('w')])->fetchAll('assoc');

        // add opening hours to response
        $data['opening_hours'] = [];
        foreach ($opening_hours as $o) {
            $data['opening_hours'][] = ['start' => $o['start_time'], 'end' => $o['end_time']];
        }

        // invert opening hours
        $closed_hours = [];
        $previous = '00:00';
        foreach ($opening_hours as $o) {
            $closed_hours[] = [$previous, $s];
            $closed_hours[] = [$o['start_time'], $e];
            $previous = $o['end_time'];
        }
        $closed_hours[] = [$previous, $s];
        $closed_hours[] = ['23:59', $e];

        // process bookings for equipment to take into account quantity > 1
        $quantity = $equipment->quantity;
        $start_ends = [];
        foreach ($existing_bookings as $b) {
            $start_ends[] = [explode(' ', $b['start_date'])[1], $s];
            $start_ends[] = [explode(' ', $b['end_date'])[1], $e];
        }

        usort($start_ends, $timeSorter);

        // merge the overlapping bookings into bookings where equipment is
        // totally booked out
        $starts_seen = 0;
        $merged_bookings = [];
        foreach ($start_ends as $item) {
            if ($item[1] == $s) {
                $starts_seen += 1;
                if ($starts_seen >= $quantity) {
                    $merged_bookings[] = $item;
                }
            } else {
                if ($starts_seen == $quantity) {
                    $merged_bookings[] = $item;
                }
                $starts_seen -= 1;
            }

        }

        // $merged_bookings is a list of [time, start/end] pairs of bookings
        // $closed_hours is a similar list built from opening_hours
        // $closed_times_processed also similar list from once-off closed_times

        $merged_times = array_merge($merged_bookings, $closed_hours, $closed_times_processed);

        usort($merged_times, $timeSorter);

        // merge the overlapping times so nothing is overlapping
        $starts_seen = 0;
        $closed = [];
        foreach ($merged_times as $item) {
            if ($item[1] == $s) {
                if ($starts_seen == 0) {
                    $closed[] = $item;
                }
                $starts_seen += 1;
            } else {
                $starts_seen -= 1;
                if ($starts_seen == 0) {
                    $closed[] = $item;
                }
            }
        }

        // invert to get open times
        $opens = [];
        $start_seen = false;
        $previous_end = '00:00';
        foreach ($closed as $item) {
            if ($item[1] == $e) {
                $previous_end = $item[0];
                $start_seen = true;
            } else if ($start_seen) {
                $opens[] = ['start' => $previous_end, 'end' => $item[0]];
            }

        }

        // TODO: strip out times or move times where < current time
        $data['times'] = $opens;
    }

}
