<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Closed Times'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="closedTimes form large-9 medium-8 columns content">
    <?= $this->Form->create($closedTime) ?>
    <fieldset>
        <legend><?= __('Add Closed Time') ?></legend>

        <div class="form-group">
            <label for="start_date">Select start date</label>
            <div class='input-group date-picker' >
            <input name="start_time" id="start_date" type='text' class="form-control" value=""/>
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
            <div class='input-group date-picker' >
            <input name="end_time" id="end_date" type='text' class="form-control" value=""/>
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
