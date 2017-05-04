<?php

namespace App\Controller;

use Cake\Event\Event;

/**
 * controller for the equipment listing and individual pages
 * - if an admin user is the current user, then this is CRUD for all bookings
 */
class BookingsController extends AppController
{

    // display a listing of all the bookings
    // - note: could be many bookings, so a search feature could be useful for
    //   admins?
    public function index() {
        $this->paginate = [
            'contain' => ['Equipment']
        ];
        $bookings = $this->paginate($this->Bookings);
        // TODO: limit to user bookings

        $this->set(compact('bookings'));
        $this->set('_serialize', ['bookings']);
    }

    // GET - view a single booking - should also display formm for updating the
    // booking
    public function view($id) {
        $booking = $this->Bookings->get($id, [
            'contain' => ['Equipment']
        ]);

        $this->set('booking', $booking);
        $this->set('_serialize', ['booking']);
    }

    // update a single booking
    public function edit($id) {
        $booking = $this->Bookings->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $booking = $this->Bookings->patchEntity($booking, $this->request->getData());
            $booking->set('state', 'pending');
            if ($this->Bookings->save($booking)) {
                $this->Flash->success(__('The booking has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The booking could not be saved. Please, try again.'));
        }
        $this->set(compact('booking'));
        $this->set('_serialize', ['booking']);
    }

    // DELETE - remove/cancel a booking
    public function delete($id) {
        $this->request->allowMethod(['post', 'delete']);
        $notice = $this->Bookings->get($id);
        if ($this->Bookings->delete($notice)) {
            $this->Flash->success(__('The booking has been deleted.'));
        } else {
            $this->Flash->error(__('The booking could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

}
