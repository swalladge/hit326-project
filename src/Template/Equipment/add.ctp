<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Equipment'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="equipment form large-9 medium-8 columns content">
    <?= $this->Form->create($equipment) ?>
    <fieldset>
        <legend><?= __('Add Equipment') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('description');
            echo $this->Form->control('location');
            echo $this->Form->control('is_portable');
            echo $this->Form->control('quantity');
            echo $this->Form->control('is_active');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
