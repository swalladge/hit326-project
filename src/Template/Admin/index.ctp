<?php

use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Core\Plugin;
use Cake\Datasource\ConnectionManager;
use Cake\Error\Debugger;
use Cake\Network\Exception\NotFoundException;

$this->layout = 'default';

?>

<h1>Admin Dashboard</h1>


<h2>Content management categories</h2>

<div class="list-group">
    <a class="list-group-item" href="/admin/bookings">Bookings</a>
    <a class="list-group-item" href="/admin/notices">System Notices</a>
    <a class="list-group-item" href="/admin/equipment">Equipment</a>
    <a class="list-group-item" href="/admin/opening-hours">Opening Hours</a>
    <a class="list-group-item" href="/admin/closed-times">Once-Off Closed Times</a>
    <a class="list-group-item" href="/admin/users">Users</a>
</div>

<h2>Maintenance</h2>

<h3>Old Bookings</h3>

<p>
Old bookings are bookings where the end date is in the past.
</p>

<?= $this->Form->create(null, ['type' => 'post', 'url' => '/admin/clean-old-bookings']) ?>
<input type="submit" class="btn btn-danger" value="Remove old bookings">
<?= $this->Form->end() ?>
