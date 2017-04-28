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
 * controller for the equipment listing and individual pages
 */
class UsersController extends AppController
{

    public function beforeFilter(Event $event) {
        parent::beforeFilter($event);

        $this->Auth->allow(['logout']);
    }


    public function login() {
        if ($this->request->is('post')) {
            // TODO: real login
            // https://book.cakephp.org/3.0/en/controllers/components/authentication.html#identifying-users-and-logging-them-in
            $user = array('id' => 1, 'username' => 'testuser');
            $this->Auth->setUser($user);
            return $this->redirect($this->Auth->redirectUrl());
        }
    }

    public function account() {
        // TODO
    }

    public function logout() {
        return $this->redirect($this->Auth->logout());
    }

}