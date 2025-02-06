<?php
session_start();
$input = $_POST['Username']; // This will handle both username and email
$pass = $_POST['pass'];

if (!empty($input) && !empty($pass)) {
    $host = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "medical";
    // Create connection
    $conn = new mysqli($host, $dbusername, $dbpassword, $dbname);
    
    if ($conn->connect_error) {
        die('Connect Error (' . $conn->connect_errno . ') ' . $conn->connect_error);
    } else {
        // Check if input is an email or username
        if (filter_var($input, FILTER_VALIDATE_EMAIL)) {
            // It's an email, so search in the 'register' table
            $SELECT_USER = "SELECT * FROM register WHERE EUmail = '$input' AND pass = '$pass'";
            $userQuery = $conn->query($SELECT_USER);

            if ($userQuery->num_rows == 1) {
                $userinfo = $userQuery->fetch_assoc();
                $_SESSION['ID'] = $userinfo['ID'];
                header("Location: homepage/index.html");
                exit();
            }
        } else {
            // It's a username, so search in the 'doctor_details' table
            $SELECT_DOCTOR = "SELECT * FROM doctor_details WHERE Doctor_Name = '$input' AND Doctor_password = '$pass'";
            $doctorQuery = $conn->query($SELECT_DOCTOR);

            if ($doctorQuery->num_rows == 1) {
                $doctorInfo = $doctorQuery->fetch_assoc();
                $_SESSION['Doctor_ID'] = $doctorInfo['Doctor_ID'];
                $_SESSION['Doctor_Name'] = $doctorInfo['Doctor_Name']; // Store the doctor's name
                header("Location: Doctor/dash.php");
                exit();
            }
        }

        // If no match in either table
        echo "<script>
                alert('Incorrect email/username or password.');
                window.location.href = 'login.html';
              </script>";
    }
} else {
    echo "All fields are required.";
    die();
}
?>
