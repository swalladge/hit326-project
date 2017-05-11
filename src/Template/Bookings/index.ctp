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
                <?= $this->Html->link(__('View'), ['action' => 'view', $booking->id]) ?>
                <?= $this->Form->postLink(__('Cancel'), ['action' => 'delete', $booking->id], ['confirm' => 'Are you sure you want to cancel this booking?']) ?>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<div class="paginator">
    <ul class="pagination">
        <?= $this->Paginator->first('<< ' . __('first')) ?>
        <?= $this->Paginator->prev('< ' . __('previous')) ?>
        <?= $this->Paginator->numbers() ?>
        <?= $this->Paginator->next(__('next') . ' >') ?>
        <?= $this->Paginator->last(__('last') . ' >>') ?>
    </ul>
    <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
</div>

