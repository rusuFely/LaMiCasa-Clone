<?php

require_once __DIR__ . '/../Models/Product.php';

// Service - logica aplicatiei pentru produse.
class ProductService {
    private Product $productModel;

    public function __construct(Product $productModel) {
        $this->productModel = $productModel;
    }

    // Returneaza toate produsele.
    public function getAllProducts(): array {
        return $this->productModel->findAll();
    }

    // Returneaza un produs dupa ID.
    public function getById(int $id): array {
        if ($id <= 0) {
            throw new InvalidArgumentException("Invalid product id.");
        }

        $product = $this->productModel->findById($id);

        if (!$product) {
            throw new RuntimeException("Product not found.");
        }

        return $product;
    }

    // Verifica datele unui produs.
    private function validateProduct(array $data): array {
        $name = trim((string) ($data['name'] ?? ''));
        $slug = trim((string) ($data['slug'] ?? ''));

        if ($name === '') {
            throw new InvalidArgumentException("Product name is required.");
        }

        if ($slug === '') {
            throw new InvalidArgumentException("Product slug is required.");
        }

        if (!isset($data['price']) ||
            !is_numeric($data['price']) ||
            (float) $data['price'] < 0) {
            throw new InvalidArgumentException("Invalid product price.");
        }

        $stock = $data['stock'] ?? 0;

        if (filter_var($stock, FILTER_VALIDATE_INT) === false ||
            (int) $stock < 0) {
            throw new InvalidArgumentException("Invalid product stock.");
        }

        $salePrice = $data['sale_price'] ?? null;

        if ($salePrice !== null &&
            (!is_numeric($salePrice) ||
             (float) $salePrice < 0 ||
             (float) $salePrice > (float) $data['price'])) {
            throw new InvalidArgumentException("Invalid sale price.");
        }

        return [
            'brand_id' => $data['brand_id'] ?? null,
            'slug' => $slug,
            'name' => $name,
            'description' => $data['description'] ?? null,
            'image_path' => $data['image_path'] ?? null,
            'price' => (float) $data['price'],
            'sale_price' => $salePrice === null ? null : (float) $salePrice,
            'stock' => (int) $stock,
            'is_recommended' => !empty($data['is_recommended']) ? 1 : 0,
            'sku' => $data['sku'] ?? null,
            'barcode' => $data['barcode'] ?? null
        ];
    }

    // Creeaza un produs.
    public function create(array $data): int {
        $data = $this->validateProduct($data);

        return $this->productModel->create($data);
    }

    // Actualizeaza un produs.
    public function update(int $id, array $data): bool {
        $this->getById($id);

        $data = $this->validateProduct($data);

        return $this->productModel->update($id, $data);
    }

    // Sterge un produs.
    public function delete(int $id): bool {
        $this->getById($id);

        return $this->productModel->delete($id);
    }
}
