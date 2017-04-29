<?php

use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Core\Plugin;
use Cake\Datasource\ConnectionManager;
use Cake\Error\Debugger;
use Cake\Network\Exception\NotFoundException;

$this->layout = 'default';

$id = $this->request->params['id'];
?>

<p>
    Equipment id <?= $id ?>
</p>

<form action="/equipment/<?= $id ?>" method="post">
    edit form
    <!-- need this hidden input to make cakephp send to the PUT handler -->
    <input type="hidden" name="_method" value="PUT">
    <input type="submit" value="Save">
</form>

<form action="/equipment/<?= $id ?>" method="post">
    <input type="hidden" name="_method" value="DELETE">
    <input type="submit" value="Remove booking">
</form>

