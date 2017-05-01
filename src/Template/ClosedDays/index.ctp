<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Closed Day'), ['action' => 'add']) ?></li>
    </ul>
</nav>

<p>
    Closed days are days outside of the normal weekly timeslot schedule where rooms or equipment cannot be booked.
</p>

<h3><?= __('Closed Days') ?></h3>
<table class="table">
    <thead>
        <tr>
            <th scope="col"><?= $this->Paginator->sort('id') ?></th>
            <th scope="col"><?= $this->Paginator->sort('date') ?></th>
            <th scope="col" class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($closedDays as $closedDay): ?>
        <tr>
            <td><?= $this->Number->format($closedDay->id) ?></td>
            <td><?= $this->Number->format($closedDay->date) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $closedDay->id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $closedDay->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $closedDay->id], ['confirm' => __('Are you sure you want to delete # {0}?', $closedDay->id)]) ?>
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
