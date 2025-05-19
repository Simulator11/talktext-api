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

// Retrieve GET data
$sender_phone = $_GET['sender_phone'] ?? '';
$receiver_phone = $_GET['receiver_phone'] ?? '';

// Basic validation
if (empty($sender_phone) || empty($receiver_phone)) {
    echo json_encode(["status" => "error", "message" => "Both sender and receiver phone numbers are required"]);
    exit;
}

// Query to fetch messages between sender and receiver
$query = "SELECT sender_phone, receiver_phone, message, timestamp FROM messages 
          WHERE (sender_phone = ? AND receiver_phone = ?) 
          OR (sender_phone = ? AND receiver_phone = ?) 
          ORDER BY timestamp ASC";

$stmt = $conn->prepare($query);
$stmt->bind_param("ssss", $sender_phone, $receiver_phone, $receiver_phone, $sender_phone);
$stmt->execute();
$result = $stmt->get_result();

// Check if messages exist
if ($result->num_rows > 0) {
    $messages = [];
    while ($row = $result->fetch_assoc()) {
        $messages[] = [
            'sender_phone' => $row['sender_phone'],
            'receiver_phone' => $row['receiver_phone'],
            'message' => $row['message'],
            'timestamp' => $row['timestamp'],
        ];
    }

    // Return the messages as JSON
    echo json_encode($messages);
} else {
    // No messages found
    echo json_encode(["status" => "error", "message" => "No messages found"]);
}

$conn->close();
?>
