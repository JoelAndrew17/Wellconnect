<?php
session_start();
require 'vendor/autoload.php'; // Load PHPMailer

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

header('Content-Type: application/json');

$EUmail = $_POST['EUmail'] ?? '';
$enteredOtp = trim($_POST['otp'] ?? '');
$newPassword = $_POST['newPassword'] ?? ''; // Ensure consistent naming

// Send OTP
if (!empty($EUmail) && empty($enteredOtp)) {
    if (!filter_var($EUmail, FILTER_VALIDATE_EMAIL)) {
        echo json_encode(['status' => 'error', 'message' => 'Invalid email address.']);
        exit();
    }

    $otp = (string)rand(100000, 999999);

    $mail = new PHPMailer(true);
    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'kolathurkingjoel@gmail.com';
        $mail->Password = 'kvfa efwj nqdo cxps'; // Replace with app password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        $mail->setFrom('kolathurkingjoel@gmail.com', 'Your App Name');
        $mail->addAddress($EUmail);

        $mail->isHTML(true);
        $mail->Subject = 'Password Reset OTP';
        $mail->Body = "Hello, <br>Your OTP for resetting your password is: <b>$otp</b>.<br>This OTP is valid for 5 minutes.";

        $mail->send();
        $_SESSION['otp'] = $otp;
        $_SESSION['EUmail'] = $EUmail; // Save email in session

        echo json_encode(['status' => 'success', 'message' => 'OTP sent successfully.']);
    } catch (Exception $e) {
        error_log($mail->ErrorInfo, 3, 'error.log');
        echo json_encode(['status' => 'error', 'message' => 'Failed to send OTP.']);
    }
    exit();
}

// Verify OTP and update password
if (!empty($enteredOtp)) {
    if (!isset($_SESSION['otp'], $_SESSION['EUmail'])) {
        echo json_encode(['status' => 'error', 'message' => 'Session expired or OTP missing.']);
        exit();
    }

    if ($_SESSION['otp'] === $enteredOtp) {
        unset($_SESSION['otp']); // Clear OTP for security

        if (empty($newPassword)) {
            echo json_encode(['status' => 'error', 'message' => 'New password not provided.']);
            exit();
        }
        // Update password in the database
        $host = 'localhost';
        $dbusername = 'root';
        $dbpassword = '';
        $dbname = 'medical';

        $conn = new mysqli($host, $dbusername, $dbpassword, $dbname);
        if ($conn->connect_error) {
            echo json_encode(['status' => 'error', 'message' => 'Database connection failed.']);
            exit();
        }

        $EUmail = $_SESSION['EUmail'];
        $stmt = $conn->prepare("UPDATE register SET pass = ? WHERE EUmail = ?");
        $stmt->bind_param("ss", $newPassword, $EUmail);

        if ($stmt->execute()) {
            echo json_encode(['status' => 'success', 'message' => 'Password updated successfully.']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Failed to update password.']);
        }

        $stmt->close();
        $conn->close();
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Invalid OTP.']);
    }
    exit();
}

echo json_encode(['status' => 'error', 'message' => 'Invalid request.']);
?>
