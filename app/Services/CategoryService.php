<?php

require_once __DIR__ . '/../Models/Category.php';

// Service - logica aplicatiei pentru categorii.
class CategoryService {
    private Category $categoryModel;

    public function __construct(Category $categoryModel) {
        $this->categoryModel = $categoryModel;
    }

    // Obtinem toate categoriile.
    public function getAllCategories(): array {
        return $this->categoryModel->findAll();
    }

    // Obtinem o categorie dupa ID.
    public function getById(int $id): array {
        if ($id <= 0) {
            throw new InvalidArgumentException("Invalid category id.");
        }

        $category = $this->categoryModel->findById($id);

        if (!$category) {
            throw new RuntimeException("Category not found.");
        }

        return $category;
    }

    // Returneaza subcategoriile unei categorii. 
//     Ce face?
// - $parentId — ID-ul categoriei principale, în cazul nostru 1.
// - getById($parentId) — verifică dacă această categorie există.
// - findChildren($parentId) — caută în MySQL subcategoriile care au parent_id = 1.
public function getChildren(int $parentId): array {

    // Verificam daca categoria principala exista.
    $this->getById($parentId);

    // Obtinem subcategoriile din baza de date.
    return $this->categoryModel->findChildren($parentId);
}

// Obtinem produsele unei categorii. Important: metoda caută momentan doar produsele asociate direct categoriei, nu și cele din subcategorii.
// Ce face?
// De exemplu, dacă $categoryId = 24:
// 1. getById(24) verifică dacă există categoria 24.
// 2. findProducts(24) caută produsele asociate categoriei 24.
// 3. return trimite lista produselor înapoi către Controller.
public function getProducts(int $categoryId): array {

    // Verificam daca categoria exista.
    $this->getById($categoryId);

    // Cerem produsele din Model.
    return $this->categoryModel->findProducts($categoryId);
}
}