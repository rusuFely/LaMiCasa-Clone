<?php

require_once __DIR__ . '/../Services/ProductService.php';

// Controller - gestioneaza cererile HTTP pentru produse.
class ProductController {

    private static function service(PDO $pdo): ProductService {
        $productModel = new Product($pdo);

        return new ProductService($productModel);
    }

    // GET - toate produsele.
    public static function index(PDO $pdo): void {
        try {
            $products = self::service($pdo)->getAllProducts();

            self::jsonResponse([
                'success' => true,
                'products' => $products
            ]);
        } catch (Exception $e) {
            error_log($e->getMessage());

            self::jsonResponse([
                'success' => false,
                'message' => 'Failed to load products.'
            ], 500);
        }
    }

    // GET - un produs dupa ID.
    public static function show(PDO $pdo, int $id): void {
        try {
            $product = self::service($pdo)->getById($id);

            self::jsonResponse([
                'success' => true,
                'product' => $product
            ]);

        } catch (InvalidArgumentException $e) {
            self::jsonResponse([
                'success' => false,
                'message' => $e->getMessage()
            ], 400);

        } catch (RuntimeException $e) {
            self::jsonResponse([
                'success' => false,
                'message' => $e->getMessage()
            ], 404);

        } catch (Exception $e) {
            error_log($e->getMessage());

            self::jsonResponse([
                'success' => false,
                'message' => 'Failed to load product.'
            ], 500);
        }
    }

    // POST - creare produs.
    public static function store(PDO $pdo): void {
        self::requireAdmin($pdo);

        try {
            $data = self::getRequestData();
            $id = self::service($pdo)->create($data);

            self::jsonResponse([
                'success' => true,
                'message' => 'Product created successfully.',
                'product_id' => $id
            ], 201);

        } catch (InvalidArgumentException $e) {
            self::jsonResponse([
                'success' => false,
                'message' => $e->getMessage()
            ], 400);

        } catch (Exception $e) {
            error_log($e->getMessage());

            self::jsonResponse([
                'success' => false,
                'message' => 'Failed to create product.'
            ], 500);
        }
    }

    // PUT - actualizare produs.
    public static function update(PDO $pdo, int $id): void {
        self::requireAdmin($pdo);

        try {
            $data = self::getRequestData();
            self::service($pdo)->update($id, $data);

            self::jsonResponse([
                'success' => true,
                'message' => 'Product updated successfully.'
            ]);

        } catch (InvalidArgumentException $e) {
            self::jsonResponse([
                'success' => false,
                'message' => $e->getMessage()
            ], 400);

        } catch (RuntimeException $e) {
            self::jsonResponse([
                'success' => false,
                'message' => $e->getMessage()
            ], 404);

        } catch (Exception $e) {
            error_log($e->getMessage());

            self::jsonResponse([
                'success' => false,
                'message' => 'Failed to update product.'
            ], 500);
        }
    }

    // DELETE - stergere produs.
    public static function destroy(PDO $pdo, int $id): void {
        self::requireAdmin($pdo);

        try {
            self::service($pdo)->delete($id);

            self::jsonResponse([
                'success' => true,
                'message' => 'Product deleted successfully.'
            ]);

        } catch (InvalidArgumentException $e) {
            self::jsonResponse([
                'success' => false,
                'message' => $e->getMessage()
            ], 400);

        } catch (RuntimeException $e) {
            self::jsonResponse([
                'success' => false,
                'message' => $e->getMessage()
            ], 404);

        } catch (Exception $e) {
            error_log($e->getMessage());

            self::jsonResponse([
                'success' => false,
                'message' => 'Failed to delete product.'
            ], 500);
        }
    }

    // Permite modificarea produselor doar administratorilor.
    private static function requireAdmin(PDO $pdo): void {
        $userId = $_SESSION['user_id'] ?? null;

        if (!$userId) {
            self::jsonResponse([
                'success' => false,
                'message' => 'Authentication required.'
            ], 401);
        }

        $stmt = $pdo->prepare(
            "SELECT user_type FROM users WHERE id = ? LIMIT 1"
        );
        $stmt->execute([$userId]);

        $user = $stmt->fetch();

        if (!$user || $user['user_type'] !== 'ADMIN') {
            self::jsonResponse([
                'success' => false,
                'message' => 'Admin access required.'
            ], 403);
        }
    }

    // Citeste date JSON din cerere.
    private static function getRequestData(): array {
        $input = file_get_contents('php://input');
        $data = json_decode($input ?: '', true);

        return is_array($data) ? $data : [];
    }

    // Trimite raspuns JSON si opreste executia.
    private static function jsonResponse(
        array $data,
        int $statusCode = 200
    ): void {
        http_response_code($statusCode);
        header('Content-Type: application/json; charset=utf-8');

        echo json_encode($data);
        exit;
    }
}
