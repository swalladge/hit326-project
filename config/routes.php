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

    // user pages
    $routes->connect('/login', ['controller' => 'User', 'action' => 'login']);

    // NOTE: only allow post requests to logout page
    $routes->connect('/logout', ['controller' => 'User', 'action' => 'logout', '_method' => 'POST']);
    $routes->connect('/account', ['controller' => 'User', 'action' => 'account']);

    // REST routes for equipment and bookings
    $routes->connect('/equipment', ['controller' => 'Equipment', 'action' => 'index', '_method' => 'GET']);
    $routes->connect('/equipment', ['controller' => 'Equipment', 'action' => 'add', '_method' => 'POST']);
    $routes->connect('/equipment/:id', ['controller' => 'Equipment', 'action' => 'view', '_method' => 'GET'], ['id' => '\d+', 'pass' => ['id']]);
    $routes->connect('/equipment/:id', ['controller' => 'Equipment', 'action' => 'edit', '_method' => 'PUT'], ['id' => '\d+', 'pass' => ['id']]);
    $routes->connect('/equipment/:id', ['controller' => 'Equipment', 'action' => 'delete', '_method' => 'DELETE'], ['id' => '\d+', 'pass' => ['id']]);

    $routes->connect('/booking', ['controller' => 'Bookings', 'action' => 'index', '_method' => 'GET']);
    $routes->connect('/booking', ['controller' => 'Bookings', 'action' => 'add', '_method' => 'POST']);
    $routes->connect('/booking/:id', ['controller' => 'Bookings', 'action' => 'view', '_method' => 'GET'], ['id' => '\d+', 'pass' => ['id']]);
    $routes->connect('/booking/:id', ['controller' => 'Bookings', 'action' => 'edit', '_method' => 'PUT'], ['id' => '\d+', 'pass' => ['id']]);
    $routes->connect('/booking/:id', ['controller' => 'Bookings', 'action' => 'delete', '_method' => 'DELETE'], ['id' => '\d+', 'pass' => ['id']]);

});

// admin-specific pages
Router::scope('/admin', function (RouteBuilder $routes) {

    $routes->connect('/', ['controller' => 'Admin', 'action' => 'index']);

    // REST routes for equipment and bookings - admin controller
    $routes->connect('/equipment', ['controller' => 'AdminEquipment', 'action' => 'index', '_method' => 'GET']);
    $routes->connect('/equipment', ['controller' => 'AdminEquipment', 'action' => 'add', '_method' => 'POST']);
    $routes->connect('/equipment/:id', ['controller' => 'AdminEquipment', 'action' => 'view', '_method' => 'GET'], ['id' => '\d+', 'pass' => ['id']]);
    $routes->connect('/equipment/:id', ['controller' => 'AdminEquipment', 'action' => 'edit', '_method' => 'PUT'], ['id' => '\d+', 'pass' => ['id']]);
    $routes->connect('/equipment/:id', ['controller' => 'AdminEquipment', 'action' => 'delete', '_method' => 'DELETE'], ['id' => '\d+', 'pass' => ['id']]);

    $routes->connect('/booking', ['controller' => 'AdminBookings', 'action' => 'index', '_method' => 'GET']);
    $routes->connect('/booking', ['controller' => 'AdminBookings', 'action' => 'add', '_method' => 'POST']);
    $routes->connect('/booking/:id', ['controller' => 'AdminBookings', 'action' => 'view', '_method' => 'GET'], ['id' => '\d+', 'pass' => ['id']]);
    $routes->connect('/booking/:id', ['controller' => 'AdminBookings', 'action' => 'edit', '_method' => 'PUT'], ['id' => '\d+', 'pass' => ['id']]);
    $routes->connect('/booking/:id', ['controller' => 'AdminBookings', 'action' => 'delete', '_method' => 'DELETE'], ['id' => '\d+', 'pass' => ['id']]);

});


/**
 * Load all plugin routes.  See the Plugin documentation on
 * how to customize the loading of plugin routes.
 */
Plugin::routes();
