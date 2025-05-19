<?php
header("Content-Type: application/json");

$host = 'localhost';
$db = 'talktext';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);

    $excludePhone = $_GET['exclude_phone'] ?? '';
    $stmt = $pdo->prepare("SELECT username, phone, email, profile_picture_url AS profilePictureUrl FROM users WHERE phone != ?");
    $stmt->execute([$excludePhone]);
    $users = $stmt->fetchAll();

    echo json_encode([
        "status" => "success",
        "users" => $users
    ]);

} catch (PDOException $e) {
    echo json_encode([
        "status" => "error",
        "message" => "Database error: " . $e->getMessage()
    ]);
}
?>
