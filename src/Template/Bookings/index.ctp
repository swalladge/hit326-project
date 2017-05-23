<?php

use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Core\Plugin;
use Cake\Datasource\ConnectionManager;
use Cake\Error\Debugger;
use Cake\Network\Exception\NotFoundException;

$this->layout = 'default';

?>

<h1>My Bookings</h1>

<p>
    <a href="/equipment" role="button" class="btn btn-warning">New booking</a>
</p>

<p>Please note that all times are in the server's timezone: <?= $serverTime['timezone'] . ' (' . $serverTime['offset'] . ')' ?></p>

<!-- TODO: this should be a mobile friendly list, not a table -->
<h3>Bookings</h3>

<ul class="list-group">
<?php foreach ($bookings as $booking): ?>
<li class="list-group-item clearfix">
    <div class="pull-left">
        <p><strong><?= explode(' ', $booking->start_date)[0] ?></strong></p>
        <p><strong><?= explode(' ', $booking->end_date)[1] ?></strong> to <strong><?= explode(' ', $booking->end_date)[1] ?></strong></p>
        <p>For: <?= $this->Html->link($booking->equipment->name, ['controller' => 'Equipment', 'action' => 'view', $booking->equipment->id])?></p>
        <p> Booking state: <?= h($booking->state) ?></p>
    </div>
    <div class="btn-group pull-right">
        <?= $this->Html->link('View', ['action' => 'view', $booking->id], ['class' => 'btn btn-primary']) ?>
        <?= $this->Form->postLink('Cancel', ['action' => 'delete', $booking->id], ['confirm' => 'Are you sure you want to cancel this booking?', 'class' => 'btn btn-danger']) ?>
    </div>
</li>
<?php endforeach; ?>
</ul>

<div class="paginator">
    <ul class="pagination">
        <?= $this->Paginator->first('<< ' . 'first') ?>
        <?= $this->Paginator->prev('< ' . 'previous') ?>
        <?= $this->Paginator->numbers() ?>
        <?= $this->Paginator->next('next' . ' >') ?>
        <?= $this->Paginator->last('last' . ' >>') ?>
    </ul>
    <p><?= $this->Paginator->counter(['format' => 'Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total']) ?></p>
</div>

