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

         <div >
         <?= $this->Html->link(
                 $this->Html->tag('b',$equipment->name)."   -   "
                 .$equipment->location
                 .$this->Html->tag('span',$equipment->quantity,array('class' => 'badge'))
                 .$this->Html->tag('span',$equipment->is_portable ?  'P' : '',array('class' => 'badge'))  ."   "
                 .$this->Html->link('Book', ['controller' => 'Book', 'action' => 'book2', $equipment->id], ['class' => 'btn btn-primary','style' => 'height:inherit;']),
             ['controller' => 'Equipment', 'action' => 'view', $equipment->id],
              ['class' => 'list-group-item list-group-item-info','style' => 'width:70%;display:inline-block;','escape'=>false]) ?>


         </div>


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

