<?php
/**
  * @var \App\View\AppView $this
  */
?>


<h2><?= h($equipment->name) ?></h2>


<div class="btn-group">
    <?= $this->Html->link('Book', ['controller' => 'Book', 'action' => 'book2', $equipment->id], ['class' => 'btn btn-primary']) ?>
    <?= $this->Html->link('List of equipment', ['controller' => 'Equipment', 'action' => 'index'], ['class' => 'btn btn-warning']) ?>
</div>


<p>
Quantity: <?= $this->Number->format($equipment->quantity) ?>
</p>

<p>
Portable: <?= $equipment->is_portable ? 'Yes' : 'No' ?>
</p>

<p>
    Location: <?= h($equipment->location) ?>
</p>

<h3><?= 'Description' ?></h3>

<?= $this->Text->autoParagraph(h($equipment->description)); ?>
