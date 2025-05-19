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
$data = json_decode(file_get_contents("php://input"));
$sender_phone = $data->sender_phone ?? '';
$receiver_phone = $data->receiver_phone ?? '';
$message = $data->message ?? '';

// Basic validation
if (empty($sender_phone) || empty($receiver_phone) || empty($message)) {
    echo json_encode(["status" => "error", "message" => "Sender, receiver, and message are required"]);
    exit;
}

// Insert the message into the database
$query = "INSERT INTO messages (sender_phone, receiver_phone, message) VALUES (?, ?, ?)";
$stmt = $conn->prepare($query);
if ($stmt === false) {
    echo json_encode(["status" => "error", "message" => "Failed to prepare statement"]);
    exit;
}

$stmt->bind_param("sss", $sender_phone, $receiver_phone, $message);

// Check if the message was inserted successfully
if ($stmt->execute()) {
    echo json_encode(["status" => "success", "message" => "Message sent successfully"]);
} else {
    echo json_encode(["status" => "error", "message" => "Failed to send message"]);
}

// Close connection
$stmt->close();
$conn->close();
?>
