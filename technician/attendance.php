<?php
session_start();
require '../includes/db.php'; // Ensure correct path

if (isset($_SESSION["technicianid"])) {
    $technicianId = $_SESSION["technicianid"];

    // Fetch current availability status
    $query = "SELECT Availability_Status FROM technician WHERE Techinician_ID = $technicianId";
    $result = mysqli_query($conn, $query);

    if ($row = mysqli_fetch_assoc($result)) {
        // Toggle status
        $newStatus = ($row["Availability_Status"] == "1") ? "0" : "1";

        // Update database
        $updateQuery = "UPDATE technician SET Availability_Status = '$newStatus' WHERE Techinician_ID = $technicianId";
        if (mysqli_query($conn, $updateQuery)) {
            echo $newStatus; // Output new status to be handled in JS
        } else {
            echo "error";
        }
    } else {
        echo "error";
    }
    exit;
}
?>
