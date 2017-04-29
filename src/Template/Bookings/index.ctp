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
    <a href="/book">New booking</a>
</p>

<p>
    My bookings
</p>

<table class="table">
    <thead>
        <tr>
            <th>Equipment</th>
            <th>Timeslot</th>
            <th>Notes</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Printer</td>
            <td>1-2pm friday</td>
            <td></td>
            <td><a href="/bookings/1">edit</a></td>
        </tr>
        <tr>
            <td>Computer</td>
            <td>9am - 12pm Saturday</td>
            <td></td>
            <td><a href="/bookings/2">edit</a></td>
        </tr>
    </tbody>
</table>

