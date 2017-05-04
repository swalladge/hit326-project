<?php

namespace App\Controller;

use Cake\ORM\TableRegistry;
use Cake\Log\Log;

/**
 * Book Controller
 */
class BookController extends AppController
{

    // handle the second page of the booking form - once a piece of equipment
    // to book has been selected
    // $id is the id of the thing to book
    public function book2($id)
    {
        $Bookings = TableRegistry::get('Bookings');
        $booking = $Bookings->newEntity();

        $equipmentTable = TableRegistry::get('Equipment');
        $equipment = $equipmentTable->get($id);

        // post - handle form submission (add new booking)
        if ($this->request->is('post')) {

            $data = $this->request->getData();

            $user = $this->Auth->user();
            $booking->set('user_id', $user['id']);

            $booking->set('equipment_id', $id);

            $booking->set('state', 'pending');

            if (isset($data['notes'])) {
                $booking->set('user_notes', $data['notes']);
            }

            // TODO: use timeslots properly
            if (isset($data['timeslot'])) {
                $booking->set('start_date', $data['timeslot']);
            }
            $booking->set('duration', 60);

            if ($Bookings->save($booking)) {
                $this->Flash->success('Your booking has been submitted succesfully!');

                return $this->redirect('/bookings');
            }
            $this->Flash->error(__('The booking could not be saved. Please, try again.'));
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

}
