<?php

$cakeDescription = 'HIT326 Booking';

$username = $this->request->session()->read('Auth.User.username');

?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css('/bower_components/bootstrap/dist/css/bootstrap.min.css') ?>

    <?= $this->Html->script('/bower_components/jquery/dist/jquery.min.js') ?>
    <?= $this->Html->script('/bower_components/bootstrap/dist/js/bootstrap.min.js') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
    <header>
        <nav class="nav">
        <?php if ($this->request->session()->read('Auth.User')): ?>
        <span>(<?= $username ?>)</span>
        <form action="/logout" method="post">
            <input type="submit" value="logout">
        </form>
        <?php else: ?>
        <a href="/login">Login</a>
        <?php endif; ?>
        </nav>
    </header>

    <?= $this->Flash->render() ?>

    <div class="container clearfix">
        <?= $this->fetch('content') ?>
    </div>

    <footer>
    </footer>
</body>
</html>
