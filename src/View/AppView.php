<?php
// modified from CakePHP template
namespace App\View;

use Cake\View\View;

/**
 * Application View
 *
 * Your application’s default view class
 *
 * @link http://book.cakephp.org/3.0/en/views.html#the-app-view
 */
class AppView extends View
{

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading helpers.
     *
     * e.g. `$this->loadHelper('Html');`
     *
     * @return void
     */
    public function initialize()
    {
        // bootstrap styled forms
        $templates = ['inputContainer' => '<div class="form-group">{{content}}</div>'];
        $this->Form->setTemplates($templates);

        // add info about the logged in user to the view
        $theUser = $this->request->session()->read('Auth.User');

        if ($theUser == NULL) {
            $userRole = 'null';
            $loggedIn = false;
        } else {
            $userRole = $theUser['role'];
            $loggedIn = true;
        }

        $this->set('loggedIn', $loggedIn);
        $this->set('userRole', $userRole);
        $this->set('theUser', $theUser);


    }
}
