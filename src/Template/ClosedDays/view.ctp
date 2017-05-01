<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Closed Day'), ['action' => 'edit', $closedDay->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Closed Day'), ['action' => 'delete', $closedDay->id], ['confirm' => __('Are you sure you want to delete # {0}?', $closedDay->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Closed Days'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Closed Day'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="closedDays view large-9 medium-8 columns content">
    <h3><?= h($closedDay->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($closedDay->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Date') ?></th>
            <td><?= $this->Number->format($closedDay->date) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Reason') ?></h4>
        <?= $this->Text->autoParagraph(h($closedDay->reason)); ?>
    </div>
</div>
