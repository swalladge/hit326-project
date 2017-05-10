<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Closed Time'), ['action' => 'edit', $closedTime->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Closed Time'), ['action' => 'delete', $closedTime->id], ['confirm' => __('Are you sure you want to delete # {0}?', $closedTime->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Closed Times'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Closed Time'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="closedTimes view large-9 medium-8 columns content">
    <h3><?= h($closedTime->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Equipment') ?></th>
            <td><?= $closedTime->has('equipment') ? $this->Html->link($closedTime->equipment->name, ['controller' => 'AdminEquipment', 'action' => 'view', $closedTime->equipment->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($closedTime->id) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Start Time') ?></h4>
        <?= $this->Text->autoParagraph(h($closedTime->start_time)); ?>
    </div>
    <div class="row">
        <h4><?= __('End Time') ?></h4>
        <?= $this->Text->autoParagraph(h($closedTime->end_time)); ?>
    </div>
    <div class="row">
        <h4><?= __('Reason') ?></h4>
        <?= $this->Text->autoParagraph(h($closedTime->reason)); ?>
    </div>
</div>
