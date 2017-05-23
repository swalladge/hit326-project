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
            'contain' => ['Equipment'],
            'sortWhitelist' => [] // disable sorting
        ];

        $user = $this->Auth->user();
        $query = $this->Bookings->find()->where(['user_id' => $user['id']])->order('start_date');
        $bookings = $this->paginate($query);

        $this->set(compact('bookings'));
        $this->set('_serialize', ['bookings']);
    }

    // GET - view a single booking - should also display formm for updating the
    // booking
    public function view($id) {
        $booking = $this->Bookings->get($id, [
            'contain' => ['Equipment']
        ]);

        // calculate and format the duration for display in the view
        $start = date_create($booking->start_date);
        $end =  date_create($booking->end_date);
        $duration = $end->diff($start)->format('%h:%I');

        $this->set(compact('booking', 'duration'));
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
