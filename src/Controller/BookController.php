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
