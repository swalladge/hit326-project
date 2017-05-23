<?php
/**
  * @var \App\View\AppView $this
  */
?>

<h1>Admin Bookings Management</h1>

<p>From here, you can manage all the bookings.</p>

<div>
<h2>Actions</h2>
<div class="btn-group">
<?= $this->Html->link('New Booking', ['action' => 'add'], ['class' => 'btn btn-primary']) ?>
</div>
</div>


<h2>Bookings</h2>
<table class="table">
    <thead>
        <tr>
            <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
            <th scope="col"><?= $this->Paginator->sort('equipment_id') ?></th>
            <th scope="col"><?= $this->Paginator->sort('state') ?></th>
            <th scope="col"><?= $this->Paginator->sort('start_date') ?></th>
            <th scope="col"><?= $this->Paginator->sort('end_date') ?></th>
            <th scope="col" class="actions"><?= 'Actions' ?></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($bookings as $booking): ?>

        <?php if (strcmp($booking->state, 'confirmed') == 0): ?>
        <tr class="bg-success">
        <?php elseif (strcmp($booking->state, 'rejected') == 0): ?>
        <tr class="bg-danger">
        <?php else: ?>
        <tr class="bg-warning">
        <?php endif; ?>

            <td><?= $booking->has('user') ? $this->Html->link($booking->user->email, ['controller' => 'AdminUsers', 'action' => 'view', $booking->user->id]) : '' ?></td>
            <td><?= $booking->has('equipment') ? $this->Html->link($booking->equipment->name, ['controller' => 'Equipment', 'action' => 'view', $booking->equipment->id]) : '' ?></td>
            <td><?= $booking->state ?></td>
            <td><?= $booking->start_date ?></td>
            <td><?= $booking->end_date ?></td>
            <td class="actions">
            <div class="btn-group">
                <?php if (strcmp($booking->state, 'confirmed') != 0): ?>
                <?= $this->Form->postLink('Confirm', ['action' => 'confirm', $booking->id], ['class' => 'btn btn-info']) ?>
                <?php endif; ?>
                <?php if (strcmp($booking->state, 'rejected') != 0): ?>
                    <?= $this->Form->postLink('Reject', ['action' => 'reject', $booking->id], ['class' => 'btn btn-danger']) ?>
                <?php endif; ?>
                </div>

            <div class="btn-group">
                <?= $this->Html->link('View', ['action' => 'view', $booking->id], ['class' => 'btn btn-primary']) ?>
                <?= $this->Html->link('Edit', ['action' => 'edit', $booking->id], ['class' => 'btn btn-warning']) ?>
                <?= $this->Form->postLink('Delete', ['action' => 'delete', $booking->id], ['confirm' => 'Are you sure you want to delete # {0}?', $booking->id, 'class' => 'btn btn-danger']) ?>
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

