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
                ['action' => 'delete', $closedTime->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $closedTime->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Closed Times'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="closedTimes form large-9 medium-8 columns content">
    <?= $this->Form->create($closedTime) ?>
    <fieldset>
        <legend><?= __('Edit Closed Time') ?></legend>
        <?php
            echo $this->Form->control('start_time');
            echo $this->Form->control('end_time');
            echo $this->Form->control('reason');
            echo $this->Form->control('equipment_id', ['options' => $equipment, 'empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
