<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Opening Hour'), ['action' => 'edit', $openingHour->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Opening Hour'), ['action' => 'delete', $openingHour->id], ['confirm' => __('Are you sure you want to delete # {0}?', $openingHour->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Opening Hours'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Opening Hour'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="openingHours view large-9 medium-8 columns content">
    <h3><?= h($openingHour->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($openingHour->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Weekday') ?></th>
            <td><?= $this->Number->format($openingHour->weekday) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Start Time') ?></h4>
        <?= $this->Text->autoParagraph(h($openingHour->start_time)); ?>
    </div>
    <div class="row">
        <h4><?= __('End Time') ?></h4>
        <?= $this->Text->autoParagraph(h($openingHour->end_time)); ?>
    </div>
</div>
