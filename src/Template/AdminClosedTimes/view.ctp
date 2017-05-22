<?php
/**
  * @var \App\View\AppView $this
  */
?>

<div>
<h2>Actions</h2>
<div class="btn-group">
<?= $this->Html->link(__('List Closed Times'), ['action' => 'index'], ['class' => 'btn btn-default']) ?>
<?= $this->Html->link(__('New Closed Time'), ['action' => 'add'], ['class' => 'btn btn-primary']) ?>
<?= $this->Html->link(__('Edit'), ['action' => 'edit', $closedTime->id], ['class' => 'btn btn-warning']) ?>
<?= $this->Form->postLink(
    __('Delete'),
    ['action' => 'delete', $closedTime->id],
    ['confirm' => 'Are you sure you want to delete this entry?', 'class' => 'btn btn-danger']
)
?>
</div>
</div>



<h2>Closed Time</h2>

<h3>Equipment</h3>
<p><?= $closedTime->has('equipment') ? $this->Html->link($closedTime->equipment->name, ['controller' => 'AdminEquipment', 'action' => 'view', $closedTime->equipment->id]) : 'none' ?></p>

<h3>Start Time</h3>
<?= $this->Text->autoParagraph(h($closedTime->start_time)); ?>

<h3>End Time</h3>
<?= $this->Text->autoParagraph(h($closedTime->end_time)); ?>

<h3>Reason</h3>
<?= $this->Text->autoParagraph(h($closedTime->reason)); ?>
