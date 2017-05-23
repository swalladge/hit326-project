<?php

use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Core\Plugin;
use Cake\Datasource\ConnectionManager;
use Cake\Error\Debugger;
use Cake\Network\Exception\NotFoundException;

$this->layout = 'default';


?>

<h1>Login</h1>

<p>Please enter your email and password to login to the system.</p>
<p>Don't have an account? Please <a href="/register">register a new account</a> to continue.</p>

<?= $this->Form->create() ?>
<?= $this->Form->control('email', ['class' => 'form-control']) ?>
<?= $this->Form->control('password', ['class' => 'form-control']) ?>
<?= $this->Form->button('Login', ['class' => 'btn btn-primary']); ?>
<?= $this->Form->end() ?>

