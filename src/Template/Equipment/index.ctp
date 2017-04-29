<?php

use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Core\Plugin;
use Cake\Datasource\ConnectionManager;
use Cake\Error\Debugger;
use Cake\Network\Exception\NotFoundException;

$this->layout = 'default';

?>

<p>
    Admin equipment (and rooms too?) listing page
</p>

<p>
    <a href="/equipment/new">add new thing</a>
</p>

<table class="table">
    <thead>
        <tr>
            <th>Equipment</th>
            <th>Notes</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>

        <?php foreach ($equipment as $item): ?>
            <tr>
                <td><?= $item->name ?></td>
                <td><?= $item->notes ?></td>
                <td><a href="/equipment/<?= $item->id ?>">edit</a></td>
            </tr>
        <?php endforeach; ?>

    </tbody>
</table>

