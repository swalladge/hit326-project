<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Weekly Closed Time'), ['action' => 'edit', $weeklyClosedTime->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Weekly Closed Time'), ['action' => 'delete', $weeklyClosedTime->id], ['confirm' => __('Are you sure you want to delete # {0}?', $weeklyClosedTime->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Weekly Closed Times'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Weekly Closed Time'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="weeklyClosedTimes view large-9 medium-8 columns content">
    <h3><?= h($weeklyClosedTime->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Equipment') ?></th>
            <td><?= $weeklyClosedTime->has('equipment') ? $this->Html->link($weeklyClosedTime->equipment->name, ['controller' => 'AdminEquipment', 'action' => 'view', $weeklyClosedTime->equipment->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($weeklyClosedTime->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Weekday') ?></th>
            <td><?= $this->Number->format($weeklyClosedTime->weekday) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Entire Day') ?></th>
            <td><?= $this->Number->format($weeklyClosedTime->entire_day) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Start Time') ?></h4>
        <?= $this->Text->autoParagraph(h($weeklyClosedTime->start_time)); ?>
    </div>
    <div class="row">
        <h4><?= __('End Time') ?></h4>
        <?= $this->Text->autoParagraph(h($weeklyClosedTime->end_time)); ?>
    </div>
    <div class="row">
        <h4><?= __('Reason') ?></h4>
        <?= $this->Text->autoParagraph(h($weeklyClosedTime->reason)); ?>
    </div>
</div>
