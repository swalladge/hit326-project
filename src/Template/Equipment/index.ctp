<?php
/**
  * @var \App\View\AppView $this
  */
?>


<h1>Browse Equipment</h1>

<p class="lead">Please select an item to view or book.</p>

<!-- TODO: turn this into a mobile friendly list of equipment, rather than a table -->
<table class="table">
    <thead>
        <tr>
            <th scope="col"><?= $this->Paginator->sort('name') ?></th>
            <th scope="col"><?= $this->Paginator->sort('is_portable') ?></th>
            <th scope="col"><?= $this->Paginator->sort('quantity') ?></th>
            <th scope="col"><?= $this->Paginator->sort('location') ?></th>
            <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($equipment as $equipment): ?>
        <tr>
            <td>
                <?= $this->Html->link(h($equipment->name), ['action' => 'view', $equipment->id]) ?>
            </td>
            <td><?= $equipment->is_portable ?  'yes' : 'no'  ?></td>
            <td><?= $this->Number->format($equipment->quantity) ?></td>
            <td><?= h($equipment->location) ?></td>
            <td>
                <div class="btn-group">
                    <?= $this->Html->link('Book', ['controller' => 'Book', 'action' => 'book2', $equipment->id], ['class' => 'btn btn-warning']) ?>
                    <?= $this->Html->link('View', ['controller' => 'Equipment', 'action' => 'view', $equipment->id], ['class' => 'btn btn-primary']) ?>
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

