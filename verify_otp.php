<?php
session_start();

// Debugging output - Remove before deployment
header('Content-Type: application/json');

// Database configuration
$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "medical";

$response = [
    'debug' => [
        'submittedOtp' => $_POST['otp'] ?? 'No OTP sent',
        'sessionOtp' => $_SESSION['otp'] ?? 'No OTP in session',
        'submittedEmail' => $_POST['email'] ?? 'No email sent',
        'sessionEmail' => $_SESSION['EUmail'] ?? 'No email in session',
    ],
];

$submittedOtp = $_POST['otp'] ?? '';
$email = $_POST['email'] ?? '';
$response['status'] = 'error'; // Default response

try {
    if (!isset($_SESSION['otp'], $_SESSION['EUmail'])) {
        $response['message'] = 'Session expired. Please restart the process.';
        echo json_encode($response);
        exit();
    }

    $generatedOtp = $_SESSION['otp'];
    $sessionEmail = $_SESSION['EUmail'];

    if ($submittedOtp === strval($generatedOtp) && $email === $sessionEmail) {
        unset($_SESSION['otp']); // Security cleanup

        // Connect to the database
        $pdo = new PDO("mysql:host=$host;dbname=$dbname", $dbusername, $dbpassword);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Insert user data into the database
        $stmt = $pdo->prepare("INSERT INTO register (Username, EUmail, pass) VALUES (:Username, :EUmail, :pass)");
        $stmt->bindParam(':Username', $_SESSION['Username']); // Assuming name is stored in session
        $stmt->bindParam(':EUmail', $_SESSION['EUmail']);
        $stmt->bindParam(':pass', $_SESSION['pass']); // Assuming password is stored in session

        $stmt->execute();

        $response['status'] = 'success';
        $response['message'] = 'OTP verified and user data added successfully.';
    } else {
        $response['message'] = 'Invalid OTP or email.';
    }
} catch (PDOException $e) {
    $response['message'] = 'Database error: ' . $e->getMessage();
} catch (Exception $e) {
    $response['message'] = 'Error: ' . $e->getMessage();
}

echo json_encode($response);
exit();
?>
