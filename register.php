<?php
session_start();
require 'vendor/autoload.php'; // Load PHPMailer

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Retrieve form data
$Username = $_POST['Username'] ?? '';
$EUmail = $_POST['EUmail'] ?? '';
$pass = $_POST['pass'] ?? '';

// Validate inputs
if (empty($Username) || empty($EUmail) || empty($pass)) {
    echo "<script>
            alert('All fields are required.');
            window.location.href = 'register.html';
          </script>";
    exit();
}

if (!filter_var($EUmail, FILTER_VALIDATE_EMAIL)) {
    echo "<script>
            alert('Invalid email address.');
            window.location.href = 'register.html';
          </script>";
    exit();
}

// Store form data in session
$_SESSION['Username'] = $Username;
$_SESSION['EUmail'] = $EUmail;
$_SESSION['pass'] = $pass;

// Database configuration
$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "medical";

// Create database connection
$conn = new mysqli($host, $dbusername, $dbpassword, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if email already exists
$SELECT = "SELECT EUmail FROM register WHERE EUmail = ? LIMIT 1";
$stmt = $conn->prepare($SELECT);
$stmt->bind_param("s", $EUmail);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows > 0) {
    echo "<script>
            alert('This email is already registered.');
            window.location.href = 'register.html';
          </script>";
    $stmt->close();
    $conn->close();
    exit();
}

// Generate OTP
$otp = rand(100000, 999999);

// Send OTP email
$mail = new PHPMailer(true);
try {
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'kolathurkingjoel@gmail.com'; // Replace with your email
    $mail->Password = 'kvfa efwj nqdo cxps';  // Replace with your app password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    $mail->setFrom('your-email@gmail.com', 'Your App Name');
    $mail->addAddress($EUmail, $Username);

    $mail->isHTML(true);
    $mail->Subject = 'Your OTP for Registration';
    $mail->Body = "Hello <b>$Username</b>,<br>Your OTP is: <b>$otp</b>.<br>This OTP is valid for 5 minutes.";
    $mail->AltBody = "Hello $Username, Your OTP is: $otp.";

    $mail->send();

    // Save OTP in session
    $_SESSION['otp'] = $otp;

    echo "<script>
            alert('OTP sent to $EUmail. Please check your inbox.');
            window.location.href = 'verify_otp.html';
          </script>";
} catch (Exception $e) {
    echo "<script>
            alert('Failed to send OTP. Error: {$mail->ErrorInfo}');
            window.location.href = 'register.html';
          </script>";
}

$stmt->close();
$conn->close();

?>
