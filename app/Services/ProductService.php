<?php

require_once __DIR__ . '/../Models/Product.php';

//Service - logica aplicatiei pentru produse.
class ProductService {
    //„Clasa ProductService are o proprietate numită $productModel, în care vom păstra un obiect creat din clasa Product.”
    //Important: Product nu este o constantă și nici un produs concret din magazin. Este clasa PHP care conține metodele de lucru cu tabelul products.
    private Product $productModel;

    public function __construct(Product $productModel) {
        $this->productModel = $productModel;
    }

    //obtinem toate produsele din baza de date.
    public function getAllProducts(): array {
        return $this->productModel->findAll();
    }
}