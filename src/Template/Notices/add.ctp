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

<div class="form-group">
    <label for="display-from">Display From (also displayed as posted date)</label>
    <div class='input-group date-picker' >
        <input name="display_from" id="display-from" type='text' class="form-control" />
        <span class="input-group-addon">
            <span class="glyphicon glyphicon-calendar"></span>
        </span>
    </div>
    <?php
    if ($this->Form->isFieldError('display_from')) {
        echo $this->Form->error('display_from');
    }
    ?>
</div>

<div class="form-group">
    <label for="display-to">Display To</label>
    <div class='input-group date-picker' >
        <input name="display_to" id="display-to" type='text' class="form-control" />
        <span class="input-group-addon">
            <span class="glyphicon glyphicon-calendar"></span>
        </span>
    </div>
    <?php
    if ($this->Form->isFieldError('display_to')) {
        echo $this->Form->error('display_to');
    }
    ?>
</div>

<?php
echo $this->Form->control('title', ['type' => 'text', 'class' => 'form-control']);
echo $this->Form->control('content', ['class' => 'form-control']);
?>
<?= $this->Form->button(__('Save'), ['class' => 'btn btn-primary']) ?>
<?= $this->Form->end() ?>

