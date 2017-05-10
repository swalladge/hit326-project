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
                ['action' => 'delete', $booking->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $booking->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Bookings'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="bookings form large-9 medium-8 columns content">
    <?= $this->Form->create($booking) ?>
    <fieldset>
        <legend><?= __('Edit Booking') ?></legend>

        <div class="form-group">
            <b>User</b>: <a href="/admin/users/<?= $booking->user['id'] ?>"><?= h($booking->user['email']) ?></a>
        </div>
        <?php
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
    </fieldset>
    <?= $this->Form->button('Save', ['class' => 'btn btn-primary']) ?>
    <?= $this->Form->end() ?>
</div>
