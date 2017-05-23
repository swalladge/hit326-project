<?php
/**
  * @var \App\View\AppView $this
  */
?>


<h1>Browse Equipment</h1>

<p class="lead">Please select an item to book.</p>


<p><span class="badge">P</span> = portable</p>
<p><span class="badge">2</span> = quantity</p>

<hr>

 <div class="list-group" >
         <?php foreach ($equipment as $equipment): ?>
         <?= $this->Html->link(
                 $this->Html->tag('b',$equipment->name)."   -   "
                 .$equipment->location
                 .$this->Html->tag('span',$equipment->quantity,array('class' => 'badge'))
                 .$this->Html->tag('span',$equipment->is_portable ?  'P' : '',array('class' => 'badge'))  ."   ",
             ['controller' => 'Book', 'action' => 'book2', $equipment->id],
              ['class' => 'list-group-item list-group-item-info','style' => '','escape'=>false]) ?>
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

