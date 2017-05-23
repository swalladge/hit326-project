<?php
/**
  * @var \App\View\AppView $this
  */
?>
<div>
<h2>Actions</h2>
<div class="btn-group">
<?= $this->Html->link('List Bookings', ['action' => 'index'], ['class' => 'btn btn-default']) ?>
<?= $this->Html->link('New Booking', ['action' => 'add'], ['class' => 'btn btn-primary']) ?>
<?= $this->Form->postLink(
    __('Delete'),
    ['action' => 'delete', $booking->id],
    ['confirm' => 'Are you sure you want to delete this booking?', 'class' => 'btn btn-danger']
)
?>
</div>
</div>

<h2><?= 'Edit Booking' ?></h2>
<?= $this->Form->create($booking) ?>

        <div class="form-group">
            <b>User</b>: <a href="/admin/users/<?= $booking->user['id'] ?>"><?= h($booking->user['email']) ?></a>
        </div>
        <?php
            echo $this->Form->control('equipment_id', ['class' => 'form-control', 'options' => $equipment]);
            echo $this->Form->control('state',['options' => $stateOptions, 'class' => 'form-control']);
        ?>

<div class="form-group">
    <label for="start_date">Start date/time</label>
    <div class="input-group" id="start_datetime_picker">
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
    <div class="input-group" id="end_datetime_picker">
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

<?= $this->Form->control('user_notes',['class' => 'form-control']) ?>
<?= $this->Form->control('admin_notes',['label' => 'Admin notes to user', 'class' => 'form-control']) ?>
<?= $this->Form->button('Save', ['class' => 'btn btn-primary']) ?>
<?= $this->Form->end() ?>
