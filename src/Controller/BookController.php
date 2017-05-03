<?php

namespace App\Controller;

use App\Controller\AppController;
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
        // post - handle form submission (add new booking)
        if ($this->request->is('post')) {
            $Bookings = TableRegistry::get('Bookings');
            $booking = $Bookings->newEntity();
            // TODO: use form data to update $booking

            // pseudo success for now
            $this->Flash->success(__('The booking has been saved. (no not really)'));
            return $this->redirect('/bookings');

            // TODO: actually save
            if ($Bookings->save($booking)) {
                $this->Flash->success(__('The booking has been saved.'));
                return $this->redirect('/bookings');
            }
            $this->Flash->error(__('The booking could not be saved. Please, try again.'));
        }

        // TODO: use submitted form data to re-populate the form on reload

        $this->set('id', $id);
        $equipmentTable = TableRegistry::get('Equipment');
        $equipment = $equipmentTable->get($id);
        $this->set(compact('equipment'));

        // TODO
    }

    // first page of the booking process/form - allows selecting a thing to
    // book
    public function book1()
    {
        // TODO
        $equipmentTable = TableRegistry::get('Equipment');
        $equipment = $equipmentTable->find('all');
        $this->set(compact('equipment'));
    }

}
