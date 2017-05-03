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
    Booking id <?= $this->request->params['id'] ?>
</p>

<p>
    equipment: Something
</p>

<p>timeslot: sometime</p>

<a href="/bookings/1/edit">edit booking</a>

<form action="/bookings/1/delete" method="post">
    <input type="hidden" name="_method" value="DELETE">
    <input type="submit" value="Remove booking">
</form>

