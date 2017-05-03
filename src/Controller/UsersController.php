<?php

namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;
use Cake\Log\Log;
use Cake\ORM\TableRegistry;

/**
 * controller for the equipment listing and individual pages
 */
class UsersController extends AppController
{

    public function beforeFilter(Event $event) {
        parent::beforeFilter($event);

        $this->Auth->allow(['logout', 'register']);
    }


    // log the user in - display login form on GET and actually login on POST
    public function login() {
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
                return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Flash->error('Invalid username or password, please try again.');
        }
    }

    // display user account info
    public function account() {
        $user = $this->Auth->user();
        $this->set('user', $user);
    }

    // logs the user out - called on POST only
    public function logout() {
        return $this->redirect($this->Auth->logout());
    }

    public function register() {
        $Users = TableRegistry::get('Users');

        $user = $Users->newEntity();

        if ($this->request->is('post')) {
            $data = $this->request->getData();
            Log::write('debug', $data);

            $user = $Users->patchEntity($user, $data);
            $user->set('role', 'user');

            if ($Users->save($user)) {
                $this->Flash->success(__('Your account has been created successfully! You may now make a booking.'));
                $this->Auth->setUser($user);
                return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Flash->error(__('Unable to add the user.'));
        }

        $this->set('user', $user);
    }
}
