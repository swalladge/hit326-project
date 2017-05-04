<?php

use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Core\Plugin;
use Cake\Datasource\ConnectionManager;
use Cake\Error\Debugger;
use Cake\Network\Exception\NotFoundException;

$this->layout = 'default';

?>



<h3>Viewing booking id <?= h($booking->id) ?></h3>

<div class="btn-group">
<?= $this->Html->link('Edit', ['action' => 'edit', $booking->id], ['class' => 'btn btn-warning']) ?>
<?= $this->Form->postLink(
    'Delete',
    ['action' => 'delete', $booking->id],
    ['confirm' => 'Are you sure you want to delete this booking?', 'class' => 'btn btn-danger']
)
?>
</div>


<table class="table">
    <tr>
        <th scope="row"><?= __('Equipment') ?></th>
        <td><?= $booking->has('equipment') ? $this->Html->link($booking->equipment->name, ['controller' => 'Equipment', 'action' => 'view', $booking->equipment->id]) : '' ?></td>
    </tr>
    <tr>
        <th scope="row">Start Date</th>
        <td><?= $this->Number->format($booking->start_date) ?></td>
    </tr>
    <tr>
        <th scope="row">Duration</th>
        <td><?= $this->Number->format($booking->duration) ?></td>
    </tr>
    <tr>
        <th scope="row">State</th>
        <td><?= h($booking->state) ?></td>
    </tr>
    <tr>
        <th scope="row">User Notes</th>
        <td><?= $this->Text->autoParagraph(h($booking->user_notes)) ?></td>
    </tr>
</table>

