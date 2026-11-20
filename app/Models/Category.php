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
}
