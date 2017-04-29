<?php

namespace App\Controller;

use Cake\Controller\Controller;
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
        // TODO
    }

    // called on POST - create a new booking
    public function add() {
        // TODO: validate, create new booking entity, etc.
        $this->Flash->success("new booking added");
        $this->set('data', $this->request->getData());
    }

    // GET - view a single booking - should also display formm for updating the
    // booking
    public function view($id) {
        // TODO
    }

    // PUT - update a single booking
    public function edit($id) {
        // TODO
    }

    // DELETE - remove/cancel a booking
    public function delete($id) {
        // TODO
    }

}
