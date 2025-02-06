<?php
session_start();

// JSON response header
header('Content-Type: application/json');

// Ensure session contains necessary data from login
if (!isset($_SESSION['ID'])) {
    echo json_encode(["success" => false, "message" => "Session expired. Please log in again."]);
    exit;
}

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "medical";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    echo json_encode(["success" => false, "message" => "Database connection failed."]);
    exit;
}

// Collect data from the form
$phoneNumber = $_POST['PatientNumber'];
$visit = $_POST['visit'];
$pain = $_POST['pain'];
$Issue = $_POST['Issue'];
$selectedDate = $_POST['SelectedDate'];
$Doctor_ID = $_POST['Doctor_ID'];

// File upload
$fileUploaded = false;
$newFilePath = null;

if (isset($_FILES['EHR']) && $_FILES['EHR']['error'] == 0) {
    $targetDir = "uploads/";
    $fileName = basename($_FILES["EHR"]["name"]);
    $newFilePath = $targetDir . $fileName;
    $fileType = pathinfo($newFilePath, PATHINFO_EXTENSION);

    if (move_uploaded_file($_FILES["EHR"]["tmp_name"], $newFilePath)) {
        $fileUploaded = true;
    }
}

// Get user information from the session
$name = $_SESSION['Username']; // Assume you set this in session earlier
$email = $_SESSION['EUmail'];

// Check if the user already has an appointment with this email
$checkStmt = $conn->prepare("SELECT id, ehr_path FROM appointments WHERE email = ?");
$checkStmt->bind_param("s", $email);
$checkStmt->execute();
$checkStmt->bind_result($appointmentId, $existingEhrPath);
$appointmentExists = $checkStmt->fetch();
$checkStmt->close();

if ($appointmentExists) {
    // Update existing appointment
    if ($fileUploaded && $existingEhrPath) {
        $ehrPath = $existingEhrPath . "," . $newFilePath; // Append new file
    } elseif ($fileUploaded) {
        $ehrPath = $newFilePath; // No previous files, set new file path
    } else {
        $ehrPath = $existingEhrPath; // Keep existing files if no new file is uploaded
    }

    $updateStmt = $conn->prepare("UPDATE appointments SET phone_number = ?, visit = ?, pain = ?, Issue = ?, selected_date = ?, ehr_path = ?, Doctor_ID = ? WHERE id = ?");
    $updateStmt->bind_param("ssssssii", $phoneNumber, $visit, $pain, $Issue, $selectedDate, $ehrPath, $Doctor_ID, $appointmentId);

    if ($updateStmt->execute()) {
        echo json_encode(["success" => true, "message" => "Appointment updated successfully!"]);
    } else {
        echo json_encode(["success" => false, "message" => "Failed to update the appointment."]);
    }

    $updateStmt->close();
} else {
    // Insert a new appointment
    $ehrPath = $fileUploaded ? $newFilePath : null;

    $insertStmt = $conn->prepare("INSERT INTO appointments (name, email, phone_number, visit, pain, Issue, selected_date, ehr_path, Doctor_ID) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $insertStmt->bind_param("ssssssssi", $name, $email, $phoneNumber, $visit, $pain, $Issue, $selectedDate, $ehrPath, $Doctor_ID);

    if ($insertStmt->execute()) {
        echo json_encode(["success" => true, "message" => "Appointment booked successfully!"]);
    } else {
        echo json_encode(["success" => false, "message" => "Failed to book the appointment."]);
    }

    $insertStmt->close();
}

$conn->close();
?>
