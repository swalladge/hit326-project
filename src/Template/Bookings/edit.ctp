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
    edit booking id <?= $this->request->params['id'] ?>
</p>

<form method="post">
    edit form
    <input type="submit" value="Save">
</form>

