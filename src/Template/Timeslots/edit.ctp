<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $timeslot->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $timeslot->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Timeslots'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="timeslots form large-9 medium-8 columns content">
    <?= $this->Form->create($timeslot) ?>
    <fieldset>
        <legend><?= __('Edit Timeslot') ?></legend>
        <?php
            echo $this->Form->control('weekday');
            echo $this->Form->control('start_time');
            echo $this->Form->control('duration');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>