<?php
declare(strict_types=1);

session_start();

require_once __DIR__ . '/../app/utils/view.php';
require_once __DIR__ . '/../app/controllers/HomeController.php';
require_once __DIR__ . '/../app/controllers/GalleryController.php';

/**
 * small hepler to normalize request path
 * to avoid route mismatches caused by query strings and trailing slashes
 */
function currentPath(): string {
    $uri = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH);
    $path = is_string($uri) ? rtrim($uri, '/') : '/';
    return $path === '' ? '/' : $path;
}

$method = $_SERVER['REQUEST_METHOD'] ?? 'GET';
$path = currentPath();

// minimal route
$routes = [
    'GET' => [
        '/' => [HomeController::class, 'index'],
        '/gallery' => [GalleryController::class, 'index'],
    ],
    'POST' => [
        '/api/ping' => function ():void {
            header('Content-Type: application/json; charset=utf-8');
            echo json_encode([
                'ok' => true,
                'message' => 'Server received your request',

            ], JSON_UNESCAPED_UNICODE);
        },
    ],
];

if (!isset($routes[$method][$path])) {
    http_response_code(404);
    render('errors/404', [
        'title' => 'Not Found',
        'currentPath' => $path,
    ]);
    exit;
}

$handler = $routes[$method][$path];
$handler();