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
    <li><a href="/admin/equipment">Equipment</a></li>
    <li><a href="/admin/notices">Notices</a></li>
    <li><a href="/admin/bookings">Bookings</a></li>
    <li><a href="/admin/opening-hours">Opening Hours</a></li>
    <li><a href="/admin/closed-times">Once-Off Closed Times</a></li>
    <li><a href="/admin/timeslots">Timeslots</a></li>
    <li><a href="/admin/users">Users</a></li>
</ul>

