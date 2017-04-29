<?php

use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Core\Plugin;
use Cake\Datasource\ConnectionManager;
use Cake\Error\Debugger;
use Cake\Network\Exception\NotFoundException;

$this->layout = 'default';

?>

<p>Select equipment to book.</p>

<?php foreach ($equipment as $item): ?>
    <a class="block" href="/book/<?= $item->id ?>">
        <h3><?= $item->name ?></h3>
        <p><?= $item->notes ?></p>

    </a>
<?php endforeach; ?>
