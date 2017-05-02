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

        // get system notices
        $noticesTable = TableRegistry::get('Notices');
        $today = date('Y-m-d');
        $notices = $noticesTable->find()
            ->where(function ($exp) use ($today) {
                $orConditions = $exp->or_(function ($or) use ($today) {
                    return $or->gte('display_to', $today)->eq('display_to', '');
                });
                return $exp
                    ->add($orConditions)
                    ->lte('display_from', $today);
            })
            ->order(['display_from' => 'DESC']);

        $this->set('notices', $notices);

    }


    public function admin() {
        // TODO
    }
}
