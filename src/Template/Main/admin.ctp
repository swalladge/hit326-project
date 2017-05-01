<?php

use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Core\Plugin;
use Cake\Datasource\ConnectionManager;
use Cake\Error\Debugger;
use Cake\Network\Exception\NotFoundException;

$this->layout = 'default';

?>



<p>
    admin page - more stuff goes here
</p>

<h3>List of things to edit</h3>

<ul>
    <li><a href="/equipment">Equipment</a></li>
    <li><a href="/notices">Notices</a></li>
    <li><a href="/bookings">Bookings</a></li>
    <li><a href="/closed-days">Closed Days</a></li>
    <li><a href="/timeslots">Timeslots</a></li>
</ul>

