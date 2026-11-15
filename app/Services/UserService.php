<?php

// Service - Documentul in care salvam logica aplicatiei. Validari/apelarea metodelor din model.

class UserService {
    private User $userModel;

    public function __construct(User $userModel) {
        $this->userModel = $userModel;
    }

    public function register(string $name, string $email, string $password): int {
        if (empty(trim($name)) || empty(trim($email)) || empty($password)) throw new Exception("Name, email and password are required.");

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) throw new Exception("Invalid email.");

        if (strlen($password) < 8) throw new Exception("Password must be at least 8 characters.");

        if ($this->userModel->findByEmail($email)) {
            throw new Exception("Email already exists.");
        }
//Trimitem parola originală către Model, unde password_hash() o transformă înainte de salvare. Nu folosim $hashedPassword în Service, deoarece acea variabilă nu există aici.
        return $this->userModel->create(trim($name), trim($email), $password);
    }

    public function login(string $email, string $password): array {
        if (empty($email) || empty($password)) {
            throw new Exception("Email and password are required.");
        }

        $user = $this->userModel->findByEmail($email);

        if (!$user || !password_verify($password, $user['user_password'])) {
            throw new Exception("Invalid email or password.");
        }

        return [
            "id" => (int) $user["id"],
            "name" => $user["name"],
            "email" => $user["email"],
            "user_type" => $user["user_type"]
        ];
    }

    public function getById(int $id): array {
        $user = $this->userModel->findById($id);

        if (!$user) {
            throw new Exception("User not found.");
        }

        return $user;
    }
}