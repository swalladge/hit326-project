<?php
/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different URLs to chosen controllers and their actions (functions).
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

use Cake\Core\Plugin;
use Cake\Routing\RouteBuilder;
use Cake\Routing\Router;
use Cake\Routing\Route\DashedRoute;

/**
 * The default class to use for all routes
 *
 * The following route classes are supplied with CakePHP and are appropriate
 * to set as the default:
 *
 * - Route
 * - InflectedRoute
 * - DashedRoute
 *
 * If no call is made to `Router::defaultRouteClass()`, the class used is
 * `Route` (`Cake\Routing\Route\Route`)
 *
 * Note that `Route` does not do any inflections on URLs which will result in
 * inconsistently cased URLs when used with `:plugin`, `:controller` and
 * `:action` markers.
 *
 */
Router::defaultRouteClass(DashedRoute::class);

Router::scope('/', function (RouteBuilder $routes) {


    // homepage
    $routes->connect('/', ['controller' => 'Main', 'action' => 'index']);

    // admin view page
    $routes->connect('/admin', ['controller' => 'Admin', 'action' => 'index']);

    // user controllers
    $routes->connect('/login', ['controller' => 'Users', 'action' => 'login']);
    $routes->connect('/register', ['controller' => 'Users', 'action' => 'register']);
    // NOTE: only allow post requests to logout page
    $routes->connect('/logout', ['controller' => 'Users', 'action' => 'logout', '_method' => 'POST']);

    // user personal account page
    $routes->connect('/account', ['controller' => 'Users', 'action' => 'account']);

    // pages to display the create booking form
    $routes->connect('/book', ['controller' => 'Book', 'action' => 'book1']);
    $routes->connect('/book/:id', ['controller' => 'Book', 'action' => 'book2'], ['id' => '\d+', 'pass' => ['id']]);

    // CRUD for user bookings
    $routes->connect('/bookings', ['controller' => 'Bookings', 'action' => 'index']);
    $routes->connect('/bookings/:id', ['controller' => 'Bookings', 'action' => 'view'], ['id' => '\d+', 'pass' => ['id']]);
    $routes->connect('/bookings/:id/edit', ['controller' => 'Bookings', 'action' => 'edit'], ['id' => '\d+', 'pass' => ['id']]);
    $routes->connect('/bookings/:id/delete', ['controller' => 'Bookings', 'action' => 'delete'], ['id' => '\d+', 'pass' => ['id']]);


});

Router::scope('/admin/', function (RouteBuilder $routes) {

    // admin equipment management
    $routes->connect('/equipment', ['controller' => 'Equipment', 'action' => 'index']);
    $routes->connect('/equipment/new', ['controller' => 'Equipment', 'action' => 'add' ]);
    $routes->connect('/equipment/:id', ['controller' => 'Equipment', 'action' => 'view'], ['id' => '\d+', 'pass' => ['id']]);
    $routes->connect('/equipment/:id/edit', ['controller' => 'Equipment', 'action' => 'edit'], ['id' => '\d+', 'pass' => ['id']]);
    $routes->connect('/equipment/:id/delete', ['controller' => 'Equipment', 'action' => 'delete'], ['id' => '\d+', 'pass' => ['id']]);


    // admin notices management
    $routes->connect('/notices', ['controller' => 'Notices', 'action' => 'index']);
    $routes->connect('/notices/new', ['controller' => 'Notices', 'action' => 'add' ]);
    $routes->connect('/notices/:id', ['controller' => 'Notices', 'action' => 'view'], ['id' => '\d+', 'pass' => ['id']]);
    $routes->connect('/notices/:id/edit', ['controller' => 'Notices', 'action' => 'edit'], ['id' => '\d+', 'pass' => ['id']]);
    $routes->connect('/notices/:id/delete', ['controller' => 'Notices', 'action' => 'delete'], ['id' => '\d+', 'pass' => ['id']]);

    // admin timeslots management
    $routes->connect('/timeslots', ['controller' => 'Timeslots', 'action' => 'index']);
    $routes->connect('/timeslots/new', ['controller' => 'Timeslots', 'action' => 'add' ]);
    $routes->connect('/timeslots/:id', ['controller' => 'Timeslots', 'action' => 'view'], ['id' => '\d+', 'pass' => ['id']]);
    $routes->connect('/timeslots/:id/edit', ['controller' => 'Timeslots', 'action' => 'edit'], ['id' => '\d+', 'pass' => ['id']]);
    $routes->connect('/timeslots/:id/delete', ['controller' => 'Timeslots', 'action' => 'delete'], ['id' => '\d+', 'pass' => ['id']]);

    // admin closed-days management
    $routes->connect('/closed-days', ['controller' => 'ClosedDays', 'action' => 'index']);
    $routes->connect('/closed-days/new', ['controller' => 'ClosedDays', 'action' => 'add' ]);
    $routes->connect('/closed-days/:id', ['controller' => 'ClosedDays', 'action' => 'view'], ['id' => '\d+', 'pass' => ['id']]);
    $routes->connect('/closed-days/:id/edit', ['controller' => 'ClosedDays', 'action' => 'edit'], ['id' => '\d+', 'pass' => ['id']]);
    $routes->connect('/closed-days/:id/delete', ['controller' => 'ClosedDays', 'action' => 'delete'], ['id' => '\d+', 'pass' => ['id']]);

    // admin bookings management
    $routes->connect('/bookings', ['controller' => 'AdminBookings', 'action' => 'index']);
    $routes->connect('/bookings/new', ['controller' => 'AdminBookings', 'action' => 'add' ]);
    $routes->connect('/bookings/:id', ['controller' => 'AdminBookings', 'action' => 'view'], ['id' => '\d+', 'pass' => ['id']]);
    $routes->connect('/bookings/:id/edit', ['controller' => 'AdminBookings', 'action' => 'edit'], ['id' => '\d+', 'pass' => ['id']]);
    $routes->connect('/bookings/:id/delete', ['controller' => 'AdminBookings', 'action' => 'delete'], ['id' => '\d+', 'pass' => ['id']]);

    // admin users management
    $routes->connect('/users', ['controller' => 'AdminUsers', 'action' => 'index']);
    $routes->connect('/users/new', ['controller' => 'AdminUsers', 'action' => 'add' ]);
    $routes->connect('/users/:id', ['controller' => 'AdminUsers', 'action' => 'view'], ['id' => '\d+', 'pass' => ['id']]);
    $routes->connect('/users/:id/edit', ['controller' => 'AdminUsers', 'action' => 'edit'], ['id' => '\d+', 'pass' => ['id']]);
    $routes->connect('/users/:id/delete', ['controller' => 'AdminUsers', 'action' => 'delete'], ['id' => '\d+', 'pass' => ['id']]);

});


/**
 * Load all plugin routes.  See the Plugin documentation on
 * how to customize the loading of plugin routes.
 */
Plugin::routes();
