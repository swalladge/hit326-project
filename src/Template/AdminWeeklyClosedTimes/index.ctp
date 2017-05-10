<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Weekly Closed Time'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="weeklyClosedTimes index large-9 medium-8 columns content">
    <h3><?= __('Weekly Closed Times') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('weekday') ?></th>
                <th scope="col"><?= $this->Paginator->sort('equipment_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($weeklyClosedTimes as $weeklyClosedTime): ?>
            <tr>
                <td><?= $this->Number->format($weeklyClosedTime->id) ?></td>
                <td><?= $this->Number->format($weeklyClosedTime->weekday) ?></td>
                <td><?= $weeklyClosedTime->has('equipment') ? $this->Html->link($weeklyClosedTime->equipment->name, ['controller' => 'AdminEquipment', 'action' => 'view', $weeklyClosedTime->equipment->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $weeklyClosedTime->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $weeklyClosedTime->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $weeklyClosedTime->id], ['confirm' => __('Are you sure you want to delete # {0}?', $weeklyClosedTime->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
