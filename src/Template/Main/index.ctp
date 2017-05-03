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
    <h2>System Notices</h2>
    <?php if ($userRole == 'admin'): ?>
        <a href="/admin/notices" role="button" class="btn btn-primary">Manage notices</a>
    <?php endif; ?>

    <?php foreach ($notices as $notice): ?>
    <div class="notice">
        <h3 class="notice-title"><?= h($notice->title); ?></h3>
        <span class="small">Posted on <?= $notice->display_from ?></span>
        <div class="notice-content">
            <?= $this->Text->autoParagraph(h($notice->content)); ?>
        </div>
    </div>
    <?php endforeach; ?>

</div>

<?php endif; ?>


<p>
    Home page - more stuff goes here
</p>
