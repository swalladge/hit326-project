<?php

$siteTitle = 'HIT326 Booking';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?= $this->Html->charset() ?>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $siteTitle ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css('/bower_components/bootstrap/dist/css/bootstrap.min.css') ?>
    <?= $this->Html->css('/bower_components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css') ?>
    <?= $this->Html->css('main') ?>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <?= $this->Html->script('/bower_components/jquery/dist/jquery.min.js') ?>
    <?= $this->Html->script('/bower_components/moment/min/moment.min.js') ?>
    <?= $this->Html->script('/bower_components/bootstrap/dist/js/bootstrap.min.js') ?>
    <?= $this->Html->script('/bower_components/bootstrap/dist/js/bootstrap.min.js') ?>
    <?= $this->Html->script('/bower_components/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js') ?>
    <?= $this->Html->script('/bower_components/handlebars/handlebars.min.js') ?>
    <?= $this->Html->script('main') ?>


    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>

<body>
    <nav class="navbar navbar-inverse">
        <div class="container">
        <ul class="nav navbar-nav">
            <?php if ($loggedIn): ?>
            <li><a href="/">Home</a></li>
            <?php if ($userRole == 'admin'): ?>
            <li><a href="/admin">Admin</a></li>
            <?php endif; ?>
            <li><a href="/equipment">New Booking</a></li>
            <li><a href="/bookings">My Bookings</a></li>
            <li><a href="/account">My Account</a></li>
            <li>
                <form action="/logout" method="post">
                    <input class="btn btn-default navbar-btn" type="submit" value="logout">
                </form>
            </li>
            <?php else: ?>
            <li><a href="/login">Login</a></li>
            <li><a href="/register">Register</a></li>
            <?php endif; ?>
        </ul>
        </div>
    </nav>

    <div class="container flashes clearfix">
        <?= $this->Flash->render() ?>
    </div>

    <div class="container clearfix">
        <?= $this->fetch('content') ?>
    </div>

    <footer class="navbar navbar-default main-footer">
        <div class="container">
            <div class="navbar-text navbar-right">
              Copyright &copy; 2017 Mrinalini Padmanabhan, Jarrod O'Callaghan, Samuel Walladge
            </div>
        </div>
    </footer>

</body>
</html>
