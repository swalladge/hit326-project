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

<div class="notices">


         <div class="panel panel-primary">
            <div class="panel-heading">
           <h2>System Notices</h2>
                  <?php if ($userRole == 'admin'): ?>
                         <a href="/admin/notices" role="button" class="btn btn-primary">Manage notices</a>
                  <?php endif; ?>
           </div>
           <div class="panel-body" style="max-height: 10;overflow-y: scroll;">
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
            </div>
         </div>
</div>

<?php endif; ?>


<p>
    Home page - more stuff goes here
</p>
