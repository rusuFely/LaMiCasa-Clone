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

}