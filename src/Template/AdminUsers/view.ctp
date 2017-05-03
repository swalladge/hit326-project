<?php
/**
  * @var \App\View\AppView $this
  */
?>


<div>
<h2>Actions</h2>
<div class="btn-group">
<?= $this->Html->link(__('List Users'), ['action' => 'index'], ['class' => 'btn btn-default']) ?>
<?= $this->Html->link(__('New User'), ['action' => 'add'], ['class' => 'btn btn-primary']) ?>
<?= $this->Html->link(__('Edit'), ['action' => 'edit', $user->id], ['class' => 'btn btn-warning']) ?>
<?= $this->Form->postLink(
    __('Delete'),
    ['action' => 'delete', $user->id],
    ['confirm' => __('Are you sure you want to delete {0}?', $user->email), 'class' => 'btn btn-danger']
)
?>
</div>
</div>

<h2>User</h2>

<div>
    <div class="row">
        <h4><?= __('Email') ?></h4>
        <?= $this->Text->autoParagraph(h($user->email)); ?>
    </div>
    <div class="row">
        <h4><?= __('Role') ?></h4>
        <?= $this->Text->autoParagraph(h($user->role)); ?>
    </div>
    <div class="row">
        <h4><?= __('Phone') ?></h4>
        <?= $this->Text->autoParagraph(h($user->phone)); ?>
    </div>
</div>
