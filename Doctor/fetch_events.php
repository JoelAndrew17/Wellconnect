<?php
include "../include/config.php";

// Retrieve events from the database
$query = "SELECT name, selected_date FROM appointments WHERE status='True' AND appoint='Upcoming'";
$result = $conn->query($query);

$events = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $events[] = [
            'title' => $row['name'], // Use the 'name' column for event title
            'start' => $row['selected_date'] // Use the 'selected_date' column for event date
        ];
    }
}

$conn->close();

// Return events as JSON
echo json_encode($events);
?>
