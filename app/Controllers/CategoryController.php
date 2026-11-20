<?php

require_once __DIR__ . '/../Services/CategoryService.php';

// Controller - gestioneaza cererile HTTP pentru categorii.
class CategoryController {

    // GET - toate categoriile.
    public static function index(PDO $pdo): void {
        try {
            $categoryModel = new Category($pdo);
            $categoryService = new CategoryService($categoryModel);

            $categories = $categoryService->getAllCategories();

            self::jsonResponse([
                'success' => true,
                'categories' => $categories
            ]);

        } catch (Exception $e) {
            self::jsonResponse([
                'success' => false,
                'message' => 'Failed to load categories.'
            ], 500);
        }
    }

    // GET - o categorie dupa ID.
    public static function show(PDO $pdo, int $id): void {
        try {
            $categoryModel = new Category($pdo);
            $categoryService = new CategoryService($categoryModel);

            $category = $categoryService->getById($id);

            self::jsonResponse([
                'success' => true,
                'category' => $category
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
        }
    }

    // GET - subcategoriile unei categorii.
    public static function children(PDO $pdo, int $parentId): void {
        try {
            $categoryModel = new Category($pdo);
            $categoryService = new CategoryService($categoryModel);

            $categories = $categoryService->getChildren($parentId);

            self::jsonResponse([
                'success' => true,
                'categories' => $categories
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
        }
    }

    // GET - produsele din categorie si subcategoriile sale.
    public static function products(PDO $pdo, int $categoryId): void {
        try {
            $categoryModel = new Category($pdo);
            $categoryService = new CategoryService($categoryModel);

            $products = $categoryService->getProducts($categoryId);

        self::jsonResponse([
            'success' => true,
            'products' => $products
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
                'message' => 'Failed to load products.'
            ], 500);
        }
    }

    // Trimite raspuns JSON.
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
