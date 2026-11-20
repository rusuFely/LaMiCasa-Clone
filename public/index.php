<?php

session_start();

require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../app/Controllers/UserController.php';
require_once __DIR__ . '/../app/Controllers/ProductController.php';
require_once __DIR__ . '/../app/Controllers/CategoryController.php';

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

// GET - toate produsele
if ($uri === '/products' && $method === 'GET') {
    ProductController::index($pdo);
    exit;
}

// POST - creare produs
if ($uri === '/products' && $method === 'POST') {
    ProductController::store($pdo);
    exit;
}

// Rute pentru un produs dupa ID
if (preg_match('#^/products/([0-9]+)$#', $uri, $matches)) {
    $productId = (int) $matches[1];

    // GET - detalii produs
    if ($method === 'GET') {
        ProductController::show($pdo, $productId);
        exit;
    }

    // PUT sau POST - actualizare produs
    if ($method === 'PUT' || $method === 'POST') {
        ProductController::update($pdo, $productId);
        exit;
    }

    // DELETE - stergere produs
    if ($method === 'DELETE') {
        ProductController::destroy($pdo, $productId);
        exit;
    }
}

// GET - toate categoriile
if ($uri === '/categories' && $method === 'GET') {
    CategoryController::index($pdo);
    exit;
}

// Rute pentru o categorie dupa ID
if (preg_match('#^/categories/([0-9]+)$#', $uri, $matches)) {
    $categoryId = (int) $matches[1];

    // GET - o categorie
    if ($method === 'GET') {
        CategoryController::show($pdo, $categoryId);
        exit;
    }
}

// GET - subcategoriile unei categorii
if (preg_match('#^/categories/([0-9]+)/children$#', $uri, $matches)
    && $method === 'GET') {

    $categoryId = (int) $matches[1];

    CategoryController::children($pdo, $categoryId);
    exit;
}

// GET - produsele unei categorii.
// Ce face?
// Când Postman trimite:

// GET /categories/24/products
// - 24 este ID-ul categoriei.
// - CategoryController::products() caută produsele categoriei.
// - exit oprește executarea după trimiterea răspunsului.
if (preg_match('#^/categories/([0-9]+)/products$#', $uri, $matches)
    && $method === 'GET') {

    $categoryId = (int) $matches[1];

    CategoryController::products($pdo, $categoryId);
    exit;
}

http_response_code(404);
header('Content-Type: application/json');

echo json_encode([
    'success' => false,
    'message' => 'Route not found.'
]);
