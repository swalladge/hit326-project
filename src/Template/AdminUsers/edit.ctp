<?php
/**
  * @var \App\View\AppView $this
  */
?>

<div>
<h2>Actions</h2>
<div class="btn-group">
<?= $this->Html->link(__('List Users'), ['action' => 'index'], ['class' => 'btn btn-default']) ?>
<?= $this->Form->postLink(
    __('Delete'),
    ['action' => 'delete', $user->id],
    ['confirm' => __('Are you sure you want to delete {0}?', $user->email), 'class' => 'btn btn-danger']
)
?>
</div>
</div>

<div>
<h2>Edit User</h2>
    <?= $this->Form->create($user) ?>
        <?= $this->Form->control('email', ['class' => 'form-control']) ?>

        <div class="form-group">
            <label for="password">Password (leave blank if you don't want to change the password)</label>
                <input name="password" id="password" type="password" class="form-control" />
            </div>
            <?php
            if ($this->Form->isFieldError('password')) {
                echo $this->Form->error('password');
            }
            ?>
        </div>

        <?php
            echo $this->Form->control('role', ['type' => 'select', 'options' => $roleOptions, 'class' => 'form-control']);
            echo $this->Form->control('phone', ['class' => 'form-control']);
        ?>
    <?= $this->Form->button('Save', ['class' => 'btn btn-primary']) ?>
    <?= $this->Form->end() ?>
</div>
