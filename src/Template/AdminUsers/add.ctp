<?php
/**
  * @var \App\View\AppView $this
  */
?>

<div>
<h2>Actions</h2>
<div class="btn-group">
<?= $this->Html->link(__('List Users'), ['action' => 'index'], ['class' => 'btn btn-default']) ?>
</div>
</div>


<div>
<h2>Add User</h2>
    <?= $this->Form->create($user) ?>
        <?php
            echo $this->Form->control('email', ['class' => 'form-control']);
            echo $this->Form->control('password', ['class' => 'form-control']);
            echo $this->Form->control('name', ['type' => 'text', 'class' => 'form-control']);
            echo $this->Form->control('role', ['type' => 'select', 'options' => $roleOptions, 'class' => 'form-control']);
            echo $this->Form->control('phone', ['class' => 'form-control']);
        ?>
    <?= $this->Form->button(__('Add user'), ['class' => 'btn btn-primary']) ?>
    <?= $this->Form->end() ?>
</div>
