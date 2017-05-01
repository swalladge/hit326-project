<?php

namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;
use Cake\Log\Log;

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

        // get system notices
        $noticesTable = TableRegistry::get('Notices');

        // TODO: only notices where display_from < current < display_to
        $notices = $noticesTable->find('all');
        $this->set('notices', $notices);
    }


    public function admin() {
        // TODO
    }
}
