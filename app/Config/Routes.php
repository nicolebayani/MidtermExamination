<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/announcements', 'Announcement::index');

// Role-based dashboards
$routes->get('/teacher/dashboard', 'Teacher::dashboard');
$routes->get('/admin/dashboard', 'Admin::dashboard');

// Authentication
$routes->get('/login', 'Login::index');
$routes->post('/login', 'Login::attempt');
