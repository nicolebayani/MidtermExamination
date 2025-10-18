<?php
/**
 * Root index.php
 *
 * For deployments where the document root is the project folder rather than
 * the `public/` folder, this small front controller simply requires the
 * real front controller at `public/index.php` so visiting the project root
 * (e.g. http://localhost/Bayani-Mid%20Exam/) will show the application.
 */

$publicPath = __DIR__ . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . 'index.php';

if (! file_exists($publicPath)) {
    header('HTTP/1.1 500 Internal Server Error');
    echo "Application front controller not found at: " . htmlspecialchars($publicPath);
    exit(1);
}

// Delegate to the official public front controller
require $publicPath;
