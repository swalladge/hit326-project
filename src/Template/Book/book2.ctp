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

<p>Please note that all times are in the server's timezone: <?= $serverTime['timezone'] . ' (' . $serverTime['offset'] . ')' ?></p>


<?= $this->Form->create(null, ['type' => 'post']) ?>

<div class="form-group">
    <label for="start_date">Select day</label>
    <div class="input-group" id="booking-day" >
    <input name="day" type='text' class="form-control" value="<?= explode(' ', $booking->start_date)[0] ?>"/>
        <span class="input-group-addon">
            <span class="glyphicon glyphicon-calendar"></span>
        </span>
    </div>
</div>

<hr>

<h3>On selected date:</h3>
<div id="opening-hours">not loaded</div>
<div id="available-times">not loaded</div>

<hr>


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

    <input type="hidden" name="id" id="equip_id" value="<?= $equipment->id ?>">
    <input class="btn btn-primary" type="submit" value="Submit Booking">

<?= $this->Form->end() ?>

<!-- handlebars templates -->

<script id="opening-hours-template" type="text/x-handlebars-template">
    <strong>Opening hours</strong>
    {{#if msg}}
    <p>{{msg}}</p>
    {{/if}}
    {{#if opening_hours}}
    <ul>
    {{#opening_hours}}
        <li>{{start}} to {{end}}</li>
    {{/opening_hours}}
    </ul>
    {{/if}}
</script>

<script id="available-times-template" type="text/x-handlebars-template">
    <strong>Available to book within following time intervals:</strong>
    {{#if msg}}
    <p>{{msg}}</p>
    {{/if}}
    {{#if times}}
    <ul>
    {{#times}}
        <li>{{start}} to {{end}}</li>
    {{/times}}
    </ul>
    {{/if}}
</script>
