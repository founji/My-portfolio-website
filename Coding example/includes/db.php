<?php
// Database configuration
$host = 'localhost';
$db   = 'portfolio_db';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ATTR_ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::ATTR_FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
     $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
     // For now, we'll just log or handle the error silently if the DB isn't setup yet
     // throw new \PDOException($e->getMessage(), (int)$e->getCode());
}
?>
