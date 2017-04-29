<?php

use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Core\Plugin;
use Cake\Datasource\ConnectionManager;
use Cake\Error\Debugger;
use Cake\Network\Exception\NotFoundException;

$this->layout = 'default';

?>

<form class="form" action="/bookings" method="post">
    <div class="from-group">
        <label for="equipment-input">select equipment</label>
        <select class="form-control" id="equipment-input" name="equipment">
            <option value="">-- select equipment --</option>
            <option value="1">printer</option>
            <option value="2">computer</option>
        </select>
    </div>

    <div class="form-group">
        <label for="timeslot-input">Select timeslot</label>
        <input class="form-control" type="text" name="timeslot" id="timeslot-input">
    </div>

    <div class="form-group">
        <label for="notes-input">Notes</label>
        <textarea class="form-control" name="notes" id="notes-input"></textarea>
    </div>

    <input class="btn btn-primary" type="submit" value="Submit">
</form>

