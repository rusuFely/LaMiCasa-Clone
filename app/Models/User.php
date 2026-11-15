<?php

// Model - Documentul in care salvam toate operatiunile cu tabelul 'users' din db.

class User {
    private PDO $db;

    public function __construct(PDO $db) {
        $this->db = $db;
    }

    // P/u a adauga utilizatorul in tabel. 2 parametri. Returneaza id-ul user-ului creat.
    public function create(
        string $name,
        string $email,
        string $password
    ): int {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT); // Bcrypt

        $stmt = $this->db->prepare("INSERT INTO users (name, email, user_password) VALUES (?, ?, ?);");

        $stmt->execute([
            $name,
            $email,
            $hashedPassword
        ]);

        return (int) $this->db->lastInsertId();
    }

    public function findByEmail(string $email): ?array {
        $stmt = $this->db->prepare("SELECT id, name, email, user_password, user_type FROM users WHERE email = ? LIMIT 1;");
        $stmt->execute([$email]);
        $user = $stmt->fetch();
        return $user ?: null;
    }

    public function findById(int $id): ?array {
        $stmt = $this->db->prepare("SELECT id, name, email, phone, user_type, created_at FROM users WHERE id = ? LIMIT 1;");
        $stmt->execute([$id]);
        $user = $stmt->fetch();
        return $user ?: null;
    }
}