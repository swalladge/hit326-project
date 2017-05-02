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

<?= $this->Form->create() ?>
<?= $this->Form->control('email', ['class' => 'form-control']) ?>
<?= $this->Form->control('password', ['class' => 'form-control']) ?>
<?= $this->Form->button('Login', ['class' => 'btn btn-primary']); ?>
<?= $this->Form->end() ?>

