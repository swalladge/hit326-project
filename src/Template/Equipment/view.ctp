<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Equipment'), ['action' => 'edit', $equipment->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Equipment'), ['action' => 'delete', $equipment->id], ['confirm' => __('Are you sure you want to delete # {0}?', $equipment->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Equipment'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Equipment'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="equipment view large-9 medium-8 columns content">
    <h3><?= h($equipment->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($equipment->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Quantity') ?></th>
            <td><?= $this->Number->format($equipment->quantity) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Is Active') ?></th>
            <td><?= $this->Number->format($equipment->is_active) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Is Portable') ?></th>
            <td><?= $equipment->is_portable ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Name') ?></h4>
        <?= $this->Text->autoParagraph(h($equipment->name)); ?>
    </div>
    <div class="row">
        <h4><?= __('Description') ?></h4>
        <?= $this->Text->autoParagraph(h($equipment->description)); ?>
    </div>
    <div class="row">
        <h4><?= __('Location') ?></h4>
        <?= $this->Text->autoParagraph(h($equipment->location)); ?>
    </div>
</div>
