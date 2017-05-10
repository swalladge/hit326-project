<?php

use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Core\Plugin;
use Cake\Datasource\ConnectionManager;
use Cake\Error\Debugger;
use Cake\Network\Exception\NotFoundException;

$this->layout = 'default';

?>

<h1>
    Booking  <?= $this->Html->link($equipment->name, ['controller' => 'Equipment', 'action' => 'view', $equipment->id]) ?>
</h1>

<form class="form" method="post">

<div class="form-group">
    <label for="start_date">Select day</label>
    <div class="input-group" id="booking-day" >
    <input name="day" type='text' class="form-control" value="<?= explode(' ', $booking->start_date)[0] ?>"/>
        <span class="input-group-addon">
            <span class="glyphicon glyphicon-calendar"></span>
        </span>
    </div>
</div>

<div class="form-group">
    <label for="end_date">Select start time</label>
    <div class="input-group" id="booking-start-time" >
    <input name="start_date" type='text' class="form-control" value="<?= $start_date ?>"/>
        <span class="input-group-addon">
            <span class="glyphicon glyphicon-calendar"></span>
        </span>
    </div>
</div>

<div class="form-group">
    <label for="end_date">Select end time</label>
    <div class="input-group" id="booking-end-time" >
    <input name="end_date" type='text' class="form-control" value="<?= $end_date ?>"/>
        <span class="input-group-addon">
            <span class="glyphicon glyphicon-calendar"></span>
        </span>
    </div>
</div>

    <div class="form-group">
        <label for="notes-input">Notes to admin (optional)</label>
        <textarea class="form-control" name="notes" id="notes-input"><?= $booking->user_notes ?></textarea>
    </div>

    <input type="hidden" name="id" value="<?= $equipment->id ?>">
    <input class="btn btn-primary" type="submit" value="Submit Booking">
</form>

