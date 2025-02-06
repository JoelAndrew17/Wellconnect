<?php
include "../include/config.php";

if ($_SERVER["REQUEST_METHOD"] === "GET") {
    $doctorId = isset($_GET['doctorId']) ? intval($_GET['doctorId']) : null;
    $date = isset($_GET['date']) ? $_GET['date'] : null;

    $response = ["unavailableSlots" => []];

    if ($doctorId && $date) {
        // Prepare query to fetch unavailable slots
        $query = "SELECT visit FROM appointments WHERE Doctor_ID = ? AND selected_date = ? AND status = 'True'";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("is", $doctorId, $date);
        $stmt->execute();
        $result = $stmt->get_result();

        while ($row = $result->fetch_assoc()) {
            $response["unavailableSlots"][] = $row["visit"];
        }

        $stmt->close();
    }

    $conn->close();

    // Return the response as JSON
    header("Content-Type: application/json");
    echo json_encode($response);
    exit;
}
?>
