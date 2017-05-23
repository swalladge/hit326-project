<?php

use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Core\Plugin;
use Cake\Datasource\ConnectionManager;
use Cake\Error\Debugger;
use Cake\Network\Exception\NotFoundException;

$this->layout = 'default';

?>

<h1>Register</h1>

<p>Please supply your details to be registered in the system.</p>

<?= $this->Form->create($user) ?>
<?= $this->Form->control('name', ['type' => 'text', 'class' => 'form-control']) ?>
<?= $this->Form->control('email', ['class' => 'form-control']) ?>
<?= $this->Form->control('password', ['class' => 'form-control']) ?>
<?= $this->Form->control('phone', ['class' => 'form-control']) ?>
<?= $this->Form->button('Register', ['class' => 'btn btn-primary']) ?>
<?= $this->Form->end() ?>
