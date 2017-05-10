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
        ?>

        <div class="form-group">
            <label for="start_time">Select start time</label>
            <div class='input-group date-picker' >
            <input name="start_time" id="start_time" type='text' class="form-control" value=""/>
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
            <label for="end_time">Select end time</label>
            <div class='input-group date-picker' >
            <input name="end_time" id="end_time" type='text' class="form-control" value=""/>
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

        <?php
            echo $this->Form->control('reason');
            echo $this->Form->control('equipment_id', ['options' => $equipment, 'empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
