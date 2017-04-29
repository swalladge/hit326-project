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
 * controller for equipment/room management available for booking
 * - accessible to admins only!
 */
class EquipmentController extends AppController
{

    // display a table of all the equipment/rooms (need separate controller for
    // rooms to equipment controller?)
    public function index() {
        // TODO
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
