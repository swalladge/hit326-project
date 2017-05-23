<?php
/**
  * @var \App\View\AppView $this
  */
?>

<h1>Equipment View</h1>

<h2><?= h($equipment->name) ?></h2>


<?= $this->Html->link('Book', ['controller' => 'Book', 'action' => 'book2', $equipment->id], ['class' => 'btn btn-warning']) ?>


<p>
Quantity: <?= $this->Number->format($equipment->quantity) ?>
</p>

<p>
Portable: <?= $equipment->is_portable ? 'Yes' : 'No' ?>
</p>

<p>
    Location: <?= h($equipment->location) ?>
</p>

<?php if (strlen($equipment->description) > 0): ?>
<h3><?= 'Description' ?></h3>
<?= $this->Text->autoParagraph(h($equipment->description)); ?>
<?php endif; ?>
