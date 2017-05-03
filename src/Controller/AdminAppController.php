<?php
namespace App\Controller;

use Cake\Event\Event;

// controllers that only want to allow admin access should inherit from this controller
class AdminAppController extends AppController
{

    public function initialize()
    {
        parent::initialize();
    }

    public function isAuthorized($user = null)
    {
        if ($user == null) {
            return false;
        }
        if ($user['role'] == 'admin') {
            return true;
        }
        return false;
    }

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->Auth->config('authorize', ['Controller']);
    }

}
