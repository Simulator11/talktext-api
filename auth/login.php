<?php
ob_start(); // Prevent stray output
header("Content-Type: application/json; charset=UTF-8");

if (!isset($_POST['email']) || !isset($_POST['password'])) {
    echo json_encode([
        "status" => "error",
        "message" => "Missing email or password"
    ]);
    exit;
}

$email = $_POST['email'];
$password = $_POST['password'];

// DB connection
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "talktext";

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    echo json_encode([
        "status" => "error",
        "message" => "Database connection failed"
    ]);
    exit;
}

// Sanitize
$email = $conn->real_escape_string($email);

$sql = "SELECT * FROM users WHERE email = '$email' LIMIT 1";
$result = $conn->query($sql);

if ($result && $result->num_rows === 1) {
    $user = $result->fetch_assoc();

    if (password_verify($password, $user['password'])) {
        echo json_encode([
            "status" => "success",
            "message" => "Login successful",
            "username" => $user['username'],
            "phone" => $user['phone'],
            "email" => $user['email']
        ]);
    } else {
        echo json_encode([
            "status" => "error",
            "message" => "Invalid password"
        ]);
    }
} else {
    echo json_encode([
        "status" => "error",
        "message" => "User not found"
    ]);
}

$conn->close();
ob_end_flush();
exit;
?>
