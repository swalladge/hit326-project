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
    <label for="start_date">Select start_date</label>
    <div class="input-group" id="booking_start_date" >
    <input name="start_date" type='text' class="form-control" value="<?= $booking->start_date ?>"/>
        <span class="input-group-addon">
            <span class="glyphicon glyphicon-calendar"></span>
        </span>
    </div>
    <?php
    if ($this->Form->isFieldError('start_date')) {
        echo $this->Form->error('start_date');
    }
    ?>
</div>

<div class="form-group">
    <label for="end_date">Select end_date</label>
    <div class="input-group" id="booking_end_date" >
    <input name="end_date" type='text' class="form-control" value="<?= $booking->start_date ?>"/>
        <span class="input-group-addon">
            <span class="glyphicon glyphicon-calendar"></span>
        </span>
    </div>
    <?php
    if ($this->Form->isFieldError('end_date')) {
        echo $this->Form->error('end_date');
    }
    ?>
</div>

    <div class="form-group">
        <label for="notes-input">Notes to admin (optional)</label>
        <textarea class="form-control" name="notes" id="notes-input"><?= $booking->user_notes ?></textarea>
    </div>

    <input type="hidden" name="id" value="<?= $equipment->id ?>">
    <input class="btn btn-primary" type="submit" value="Submit Booking">
</form>

