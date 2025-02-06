<?php
session_start();

// Retrieve OTP and email from POST request
$otp = $_POST['otp'] ?? '';
$email = $_POST['email'] ?? '';

if (empty($otp) || empty($email)) {
    echo json_encode(['status' => 'error', 'message' => 'OTP and email are required.']);
    exit();
}

// Check if OTP matches the one stored in session
if ($otp != $_SESSION['otp']) {
    echo json_encode(['status' => 'error', 'message' => 'Invalid OTP.']);
    exit();
}

// Check if email exists in the database
$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "medical";

$conn = new mysqli($host, $dbusername, $dbpassword, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$SELECT = "SELECT EUmail FROM register WHERE EUmail = ? LIMIT 1";
$stmt = $conn->prepare($SELECT);
$stmt->bind_param("s", $email);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows == 0) {
    echo json_encode(['status' => 'error', 'message' => 'Email not found.']);
    $stmt->close();
    $conn->close();
    exit();
}

// Proceed to update password
$newPassword = $_POST['newPassword'] ?? '';

if (empty($newPassword)) {
    echo json_encode(['status' => 'error', 'message' => 'New password is required.']);
    exit();
}

// Update the password in the database
$UPDATE = "UPDATE register SET pass = ? WHERE EUmail = ?";
$stmt = $conn->prepare($UPDATE);
$stmt->bind_param("ss", $newPassword, $email);
if ($stmt->execute()) {
    echo json_encode(['status' => 'success', 'message' => 'Password updated successfully.']);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Failed to update password.']);
}

$stmt->close();
$conn->close();
?>
