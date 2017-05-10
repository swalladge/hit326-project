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
                ['action' => 'delete', $openingHour->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $openingHour->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Opening Hours'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="openingHours form large-9 medium-8 columns content">
    <?= $this->Form->create($openingHour) ?>
    <fieldset>
        <legend><?= __('Edit Opening Hour') ?></legend>
        <?php
            echo $this->Form->control('weekday');
            echo $this->Form->control('start_time');
            echo $this->Form->control('end_time');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
