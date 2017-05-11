<?php
/**
  * @var \App\View\AppView $this
  */
?>


<div>
<h2>Actions</h2>
<div class="btn-group">
<?= $this->Html->link(__('List Equipment'), ['action' => 'index'], ['class' => 'btn btn-default']) ?>
<?= $this->Html->link(__('New Equipment'), ['action' => 'add'], ['class' => 'btn btn-primary']) ?>
<?= $this->Html->link(__('Edit'), ['action' => 'edit', $equipment->id], ['class' => 'btn btn-warning']) ?>
<?= $this->Form->postLink(
    __('Delete'),
    ['action' => 'delete', $equipment->id],
    ['confirm' => __('Are you sure you want to delete "{0}"?', $equipment->name), 'class' => 'btn btn-danger']
)
?>
</div>
</div>



<h2><?= h($equipment->name) ?></h2>
    <table class="table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($equipment->id) ?></td>
        </tr>
        <tr>
            <th scope="row">Location</th>
            <td><?= h($equipment->location) ?></td>
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
        <h3><?= __('Name') ?></h3>
        <?= h($equipment->name); ?>
    </div>

    <div class="row">
        <h3><?= __('Description') ?></h3>
        <?= $this->Text->autoParagraph(h($equipment->description)); ?>
    </div>

    <div class="row">
        <h3><?= __('Location') ?></h3>
        <?= h($equipment->location); ?>
    </div>
