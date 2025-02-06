<?php
session_start();
require 'vendor/autoload.php'; // Load PHPMailer

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "medical";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}

// Check if doctor ID is set in the session
if (!isset($_SESSION['Doctor_ID'])) {
    die("Doctor is not logged in.");
}

$doctor_id = $_SESSION['Doctor_ID']; // Fetch Doctor_ID from session

// Fetch doctor's name from the doctor_details table
$SELECT_DOCTOR = "SELECT Doctor_Name FROM doctor_details WHERE Doctor_ID = ? LIMIT 1"; // Updated column names
$stmt = $conn->prepare($SELECT_DOCTOR);
$stmt->bind_param("i", $doctor_id);
$stmt->execute();
$stmt->bind_result($doctor_name);
$stmt->fetch();
$stmt->close();

if (!$doctor_name) {
    $doctor_name = "your doctor"; // Fallback if doctor's name is not found
}

// Get appointment ID from URL
$appointment_id = $_GET['id'] ?? null;

if (!$appointment_id) {
    die("Invalid appointment ID.");
}

// Fetch patient's email and appointment details
$SELECT = "SELECT email, selected_date, visit FROM appointments WHERE ID = ? LIMIT 1";
$stmt = $conn->prepare($SELECT);
$stmt->bind_param("i", $appointment_id);
$stmt->execute();
$stmt->bind_result($email, $selected_date, $time_slot);
$stmt->fetch();
$stmt->close();

if (!$email) {
    die("Patient email not found.");
}

// Update appointment status to "Approved"
$UPDATE = "UPDATE appointments SET status = 'True', appoint = 'Upcoming' WHERE ID = ?";
$stmt = $conn->prepare($UPDATE);
$stmt->bind_param("i", $appointment_id);

if ($stmt->execute()) {
    // Send email to patient
    $mail = new PHPMailer(true);
    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'kolathurkingjoel@gmail.com'; // Replace with your email
        $mail->Password = 'kvfa efwj nqdo cxps';  // Replace with your app password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        $mail->setFrom('your-email@gmail.com', 'Hospital Management System');
        $mail->addAddress($email);

        $mail->isHTML(true);
        $mail->Subject = 'Appointment Approved';
        $mail->Body = "
            Dear Patient,<br>
            Your appointment with <b>Dr. $doctor_name</b> on <b>$selected_date</b> for the time slot <b>$time_slot</b> has been approved.<br>
            Thank you for choosing our services.";
        $mail->AltBody = "Dear Patient, Your appointment with Dr. $doctor_name on $selected_date for the time slot $time_slot has been approved. Thank you for choosing our services.";

        $mail->send();
        
        // Popup message for success
        echo "<script>
                alert('Appointment approved and email sent successfully.');
                window.location.href = 'appointments.php'; // Replace 'appointments.php' with the actual page URL
              </script>";
    } catch (Exception $e) {
        // Popup message for email failure
        echo "<script>
                alert('Appointment approved, but email could not be sent. Error: {$mail->ErrorInfo}');
                window.location.href = 'appointments.php'; // Replace 'appointments.php' with the actual page URL
              </script>";
    }
} else {
    // Popup message for approval failure
    echo "<script>
            alert('Failed to approve appointment.');
            window.location.href = 'appointments.php'; // Replace 'appointments.php' with the actual page URL
          </script>";
}

$stmt->close();
$conn->close();
?>
