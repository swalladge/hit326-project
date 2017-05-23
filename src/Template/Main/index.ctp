<?php

use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Core\Plugin;
use Cake\Datasource\ConnectionManager;
use Cake\Error\Debugger;
use Cake\Network\Exception\NotFoundException;

$this->layout = 'default';

?>



<?php if ($loggedIn): ?>

<div class="col-sm-6 col-md-8">

<h1>Equipment Booking</h1>

<p class="lead">
    Welcome to the equipment booking service!
</p>


<div class="btn-group">
<a class="btn btn-warning" href="/equipment" role="button">New Booking</a>
<a class="btn btn-primary" href="/bookings" role="button">View Bookings</a>
</div>

<hr class="hidden-sm hidden-md hidden-lg">

</div>


<div class="notices-panel col-sm-6 col-md-4">
<h2>System Notices</h2>

<?php if ($userRole == 'admin'): ?>
<p>
  <div class="btn-group">
       <a href="/admin/notices" role="button" class="btn btn-primary">Manage notices</a>
       <a href="/admin/notices/new" role="button" class="btn btn-warning">New notice</a>
  </div>
</p>
<?php endif; ?>
<?php if (count($notices) > 0): ?>
   <ul class="list-group">
       <?php foreach ($notices as $notice): ?>
           <li class="list-group-item">
               <div class="notice">
                   <h3 class="notice-title"><?= h($notice->title); ?></h3>
                   <span class="small">Posted on <?= $notice->display_from ?></span>
                   <div class="notice-content">
                     <?= $this->Text->autoParagraph(h($notice->content)); ?>
                   </div>
               </div>
           </li>
       <?php endforeach; ?>
    </ul>
<?php else: ?>
   <p>No notices</p>
<?php endif; ?>

</div>

<?php else: ?>

<div>

<h1>Equipment Booking</h1>

<p class="lead">
    Welcome to the equipment booking service!
</p>

<p>
You can use this service to book labs or equipment. Please login or register
an account to get started!
</p>


<div class="btn-group">
<a class="btn btn-primary" href="/login" role="button">Login</a>
<a class="btn btn-warning" href="/register" role="button">Register</a>
</div>

</div>
<?php endif; ?>
