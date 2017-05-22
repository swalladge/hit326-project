<?php
/**
  * @var \App\View\AppView $this
  */
?>

<div>
<h2>Actions</h2>
<div class="btn-group">
<?= $this->Html->link(__('List Opening Hours'), ['action' => 'index'], ['class' => 'btn btn-default']) ?>
</div>
</div>


<h2>Add opening hour entry</h2>

<?= $this->Form->create($openingHour) ?>

    <?php
        echo $this->Form->control('weekday', ['type' => 'select', 'options' => $weekdayOptions, 'class' => 'form-control']);
    ?>

    <div class="form-group">
        <label for="start_date">Select start time</label>
        <div class="input-group" id="start_time_picker" >
        <input name="start_time" type='text' class="form-control" value=""/>
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
        <label for="end_date">Select end time</label>
        <div class="input-group" id="end_time_picker" >
        <input name="end_time" type='text' class="form-control" value=""/>
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

<?= $this->Form->button('Save', ['class' => 'btn btn-primary']) ?>
<?= $this->Form->end() ?>
