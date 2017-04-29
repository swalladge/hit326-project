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
    booking added via POST to /bookings
</p>

<p>
    equipment id: <?= $data['id'] ?>
</p>

<p>
    timeslot chosen: <?= $data['timeslot'] ?>
</p>

<p>
    notes: <?= $data['notes'] ?>
</p>
