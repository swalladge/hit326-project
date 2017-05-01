<?php
/**
  * @var \App\View\AppView $this
  */

?>

<h3><?= 'Notices Admin' ?></h3>

<p>
    Notices are system notices that can be configured to display within certain
date ranges. They display on the homepage and can be used for alerts, upcoming
events, import information, etc.
</p>

<div>
<h2>Actions</h2>
<div class="btn-group">
<?= $this->Html->link(__('New Notice'), ['action' => 'add'], ['class' => 'btn btn-primary']) ?>
</div>
</div>



<table class="table">
    <thead>
        <tr>
            <th scope="col"><?= $this->Paginator->sort('display_from') ?></th>
            <th scope="col"><?= $this->Paginator->sort('display_to') ?></th>
            <th scope="col"><?= $this->Paginator->sort('title') ?></th>
            <th scope="col" class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($notices as $notice): ?>
        <tr>
            <td><?= $notice->display_from ?></td>
            <td><?= $notice->display_to ?></td>
            <td><?= h($notice->title); ?></td>
            <td class="actions">
                <div class="btn-group">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $notice->id], ['class' => 'btn btn-default']) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $notice->id], ['class' => 'btn btn-warning']) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $notice->id], ['confirm' => __('Are you sure you want to delete "{0}"?', $notice->title), 'class' => 'btn btn-danger']) ?>
                </div>
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

