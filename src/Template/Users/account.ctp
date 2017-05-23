<?php

use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Core\Plugin;
use Cake\Datasource\ConnectionManager;
use Cake\Error\Debugger;
use Cake\Network\Exception\NotFoundException;

$this->layout = 'default';

?>

<h1>My Account</h1>

<h2>Account Details</h2>

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

<div class="btn-group">
<a class="btn btn-warning" href="/equipment" role="button">New Booking</a>
<a class="btn btn-primary" href="/bookings" role="button">View Bookings</a>
</div>

