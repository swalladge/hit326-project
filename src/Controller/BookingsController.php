<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link      http://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */
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
        // TODO
    }

    // method to display the new booking form - called on GET
    public function new() {
        // TODO
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

    // DELETE - remove/cancel a booking
    public function post($id) {
        // TODO: forward to edit() or delete()
    }

}
