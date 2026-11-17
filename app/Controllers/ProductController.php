<?php

require_once __DIR__ . '/../Services/ProductService.php';

// Controller - gestioneaza cererile HTTP pentru produse.
class ProductController {
    private ProductService $productService;

    public function __construct(ProductService $productService) {
        $this->productService = $productService;
    }

    //returnam lista tuturor produselor in format JSON:
    public function index(): void {
        //cerem lista produselor de la Service
        $products = $this->productService->getAllProducts();
        // anuntam ca raspunsul este JSON
        header('Content-Type: application/json; charset=utf-8');
        http_response_code(200); // stabilism statusul HTTP 200 - OK
        echo json_encode([ // transforma array-ul PHP in JSON si transmitem JSON-ul in raspunsul HTTP
            'success' => true,
            'products' => $products
        ]);
    }
}