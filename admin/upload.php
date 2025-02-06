<?php
// Collect data from the form
$doctorName = $_POST['doctor_name'];
$doctorMail = $_POST['doctor_mail'];
$doctorPassword = $_POST['doctor_password'];
$doctorDegree = $_POST['doctor_degree'];
$yearsExp = $_POST['years_exp'];
$languagesKnown = $_POST['languages_known'];
$location = $_POST['location'];

// Connect to the database (replace with your database details)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "medical";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare and execute the SQL statement
$stmt = $conn->prepare("INSERT INTO doctor_details (Doctor_Name, Doctor_mail, Doctor_password, Doctor_Degree, yearsEXP, Languages_known, Location) VALUES (?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssiss", $doctorName, $doctorMail, $doctorPassword, $doctorDegree, $yearsExp, $languagesKnown, $location);

if ($stmt->execute()) {
    // On success, display a pop-up and redirect
    echo "<script>
            alert('Doctor successfully added!');
            window.location.href = 'adddoctors.php'; // Redirect to the adddoctors.php page
          </script>";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
