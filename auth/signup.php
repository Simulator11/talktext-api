<?php
header("Content-Type: application/json");

// Database connection details
$host = "localhost";
$db = "talktext";
$user = "root";
$pass = "";

// Connect to MySQL
$conn = new mysqli($host, $user, $pass, $db);

// Check connection
if ($conn->connect_error) {
    die(json_encode(["status" => "error", "message" => "Database connection failed: " . $conn->connect_error]));
}

// Retrieve POST data
$username = $_POST['username'] ?? '';
$email = $_POST['email'] ?? '';
$phone = $_POST['phone'] ?? '';
$password = $_POST['password'] ?? '';

// Basic validation
if (empty($username) || empty($email) || empty($phone) || empty($password)) {
    echo json_encode(["status" => "error", "message" => "All fields are required"]);
    exit;
}

// Check if the email is in a valid format
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo json_encode(["status" => "error", "message" => "Invalid email format"]);
    exit;
}

// Check if phone is in a valid format (you can customize this based on your phone format requirement)
if (!preg_match("/^[0-9]{10}$/", $phone)) {
    echo json_encode(["status" => "error", "message" => "Invalid phone number format"]);
    exit;
}

// Hash the password
$hashed_password = password_hash($password, PASSWORD_BCRYPT);

// Check if email already exists
$check = $conn->prepare("SELECT id FROM users WHERE email = ?");
$check->bind_param("s", $email);
$check->execute();
$check->store_result();

if ($check->num_rows > 0) {
    echo json_encode(["status" => "error", "message" => "Email already registered"]);
    $conn->close();
    exit;
}

// Check if phone number already exists
$checkPhone = $conn->prepare("SELECT id FROM users WHERE phone = ?");
$checkPhone->bind_param("s", $phone);
$checkPhone->execute();
$checkPhone->store_result();

if ($checkPhone->num_rows > 0) {
    echo json_encode(["status" => "error", "message" => "Phone number already registered"]);
    $conn->close();
    exit;
}

// Insert new user
$stmt = $conn->prepare("INSERT INTO users (username, email, phone, password) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $username, $email, $phone, $hashed_password);

if ($stmt->execute()) {
    echo json_encode(["status" => "success", "message" => "Signup successful"]);
} else {
    echo json_encode(["status" => "error", "message" => "Signup failed: " . $stmt->error]);
}

$conn->close();
?>
