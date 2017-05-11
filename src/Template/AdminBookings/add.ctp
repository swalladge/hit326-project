<?php
/**
  * @var \App\View\AppView $this
  */
?>

<div>
<h2>Actions</h2>
<div class="btn-group">
<?= $this->Html->link('List Bookings', ['action' => 'index'], ['class' => 'btn btn-default']) ?>
</div>
</div>



<h2><?= 'Create Booking' ?></h2>

<?= $this->Form->create($booking) ?>

        <?php
            echo $this->Form->control('user_id', ['class' => 'form-control', 'options' => $user, 'empty' => true]);
            echo $this->Form->control('equipment_id', ['class' => 'form-control', 'options' => $equipment, 'empty' => true]);
            echo $this->Form->control('state',['options' => $stateOptions, 'class' => 'form-control']);
        ?>

<div class="form-group">
    <label for="start_date">Start date/time</label>
    <div class="input-group" id="start_date_picker">
        <?= $this->Form->text('start_date', ['class' => 'form-control', 'id' => 'start_date']) ?>
        <span class="input-group-addon">
            <span class="glyphicon glyphicon-calendar"></span>
        </span>
    </div>
    <?php
    if ($this->Form->isFieldError('start_date')) {
        echo $this->Form->error('start_date');
    }
    ?>
</div>

<div class="form-group">
    <label for="end_date">End date/time</label>
    <div class="input-group" id="end_date_picker">
        <?= $this->Form->text('end_date', ['class' => 'form-control', 'id' => 'end_date']) ?>
        <span class="input-group-addon">
            <span class="glyphicon glyphicon-calendar"></span>
        </span>
    </div>
    <?php
    if ($this->Form->isFieldError('end_date')) {
        echo $this->Form->error('end_date');
    }
    ?>
</div>
<?= $this->Form->button('Save', ['class' => 'btn btn-primary']) ?>
<?= $this->Form->end() ?>
