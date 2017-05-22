<?php

namespace App\Controller;

use Cake\Event\Event;
use Cake\ORM\TableRegistry;
use Cake\Log\Log;
use App\Utils\BookingUtils;
use Cake\Core\Configure;

/**
 * Book Controller
 */
class BookController extends AppController
{

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->Bookings = TableRegistry::get('Bookings');
    }

    // handle the second page of the booking form - once a piece of equipment
    // to book has been selected
    // $id is the id of the thing to book
    public function book2($id)
    {
        $booking = $this->Bookings->newEntity();

        $equipmentTable = TableRegistry::get('Equipment');
        $equipment = $equipmentTable->get($id);

        $this->set('start_date', '');
        $this->set('end_date', '');

        // post - handle form submission (add new booking)
        if ($this->request->is('post')) {
            $ok = $this->handlePostData($booking, $equipment);
            if ($ok) {
                $this->Flash->success('Your booking has been submitted succesfully!');
                return $this->redirect('/bookings');
            }
        }

        $this->set('booking', $booking);
        $this->set('equipment', $equipment);

    }

    // first page of the booking process/form - allows selecting a thing to
    // book - NOTE: probably not going to be used - using /equipment to select
    // things to book
    public function book1()
    {
        // TODO
        $equipmentTable = TableRegistry::get('Equipment');
        $equipment = $equipmentTable->find('all');
        $this->set(compact('equipment'));
    }

    // note: $date_str in format of 'yyyy-mm-dd'
    public function getAvailableTimes($equip_id, $date_str) {
        $this->viewBuilder()->className('Json');

        $data = [];
        $data['date'] = $date_str;
        $data['id'] = $equip_id;

        $times = BookingUtils::getAvailableTimes($data, $equip_id, $date_str);


        $this->set(compact('data'));
        $this->set('_serialize', ['data']);
    }

    private function handlePostData($booking, $equipment)
    {
            $data = $this->request->getData();
            $user = $this->Auth->user();


            // TODO: catch null
            $this->set('start_date', $data['start_date']);
            $this->set('end_date', $data['end_date']);

            $booking->set('user_id', $user['id']);

            $booking->set('equipment_id', $equipment->id);

            $booking->set('state', 'pending');

            if (isset($data['notes'])) {
                $booking->set('user_notes', $data['notes']);
            }

            $day = $data['day'];
            $start_date_parsed = null;
            if (isset($data['start_date'])) {
                $start_date = $day . ' ' . $data['start_date'];
                $booking->set('start_date', $start_date);
                $d = date_parse_from_format('Y-m-d H:i', $start_date);
                $start_date_parsed = $d;
                if ($d['error_count'] > 0) {
                    $this->Flash->error('Invalid start date!');
                    return false;
                }

                $res = checkdate($d['month'], $d['day'], $d['year']);

                if (! $res) {
                    $this->Flash->error('Invalid start date!');
                    return false;
                }
            } else {
                $this->Flash->error('Missing start date!');
                return false;
            }

            if (isset($data['end_date'])) {
                $end_date = $day . ' ' . $data['end_date'];
                $booking->set('end_date', $end_date);
                $end_date_parsed = date_parse_from_format('Y-m-d H:i', $end_date);
                if ($end_date_parsed['error_count'] > 0) {
                    $this->Flash->error('Invalid end time!');
                    return false;
                }
            }

            if ($start_date >= $end_date) {
                $this->Flash->error('Start time must be before end time!');
                return false;
            }

            $now = date('Y-m-d H:i');
            if ($start_date < $now) {
                $this->Flash->error('Start time cannot be in the past!');
                return false;
            }


            // check for conflicts
            list($datesOk, $reason) = BookingUtils::validateBookingDates($booking, $equipment);

            if (! $datesOk) {
                $this->Flash->error($reason);
                return false;
            }

            if ($this->Bookings->save($booking)) {
                return true;
            }

            $this->Flash->error('The booking could not be saved. Please, try again.');
            return false;
    }
}
