<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
// Protected routes - require login and role check
$routes->group('', ['filter' => 'roleauth'], static function ($routes) {
    $routes->get('/announcements', 'Announcement::index');
    $routes->get('/admin/dashboard', 'Admin::dashboard');
    $routes->get('/admin/create_announcement', 'Admin::create_announcement');
    $routes->post('/admin/store_announcement', 'Admin::store_announcement');
    $routes->get('/teacher/dashboard', 'Teacher::dashboard');
    // Add a student dashboard route if it exists, for consistency
    // $routes->get('/student/dashboard', 'Student::dashboard');
});

// Authentication
$routes->get('/login', 'Login::index');
$routes->post('/login', 'Login::attempt');
$routes->get('/logout', 'Login::logout');
