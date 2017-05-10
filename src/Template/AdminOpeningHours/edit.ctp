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
            echo $this->Form->control('weekday', ['type' => 'select', 'options' => $weekdayOptions, 'class' => 'form-control']);
        ?>

        <div class="form-group">
            <label for="start_date">Select start date</label>
            <div class="input-group" id="start_time_picker" >
            <input name="start_time" type='text' class="form-control" value="<?= $openingHour->start_time ?>"/>
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                </span>
            </div>
            <?php
            if ($this->Form->isFieldError('start_time')) {
                echo $this->Form->error('start_time');
            }
            ?>
        </div>

        <div class="form-group">
            <label for="end_date">Select end date</label>
            <div class="input-group" id="end_time_picker" >
            <input name="end_time" type='text' class="form-control" value="<?= $openingHour->end_time ?>"/>
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                </span>
            </div>
            <?php
            if ($this->Form->isFieldError('end_time')) {
                echo $this->Form->error('end_time');
            }
            ?>
        </div>

    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
