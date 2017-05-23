<?php

namespace App\Controller;

use Cake\Event\Event;
use Cake\ORM\TableRegistry;
use Cake\Log\Log;

/**
 * admin controller - for admin specific general pages
 */
class AdminController extends AdminAppController
{

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->Bookings = TableRegistry::get('Bookings');
    }

    // for the admin dashboard
    public function index() {
        // TODO
    }

    public function cleanOldBookings() {
        $this->request->allowMethod(['post']);

        $today = date('Y-m-d');
        $num = $this->Bookings->deleteAll(['end_date < ' => $today]);

        if ($num > 0) {
            $this->Flash->success($num + ' old bookings removed!');
        } else {
            $this->Flash->info('No old bookings to remove.');
        }



        return $this->redirect('/admin');
    }
}
