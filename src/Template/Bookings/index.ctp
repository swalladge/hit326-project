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
    <a href="/equipment" role="button" class="btn btn-primary">New booking</a>
</p>

<p>Please note that all times are in the server's timezone: <?= $serverTime['timezone'] . ' (' . $serverTime['offset'] . ')' ?></p>

<!-- TODO: this should be a mobile friendly list, not a table -->
<h3>Bookings</h3>
<table class="table">
    <thead>
        <tr>
            <th scope="col"><?= $this->Paginator->sort('equipment_id') ?></th>
            <th scope="col"><?= $this->Paginator->sort('state') ?></th>
            <th scope="col"><?= $this->Paginator->sort('start_date') ?></th>
            <th scope="col"><?= $this->Paginator->sort('end_date') ?></th>
            <th scope="col" class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($bookings as $booking): ?>
        <tr>
            <td><?= $booking->has('equipment') ? $this->Html->link($booking->equipment->name, ['controller' => 'Equipment', 'action' => 'view', $booking->equipment->id]) : '' ?></td>
            <td><?= h($booking->state) ?></td>
            <td><?= h($booking->start_date) ?></td>
            <td><?= h($booking->end_date) ?></td>
            <td class="actions">
            <div class="btn-group">
                <?= $this->Html->link('View', ['action' => 'view', $booking->id], ['class' => 'btn btn-primary']) ?>
                <?= $this->Form->postLink('Cancel', ['action' => 'delete', $booking->id], ['confirm' => 'Are you sure you want to cancel this booking?', 'class' => 'btn btn-danger']) ?>
            </div>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
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

