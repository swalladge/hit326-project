<?php
/**
  * @var \App\View\AppView $this
  */
?>


<h1>Browse Equipment</h1>

<p class="lead">Please select an item to view or book.</p>

<!-- TODO: turn this into a mobile friendly list of equipment, rather than a table -->
 <div class="list-group" >
         <?php foreach ($equipment as $equipment): ?>
         <a>
         <?=
         $this->Html->link(
             $equipment->name." ".$equipment->location,
             ['controller' => 'Equipment', 'action' => 'view', $equipment->id],
              ['class' => 'list-group-item list-group-item-success']) ?>
    </a>
            <?php endforeach; ?>
  </div>
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

