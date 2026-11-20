<?php

// Model - operatiunile SQL pentru tabelul products.
class Product {
    private PDO $db;

    public function __construct(PDO $db) {
        $this->db = $db;
    }

    // Returneaza toate produsele.
    public function findAll(): array {
        $stmt = $this->db->query(
            "SELECT * FROM products ORDER BY id DESC"
        );

        return $stmt->fetchAll();
    }

    // Returneaza un produs dupa ID.
    public function findById(int $id): ?array {
        $stmt = $this->db->prepare(
            "SELECT * FROM products WHERE id = ? LIMIT 1"
        );

        $stmt->execute([$id]);

        $product = $stmt->fetch();

        return $product ?: null;
    }

    // Creeaza un produs nou.
    public function create(array $data): int {
        $stmt = $this->db->prepare(
            "INSERT INTO products
                (brand_id, slug, name, description, image_path,
                 price, sale_price, stock, is_recommended, sku, barcode)
             VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)"
        );

        $stmt->execute([
            $data['brand_id'],
            $data['slug'],
            $data['name'],
            $data['description'],
            $data['image_path'],
            $data['price'],
            $data['sale_price'],
            $data['stock'],
            $data['is_recommended'],
            $data['sku'],
            $data['barcode']
        ]);

        return (int) $this->db->lastInsertId();
    }

    // Actualizeaza un produs existent.
    public function update(int $id, array $data): bool {
        $stmt = $this->db->prepare(
            "UPDATE products SET
                brand_id = ?,
                slug = ?,
                name = ?,
                description = ?,
                image_path = ?,
                price = ?,
                sale_price = ?,
                stock = ?,
                is_recommended = ?,
                sku = ?,
                barcode = ?
             WHERE id = ?"
        );

        return $stmt->execute([
            $data['brand_id'],
            $data['slug'],
            $data['name'],
            $data['description'],
            $data['image_path'],
            $data['price'],
            $data['sale_price'],
            $data['stock'],
            $data['is_recommended'],
            $data['sku'],
            $data['barcode'],
            $id
        ]);
    }

    // Sterge un produs.
    public function delete(int $id): bool {
        $stmt = $this->db->prepare(
            "DELETE FROM products WHERE id = ?"
        );

        return $stmt->execute([$id]);
    }

    // Asociaza un produs cu o categorie.
    public function addCategory(int $productId, int $categoryId): void {
        $stmt = $this->db->prepare("
            INSERT INTO product_categories (product_id, category_id)
            VALUES (?, ?)
        ");

        $stmt->execute([$productId, $categoryId]);
    }

    // Incepem tranzactia.
    public function beginTransaction(): void {
        $this->db->beginTransaction();
    }

    // Confirmam modificarile.
    public function commit(): void {
        $this->db->commit();
    }

    // Anulam modificarile daca apare o eroare.
    public function rollback(): void {
        if ($this->db->inTransaction()) {
            $this->db->rollBack();
        }
    }
}
