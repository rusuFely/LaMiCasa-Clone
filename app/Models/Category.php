<?php

// Model - operatiunile SQL pentru tabelul categories.
class Category {
    private PDO $db;

    public function __construct(PDO $db) {
        $this->db = $db;
    }

    // Returneaza toate categoriile.
    public function findAll(): array {
        $stmt = $this->db->query(
            "SELECT * FROM categories ORDER BY id ASC"
        );

        return $stmt->fetchAll();
    }

    // Returneaza o categorie dupa ID.
    public function findById(int $id): ?array {
        $stmt = $this->db->prepare(
            "SELECT * FROM categories WHERE id = ? LIMIT 1"
        );

        $stmt->execute([$id]);

        $category = $stmt->fetch();

        return $category ?: null;
    }

    // Returneaza subcategoriile unei categorii.
    public function findChildren(int $parentId): array {
        $stmt = $this->db->prepare(
            "SELECT * FROM categories
             WHERE parent_id = ?
             ORDER BY name ASC"
        );

        $stmt->execute([$parentId]);

        return $stmt->fetchAll();
    }

// Produsele categoriei si ale subcategoriilor directe.
// Ce am schimbat?
// - category_id = ? — caută produsele categoriei 2.
// - SELECT id FROM categories WHERE parent_id = ? — găsește subcategoriile categoriei 2, inclusiv 24.
// - DISTINCT — împiedică afișarea aceluiași produs de două ori.
// Important: această variantă include doar subcategoriile directe, nu și al treilea nivel al ierarhiei. Vom verifica separat dacă avem nevoie de acesta.
// Ce am adăugat?
// Doar o condiție pentru nivelul 3:
// - categories.id = ? — produsele categoriei selectate.
// - categories.parent_id = ? — produsele subcategoriilor.
// - categories.parent_id IN (...) — produsele sub-subcategoriilor.
// Cele trei semne ? primesc același ID al categoriei selectate.
public function findProducts(int $categoryId): array {

    $stmt = $this->db->prepare("
        SELECT DISTINCT products.*
        FROM products, product_categories, categories
        WHERE products.id = product_categories.product_id
        AND product_categories.category_id = categories.id
        AND (
            categories.id = ?
            OR categories.parent_id = ?
            OR categories.parent_id IN (
                SELECT id FROM categories WHERE parent_id = ?
            )
        )
    ");

    $stmt->execute([$categoryId, $categoryId, $categoryId]);

    return $stmt->fetchAll();
}
// doar 2 nivele
// public function findProducts(int $categoryId): array {

//     $stmt = $this->db->prepare("
//         SELECT DISTINCT products.*
//         FROM products, product_categories, categories
//         WHERE products.id = product_categories.product_id
//         AND product_categories.category_id = categories.id
//         AND (categories.id = ? OR categories.parent_id = ?)
//     ");

//     $stmt->execute([$categoryId, $categoryId]);

//     return $stmt->fetchAll();
// } 
// sau
// // Returneaza produsele categoriei si ale subcategoriilor directe.
// public function findProducts(int $categoryId): array {

//     $stmt = $this->db->prepare("
//         SELECT DISTINCT products.*
//         FROM products
//         JOIN product_categories
//             ON products.id = product_categories.product_id
//         WHERE product_categories.category_id = ?
//            OR product_categories.category_id IN (
//                SELECT id FROM categories WHERE parent_id = ?
//            )
//     ");

//     $stmt->execute([$categoryId, $categoryId]);

//     return $stmt->fetchAll();
// }
}
