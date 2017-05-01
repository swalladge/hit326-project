<?php
/**
  * @var \App\View\AppView $this
  */

$templates = ['inputContainer' => '<div class="form-group">{{content}}</div>'];
$this->Form->setTemplates($templates);

?>

<div>
<h2>Actions</h2>
<?= $this->Html->link(__('List Notices'), ['action' => 'index'], ['class' => 'btn btn-default']) ?>
</div>



<h2>Add Notice</h2>

<?= $this->Form->create($notice) ?>
<?php
echo $this->Form->control('display_from', ['class' => 'form-control']);
echo $this->Form->control('display_to', ['class' => 'form-control']);
echo $this->Form->control('title', ['type' => 'text', 'class' => 'form-control']);
echo $this->Form->control('content', ['class' => 'form-control']);
?>
<?= $this->Form->button(__('Save'), ['class' => 'btn btn-primary']) ?>
<?= $this->Form->end() ?>

