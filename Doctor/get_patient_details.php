<?php
include "../include/config.php";

if (isset($_GET['id'])) {
    $patient_id = $_GET['id'];

    // Query to fetch patient details
    $query = "SELECT email, phone_number, pain, issue FROM appointments WHERE ID = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('i', $patient_id);  // 'i' for integer
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $patient = $result->fetch_assoc();
        echo json_encode($patient);  // Return as JSON
    } else {
        echo json_encode(null);  // No data found
    }

    $stmt->close();
    $conn->close();
}
?>
