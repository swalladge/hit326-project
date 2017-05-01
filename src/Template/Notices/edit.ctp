<?php
/**
  * @var \App\View\AppView $this
  */

// TODO: how to make this load from one place without needing to put it in each
// view?
$templates = ['inputContainer' => '<div class="form-group">{{content}}</div>'];
$this->Form->setTemplates($templates);

?>

<div>
<h2>Actions</h2>
<div class="btn-group">
<?= $this->Html->link(__('List Notices'), ['action' => 'index'], ['class' => 'btn btn-default']) ?>
<?= $this->Form->postLink(
    __('Delete'),
    ['action' => 'delete', $notice->id],
    ['confirm' => __('Are you sure you want to delete # {0}?', $notice->id), 'class' => 'btn btn-danger']
)
?>
</div>
</div>


<h2>Edit Notice</h2>

    <?= $this->Form->create($notice) ?>
<?php
echo $this->Form->control('display_from', ['class' => 'form-control']);
echo $this->Form->control('display_to', ['class' => 'form-control']);
echo $this->Form->control('title', ['type' => 'text', 'class' => 'form-control']);
echo $this->Form->control('content', ['class' => 'form-control']);
?>
    <?= $this->Form->button(__('Save'), ['class' => 'btn btn-primary']) ?>
    <?= $this->Form->end() ?>

