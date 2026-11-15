<?php

session_start();

require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../app/Controllers/UserController.php';

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri = preg_replace('#^/index\.php#', '', $uri);
$uri = $uri ?: '/';

$method = $_SERVER['REQUEST_METHOD'];

if ($uri === '/users/register' && $method === 'POST') {
    UserController::register($pdo);
}

if ($uri === '/users/login' && $method === 'POST') {
    UserController::login($pdo);
}

if ($uri === '/users/me' && $method === 'GET') {
    UserController::me($pdo);
}

if ($uri === '/users/logout' && $method === 'POST') {
    UserController::logout();
}

http_response_code(404);
header('Content-Type: application/json');

echo json_encode([
    'success' => false,
    'message' => 'Route not found.'
]);
