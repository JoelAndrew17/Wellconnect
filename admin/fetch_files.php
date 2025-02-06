<?php
include "../include/config.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = isset($_POST['id']) ? intval($_POST['id']) : null;

    if (!$id) {
        die('Invalid ID.'); // Debugging: Ensure ID is received
    }

    // Query to fetch the `ehr_path` for the specific record
    $query = "SELECT ehr_path FROM appointments WHERE ID = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $ehr_path = $row['ehr_path'];

        if (!empty($ehr_path)) {
            // Base path to where files are located
            $basePath = '/med/login/homepage/   '; // Adjust path as needed

            $files = explode(',', $ehr_path);
            echo '<ul>';
            foreach ($files as $file) {
                // Construct the correct file path for each file
                $filePath = $basePath . htmlspecialchars(trim($file));
                echo '<li><a href="' . $filePath . '" target="_blank">' . htmlspecialchars(basename($file)) . '</a></li>';
            }
            echo '</ul>';
        } else {
            echo '<div>No EHR files available for this patient.</div>';
        }
    } else {
        echo '<div>Patient records not found.</div>';
    }

    $stmt->close();
    $conn->close();
} else {
    echo 'Invalid Request.';
}
?>
