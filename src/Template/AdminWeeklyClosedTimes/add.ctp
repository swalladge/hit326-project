<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Weekly Closed Times'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="weeklyClosedTimes form large-9 medium-8 columns content">
    <?= $this->Form->create($weeklyClosedTime) ?>
    <fieldset>
        <legend><?= __('Add Weekly Closed Time') ?></legend>
        <?php
            echo $this->Form->control('weekday');
            echo $this->Form->control('start_time');
            echo $this->Form->control('end_time');
            echo $this->Form->control('entire_day');
            echo $this->Form->control('reason');
            echo $this->Form->control('equipment_id', ['options' => $equipment, 'empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
