<?php
/**
  * @var \App\View\AppView $this
  */
?>


<h1>Admin Opening Hours Management</h1>

<div>
<h2>Actions</h2>
<div class="btn-group">
<?= $this->Html->link('New opening hours entry', ['action' => 'add'], ['class' => 'btn btn-primary']) ?>
</div>
</div>


<h2>Opening Hours</h2>
<table class="table">
    <thead>
        <tr>
            <th scope="col"><?= $this->Paginator->sort('weekday') ?></th>
            <th scope="col"><?= $this->Paginator->sort('start_time') ?></th>
            <th scope="col"><?= $this->Paginator->sort('end_time') ?></th>
            <th scope="col" class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($openingHours as $openingHour): ?>
        <tr>
            <td><?= $weekdayOptions[$openingHour->weekday] ?></td>
            <td><?= h($openingHour->start_time) ?></td>
            <td><?= h($openingHour->end_time) ?></td>
            <td class="actions">
                <div class="btn-group">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $openingHour->id], ['class' => 'btn btn-primary']) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $openingHour->id], ['class' => 'btn btn-warning']) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $openingHour->id], ['confirm' => __('Are you sure you want to delete # {0}?', $openingHour->id), 'class' => 'btn btn-danger']) ?>
                </div>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<div class="paginator">
    <ul class="pagination">
        <?= $this->Paginator->first('<< ' . __('first')) ?>
        <?= $this->Paginator->prev('< ' . __('previous')) ?>
        <?= $this->Paginator->numbers() ?>
        <?= $this->Paginator->next(__('next') . ' >') ?>
        <?= $this->Paginator->last(__('last') . ' >>') ?>
    </ul>
    <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
</div>
