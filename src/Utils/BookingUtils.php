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
    public static function validateBookingDates($booking)
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
            and ((start_date >= :start and start_date <= :end)
                 or (end_date >= :start and end_date <= :end)
                 or (start_date <= :start and end_date >= :end)
                )
            and (state != \'rejected\')
            ', ['equipment_id' => $equipment_id, 'start' => $start, 'end' => $end])->fetchAll('assoc');

        if (count($overlaps) > 0) {
            return [false, 'Another booking conflicts with this.'];
        }

        // during a weekly closed time

        // during a once-off closed time
        $overlaps = $connection->execute('
            select * from closed_times
            where (equipment_id = :equipment_id or equipment_id is null)
            and ((start_time >= :start and start_time <= :end)
                 or (end_time >= :start and end_time <= :end)
                 or (start_time <= :start and end_time >= :end)
                )
            ', ['equipment_id' => $equipment_id, 'start' => $start, 'end' => $end])->fetchAll('assoc');

        Log::write('debug', $overlaps);
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

}
