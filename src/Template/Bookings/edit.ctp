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
    Booking id <?= $this->request->params['id'] ?> updated. In future, this
    shouldn't be a view, but rather redirect back to the item or return json data
</p>

