<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Closed Days'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="closedDays form large-9 medium-8 columns content">
    <?= $this->Form->create($closedDay) ?>
    <fieldset>
        <legend><?= __('Add Closed Day') ?></legend>
        <?php
            echo $this->Form->control('date');
            echo $this->Form->control('reason');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
