<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Opening Hour'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="openingHours index large-9 medium-8 columns content">
    <h3><?= __('Opening Hours') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('weekday') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($openingHours as $openingHour): ?>
            <tr>
                <td><?= $this->Number->format($openingHour->id) ?></td>
                <td><?= $this->Number->format($openingHour->weekday) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $openingHour->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $openingHour->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $openingHour->id], ['confirm' => __('Are you sure you want to delete # {0}?', $openingHour->id)]) ?>
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
