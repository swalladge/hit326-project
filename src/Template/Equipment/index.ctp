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
        <tr>
            <td>Printer</td>
            <td></td>
            <td><a href="/equipment/1">edit</a></td>
        </tr>
        <tr>
            <td>Computer</td>
            <td></td>
            <td><a href="/equipment/2">edit</a></td>
        </tr>
    </tbody>
</table>

