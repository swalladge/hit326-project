<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Closed Time'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="closedTimes index large-9 medium-8 columns content">
    <h3><?= __('Closed Times') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('equipment_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($closedTimes as $closedTime): ?>
            <tr>
                <td><?= $this->Number->format($closedTime->id) ?></td>
                <td><?= $closedTime->has('equipment') ? $this->Html->link($closedTime->equipment->name, ['controller' => 'AdminEquipment', 'action' => 'view', $closedTime->equipment->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $closedTime->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $closedTime->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $closedTime->id], ['confirm' => __('Are you sure you want to delete # {0}?', $closedTime->id)]) ?>
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
