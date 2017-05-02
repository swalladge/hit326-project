<?php

use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Core\Plugin;
use Cake\Datasource\ConnectionManager;
use Cake\Error\Debugger;
use Cake\Network\Exception\NotFoundException;

$this->layout = 'default';

?>

<h1>Account</h1>

<h2>Info</h2>

<p>
    email: <?= h($user['email']) ?>
</p>

<p>
    phone: <?= h($user['phone']) ?>
</p>


<p>
    role: <?= h($user['role']) ?>
</p>


<h2>Actions</h2>

<a href="/book">New booking</a>

<a href="/bookings/">My bookings</a>
