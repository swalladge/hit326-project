<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Notice'), ['action' => 'edit', $notice->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Notice'), ['action' => 'delete', $notice->id], ['confirm' => __('Are you sure you want to delete # {0}?', $notice->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Notices'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Notice'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="notices view large-9 medium-8 columns content">
    <h3><?= h($notice->title) ?></h3>
    <table class="vertical-table table">
        <tr>
            <th scope="row"><?= __('Display From') ?></th>
            <td><?= $this->Number->format($notice->display_from) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Display To') ?></th>
            <td><?= $this->Number->format($notice->display_to) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Title') ?></h4>
        <?= h($notice->title); ?>
    </div>
    <div class="row">
        <h4><?= __('Content') ?></h4>
        <?= $this->Text->autoParagraph(h($notice->content)); ?>
    </div>
</div>
