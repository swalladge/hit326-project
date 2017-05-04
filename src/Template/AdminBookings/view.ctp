<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Booking'), ['action' => 'edit', $booking->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Booking'), ['action' => 'delete', $booking->id], ['confirm' => __('Are you sure you want to delete # {0}?', $booking->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Bookings'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Booking'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
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
</div>
