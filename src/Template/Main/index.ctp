<?php

use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Core\Plugin;
use Cake\Datasource\ConnectionManager;
use Cake\Error\Debugger;
use Cake\Network\Exception\NotFoundException;

$this->layout = 'default';

?>

<div class="notices">
    <h2>System Notices</h2>
    <p>if you are the admin, <a href="/notices">click to manage notices</a></p>

    <?php foreach ($notices as $notice): ?>
    <div class="notice">
        <h3 class="notice-title"><?= h($notice->title); ?></h3>
        <div class="notice-content">
            <?= $this->Text->autoParagraph(h($notice->content)); ?>
        </div>
    </div>
    <?php endforeach; ?>

</div>

<p>
    Home page - more stuff goes here
</p>

