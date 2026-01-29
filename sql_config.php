<?php
$env = parse_ini_file(__DIR__ . '/.env');

if (!$env) {
    die("Error: Could not read .env file");
}

$host = $env['DB_HOST'] ?? '';
$db   = $env['DB_NAME'] ?? '';
$user = $env['DB_USER'] ?? '';
$pass = $env['DB_PASSWORD'] ?? '';

$pass = trim($pass, '"\'');

if (empty($host) || empty($db) || empty($user) || empty($pass)) {
    die("Error: Missing required database configuration");
}

try {
    $pdo = new PDO(
        "mysql:host=$host;dbname=$db;charset=utf8mb4",
        $user,
        $pass,
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
    );
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}