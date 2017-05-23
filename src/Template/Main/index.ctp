<?php

use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Core\Plugin;
use Cake\Datasource\ConnectionManager;
use Cake\Error\Debugger;
use Cake\Network\Exception\NotFoundException;

$this->layout = 'default';

?>

<h1>Equipment Booking</h1>


<?php if ($loggedIn): ?>

<div class="col-sm-6 col-md-8">

main content when logged in

</div>

<div class="col-sm-6 col-md-4">
    <div class="panel panel-primary">
       <div class="panel-heading">
          <h2 class="panel-title">System Notices</h2>
      </div>

      <div class="panel-body">
         <?php if ($userRole == 'admin'): ?>
           <div class="btn-group">
                <a href="/admin/notices" role="button" class="btn btn-default">Manage notices</a>
                <a href="/admin/notices/new" role="button" class="btn btn-warning">New notice</a>
           </div>
           <hr>
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
    </div>
</div>
<?php else: ?>

<div>

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
