<?php

require_once __DIR__ . '/../Models/User.php';
require_once __DIR__ . '/../Services/UserService.php';

// Controller - Controleaza cererile primite, le proceseaza apeland alte motode (din servicii, etc.) si returneaza un ranspuns.

class UserController {
    public static function register(PDO $pdo): void {
        $data = self::getRequestData();

        $name = trim($data['name'] ?? '');
        $email = trim($data['email'] ?? '');
        $password = $data['password'] ?? '';

        try {
            $userModel = new User($pdo);
            $userService = new UserService($userModel);

            $userId = $userService->register($name, $email, $password);

            self::jsonResponse([
                'success' => true,
                'message' => 'User registered successfully.',
                'user_id' => $userId
            ], 201);
        } catch (Exception $e) {
            self::jsonResponse([
                'success' => false,
                'message' => $e->getMessage(),
            ], 400);
        }
    }

    public static function login(PDO $pdo): void {
        $data = self::getRequestData();

        $email = trim($data['email'] ?? '');
        $password = $data['password'] ?? '';

        try {
            $userModel = new User($pdo);
            $userService = new UserService($userModel);

            // $user = $userService->login($email, $password);

            // $_SESSION["user_id"] = $user["id"];

            $user = $userService->login($email, $password);

            // Generam un ID nou pentru sesiune dupa autentificare.
            session_regenerate_id(true);

            // Salvam ID-ul utilizatorului autentificat in sesiune.
            $_SESSION["user_id"] = $user["id"];

            self::jsonResponse([
                "success" => true,
                "message" => "Logged in successfully.",
                "user" => $user
            ]);
        } catch (Exception $e) {
            self::jsonResponse([
                'success' => false,
                'message' => $e->getMessage()
            ], 401);
        }
    }

    public static function me(PDO $pdo): void {
        if (!isset($_SESSION["user_id"])) {
            self::jsonResponse([
                'success' => false,
                'message' => 'Unauthorized.'
            ], 401);
        }

        $userId = (int) $_SESSION["user_id"];

        try {
            $userModel = new User($pdo);
            $userService = new UserService($userModel);

            $user = $userService->getById($userId);

            self::jsonResponse([
                'success' => true,
                'user' => $user
            ]);
        } catch (Exception $e) {
            self::jsonResponse([
                'success' => false,
                'message' => $e->getMessage()
            ], 404);
        }
    }

        public static function logout(): void {
        $_SESSION = [];

        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();

            setcookie(session_name(), '', [
                'expires' => time() - 3600,
                'path' => $params['path'],
                'domain' => $params['domain'],
                'secure' => $params['secure'],
                'httponly' => $params['httponly'],
                'samesite' => $params['samesite'] ?? 'Lax'
            ]);
        }

        session_destroy();

        self::jsonResponse([
            'success' => true,
            'message' => 'Logged out successfully.'
        ]);
    }

     private static function getRequestData(): array {
        
    $input = file_get_contents('php://input');
        if (!$input) { return []; }
        $data = json_decode($input, true);
        return is_array($data) ? $data : [];
    }
    
    private static function jsonResponse(
        array $data,
        int $statusCode = 200
    ): void {
        http_response_code($statusCode);

        header('Content-Type: application/json');

        echo json_encode($data);

        exit;
    }
}