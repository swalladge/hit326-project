<?php
/**
  * @var \App\View\AppView $this
  */
?>

<h1>Admin Closed Times Management</h1>

<div>
<h2>Actions</h2>
<div class="btn-group">
<?= $this->Html->link('New Closed Time', ['action' => 'add'], ['class' => 'btn btn-primary']) ?>
</div>
</div>


<h3>Closed Times</h3>
<table class="table">
    <thead>
        <tr>
            <th scope="col"><?= $this->Paginator->sort('start_time') ?></th>
            <th scope="col"><?= $this->Paginator->sort('end_time') ?></th>
            <th scope="col"><?= $this->Paginator->sort('equipment_id') ?></th>
            <th scope="col" class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($closedTimes as $closedTime): ?>
        <tr>
            <td><?= $closedTime->start_time ?></td>
            <td><?= $closedTime->end_time ?></td>
            <td><?= $closedTime->has('equipment') ? $this->Html->link($closedTime->equipment->name, ['controller' => 'AdminEquipment', 'action' => 'view', $closedTime->equipment->id]) : '' ?></td>
            <td class="actions">
<div class="btn-group">
                <?= $this->Html->link(__('View'), ['action' => 'view', $closedTime->id], ['class' => 'btn btn-primary']) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $closedTime->id], ['class' => 'btn btn-warning']) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $closedTime->id], ['confirm' => 'Are you sure you want to delete this entry?', 'class' => 'btn btn-danger']) ?>
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
