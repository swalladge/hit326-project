<?php
/**
  * @var \App\View\AppView $this
  */
?>

<div>
<h2>Actions</h2>
<div class="btn-group">
<?= $this->Html->link(__('List Notices'), ['action' => 'index'], ['class' => 'btn btn-default']) ?>
<?= $this->Html->link(__('New Notice'), ['action' => 'add'], ['class' => 'btn btn-primary']) ?>
<?= $this->Html->link(__('Edit'), ['action' => 'edit', $notice->id], ['class' => 'btn btn-warning']) ?>
<?= $this->Form->postLink(
    __('Delete'),
    ['action' => 'delete', $notice->id],
    ['confirm' => __('Are you sure you want to delete # {0}?', $notice->id), 'class' => 'btn btn-danger']
)
?>
</div>
</div>


<div class="notices view large-9 medium-8 columns content">
    <h3><?= h($notice->title) ?></h3>
    <table class="vertical-table table">
        <tr>
            <th scope="row"><?= __('Display From') ?></th>
            <td><?= $this->Number->format($notice->display_from) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Display To') ?></th>
            <td><?= $this->Number->format($notice->display_to) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Title') ?></h4>
        <?= h($notice->title); ?>
    </div>
    <div class="row">
        <h4><?= __('Content') ?></h4>
        <?= $this->Text->autoParagraph(h($notice->content)); ?>
    </div>
</div>
