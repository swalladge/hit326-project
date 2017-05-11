<?php
/**
  * @var \App\View\AppView $this
  */
?>

<h1>Admin Equipment Management</h1>

<div>
<h2>Actions</h2>
<div class="btn-group">
<?= $this->Html->link('New Equipment', ['action' => 'add'], ['class' => 'btn btn-primary']) ?>
</div>
</div>


<h2>Equipment</h2>
<table class="table">
    <thead>
        <tr>
            <th scope="col"><?= $this->Paginator->sort('name') ?></th>
            <th scope="col"><?= $this->Paginator->sort('location') ?></th>
            <th scope="col"><?= $this->Paginator->sort('is_portable') ?></th>
            <th scope="col"><?= $this->Paginator->sort('quantity') ?></th>
            <th scope="col"><?= $this->Paginator->sort('is_active') ?></th>
            <th scope="col" class="actions">Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($equipment as $equipment): ?>
        <tr>
            <td><?= $equipment->name ?></td>
            <td><?= h($equipment->location) ?></td>
            <td><?= $equipment->is_portable ? 'yes' : 'no' ?></td>
            <td><?= $this->Number->format($equipment->quantity) ?></td>
            <td><?= $this->Number->format($equipment->is_active) ?></td>
            <td class="actions">
<div class="btn-group">
                <?= $this->Html->link('View', ['action' => 'view', $equipment->id], ['class' => 'btn btn-primary']) ?>
                <?= $this->Html->link('Edit', ['action' => 'edit', $equipment->id], ['class' => 'btn btn-warning']) ?>
                <?= $this->Form->postLink('Delete', ['action' => 'delete', $equipment->id], ['confirm' => 'Are you sure you want to delete "'. $equipment->name . '"?', 'class' => 'btn btn-danger']) ?>
                </div>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<div class="paginator">
    <ul class="pagination">
        <?= $this->Paginator->first('<< ' . 'first') ?>
        <?= $this->Paginator->prev('< ' . 'previous') ?>
        <?= $this->Paginator->numbers() ?>
        <?= $this->Paginator->next('next' . ' >') ?>
        <?= $this->Paginator->last('last' . ' >>') ?>
    </ul>
    <p><?= $this->Paginator->counter(['format' => 'Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total']) ?></p>
</div>
