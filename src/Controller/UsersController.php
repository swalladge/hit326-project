<?php

namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;

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
            // TODO: real login
            // https://book.cakephp.org/3.0/en/controllers/components/authentication.html#identifying-users-and-logging-them-in
            $user = array('id' => 1, 'username' => 'testuser');
            $this->Auth->setUser($user);
            return $this->redirect($this->Auth->redirectUrl());
        }
    }

    // display user account information, etc. maybe this isn't requiped for
    // this app, since it's fairly small - the homepage can cover a lot.
    // might be useful to keep around though
    public function account() {
        // TODO
    }

    // logs the user out - called on POST only
    public function logout() {
        return $this->redirect($this->Auth->logout());
    }

    public function register() {
        $user = $this->Users->newEntity();

        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            $user->set('role', 'user');
            if ($this->Users->save($user)) {
                $this->Flash->success(__('Your account has been created successfully! You may now make a booking.'));
                $this->Auth->setUser($user);
                return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Flash->error(__('Unable to add the user.'));
        }

        $this->set('user', $user);
    }
}
