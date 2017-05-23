<?php
/**
  * @var \App\View\AppView $this
  */
?>
<div>
<h2>Actions</h2>
<div class="btn-group">
<?= $this->Html->link('List Bookings', ['action' => 'index'], ['class' => 'btn btn-default']) ?>
<?= $this->Html->link('New Booking', ['action' => 'add'], ['class' => 'btn btn-primary']) ?>
<?= $this->Html->link('Edit', ['action' => 'edit', $booking->id], ['class' => 'btn btn-warning']) ?>
<?= $this->Form->postLink(
    __('Delete'),
    ['action' => 'delete', $booking->id],
    ['confirm' => 'Are you sure you want to delete this booking?', 'class' => 'btn btn-danger']
)
?>
</div>
<div class="btn-group">
    <?php if (strcmp($booking->state, 'confirmed') != 0): ?>
    <?= $this->Form->postLink('Confirm', ['action' => 'confirm', $booking->id], ['class' => 'btn btn-info']) ?>
    <?php endif; ?>
    <?php if (strcmp($booking->state, 'rejected') != 0): ?>
        <?= $this->Form->postLink('Reject', ['action' => 'reject', $booking->id], ['class' => 'btn btn-danger']) ?>
    <?php endif; ?>
</div>
</div>


<div>
    <h3>Viewing booking id <?= h($booking->id) ?></h3>
    <table class="table">
        <tr>
            <th scope="row"><?= __('Equipment') ?></th>
            <td><?= $booking->has('equipment') ? $this->Html->link($booking->equipment->name, ['controller' => 'Equipment', 'action' => 'view', $booking->equipment->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row">User</th>
            <td><?= $booking->has('user') ? $this->Html->link($booking->user->email, ['controller' => 'AdminUsers', 'action' => 'view', $booking->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row">Start Date</th>
            <td><?= h($booking->start_date) ?></td>
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
</div>
