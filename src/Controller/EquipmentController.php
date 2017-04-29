<?php

namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;

/**
 * controller for equipment/room management available for booking
 * - accessible to admins only!
 */
class EquipmentController extends AppController
{

    // display a table of all the equipment/rooms (need separate controller for
    // rooms to equipment controller?)
    public function index() {
        // TODO
        $equipment = $this->Equipment->find('all');
        $this->set(compact('equipment'));
    }

    // called on POST - add new equipment
    public function add() {
        // TODO
    }

    // called on GET - display add new equipment form
    public function new() {
        // TODO
    }

    /**
     * view a single item of equipment with id
     * called on GET
     */
    public function view($id) {
        // TODO
    }

    // called on PUT - edit an item by id
    public function edit($id) {
        // TODO
    }

    // called on DELETE - remove an item
    public function delete($id) {
        // TODO
    }

}
