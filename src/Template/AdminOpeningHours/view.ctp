<?php
/**
  * @var \App\View\AppView $this
  */
?>
<div>
<h2>Actions</h2>
<div class="btn-group">
<?= $this->Html->link(__('List Opening Hours'), ['action' => 'index'], ['class' => 'btn btn-default']) ?>
<?= $this->Html->link(__('New opening hours entry'), ['action' => 'add'], ['class' => 'btn btn-primary']) ?>
<?= $this->Html->link(__('Edit'), ['action' => 'edit', $openingHour->id], ['class' => 'btn btn-warning']) ?>
<?= $this->Form->postLink(
    __('Delete'),
    ['action' => 'delete', $openingHour->id],
    ['confirm' => __('Are you sure you want to delete "{0}"?', $openingHour->id), 'class' => 'btn btn-danger']
)
?>
</div>
</div>


<h2>Editing opening hours entry</h2>

<h3>Weekday</h3>
<?= $weekdays[$openingHour->weekday] ?>

<h3>Start time</h3>
<?= h($openingHour->start_time) ?>

<h3>End time</h3>
<?= h($openingHour->end_time) ?>
