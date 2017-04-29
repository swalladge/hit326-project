<?php

namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;

/**
 * main controller - for the homepage and maybe other general routes
 */
class MainController extends AppController
{

    public function beforeFilter(Event $event) {
        parent::beforeFilter($event);

        // allow public access to the homepage
        $this->Auth->allow(['index']);
    }

    public function index() {
        // TODO

    }

}
