<?php
/**
  * @var \App\View\AppView $this
  */
?>

<div>
<h2>Actions</h2>
<div class="btn-group">
<?= $this->Html->link(__('List Equipment'), ['action' => 'index'], ['class' => 'btn btn-default']) ?>
<?= $this->Form->postLink(
    __('Delete'),
    ['action' => 'delete', $equipment->id],
    ['confirm' => __('Are you sure you want to delete "{0}"?', $equipment->name), 'class' => 'btn btn-danger']
)
?>
</div>
</div>


<h2>Edit Equipment</h2>

<?= $this->Form->create($equipment) ?>
    <?php
        echo $this->Form->control('name', ['type' => 'text', 'class' => 'form-control']);
        echo $this->Form->control('description', ['class' => 'form-control']);
        echo $this->Form->control('location', ['type' => 'text', 'class' => 'form-control']);
        echo $this->Form->control('is_portable', ['class' => 'form-control']);
        echo $this->Form->control('quantity', ['class' => 'form-control']);
        echo $this->Form->control('is_active', ['class' => 'form-control']);
    ?>
<?= $this->Form->button('Save', ['class' => 'btn btn-primary']) ?>
<?= $this->Form->end() ?>
