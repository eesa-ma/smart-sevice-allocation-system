<?php
include '../includes/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $request_id = $_POST['request_id'];
    $status = $_POST['status'];

    $query = "UPDATE service_request SET Status = '$status' WHERE Request_ID = $request_id";

    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Status updated successfully!'); window.location.href='assignedtask.php';</script>";
    } else {
        echo "<script>alert('Failed to update status.'); window.location.href='technician-dashboard.php';</script>";
    }
}
?>
