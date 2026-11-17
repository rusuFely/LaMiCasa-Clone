<?php
// Model - operatiunile cu tabelul 'products' din baza de date.

class Product {
    private PDO $db;
    public function __construct(PDO $db) {
        $this->db = $db;
    }

    // returnam toate produsele din tabel:
    public function findAll(): array {
        //Pregătește interogarea SQL pentru executare.
        $stmt = $this->db->query("SELECT * FROM products ORDER BY id DESC;");
        //Preia toate rândurile rezultate și le returnează sub forma unui array de array-uri asociative.
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}