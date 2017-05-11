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
<?= $this->Html->link('View all bookings', ['action' => 'index'], ['class' => 'btn btn-primary']) ?>
<?= $this->Form->postLink(
'Cancel booking',
['action' => 'delete', $booking->id],
['confirm' => 'Are you sure you want to cancel this booking?', 'class' => 'btn btn-danger']
)
?>
</div>

<hr>


<table class="table">
    <tr>
        <th scope="row"><?= __('Equipment') ?></th>
        <td><?= $booking->has('equipment') ? $this->Html->link($booking->equipment->name, ['controller' => 'Equipment', 'action' => 'view', $booking->equipment->id]) : '' ?></td>
    </tr>
    <tr>
        <th scope="row">Start Date</th>
        <td><?= $booking->start_date ?></td>
    </tr>
    <tr>
        <th scope="row">End Date</th>
        <td><?= h($booking->end_date) ?></td>
    </tr>
    <tr>
        <th scope="row">Duration</th>
        <td><?= $duration ?></td>
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

