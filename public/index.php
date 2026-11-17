<?php

session_start();

require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../app/Controllers/UserController.php';
require_once __DIR__ . '/../app/Controllers/ProductController.php';

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri = preg_replace('#^/index\.php#', '', $uri);
$uri = $uri ?: '/';

$method = $_SERVER['REQUEST_METHOD'];

if ($uri === '/users/register' && $method === 'POST') {
    UserController::register($pdo);
    exit;
}

if ($uri === '/users/login' && $method === 'POST') {
    UserController::login($pdo);
    exit;
}

if ($uri === '/users/me' && $method === 'GET') {
    UserController::me($pdo);
    exit;
}

if ($uri === '/users/logout' && $method === 'POST') {
    UserController::logout();
    exit;
}

if ($uri === '/products' && $method === 'GET') {

    // Cream Modelul si ii transmitem conexiunea PDO.
    $productModel = new Product($pdo);

    // Cream Service-ul si ii transmitem Modelul.
    $productService = new ProductService($productModel);

    // Cream Controller-ul si ii transmitem Service-ul.
    $productController = new ProductController($productService);

    // Apelam metoda care returneaza produsele in JSON.
    $productController->index();

    exit;
}


http_response_code(404);
header('Content-Type: application/json');

echo json_encode([
    'success' => false,
    'message' => 'Route not found.'
]);
