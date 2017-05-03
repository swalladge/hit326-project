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
        <li><?= $this->Html->link(__('List Equipment'), ['controller' => 'Equipment', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Equipment'), ['controller' => 'Equipment', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="bookings view large-9 medium-8 columns content">
    <h3><?= h($booking->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Equipment') ?></th>
            <td><?= $booking->has('equipment') ? $this->Html->link($booking->equipment->name, ['controller' => 'Equipment', 'action' => 'view', $booking->equipment->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($booking->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Userid') ?></th>
            <td><?= $this->Number->format($booking->userid) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Date') ?></th>
            <td><?= $this->Number->format($booking->date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Start Time') ?></th>
            <td><?= $this->Number->format($booking->start_time) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Duration') ?></th>
            <td><?= $this->Number->format($booking->duration) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('State') ?></h4>
        <?= $this->Text->autoParagraph(h($booking->state)); ?>
    </div>
</div>
