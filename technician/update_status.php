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
<?php
session_start();
include '../includes/db.php';

if (!isset($_SESSION['technicianid'])) {
    header("Location: login.php"); // Redirect to login if not authenticated
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $request_id = $_POST['request_id'];
    $status = $_POST['status'];
    $technician_id = $_SESSION['technicianid'];

    // Use prepared statement to prevent SQL injection
    $stmt = $conn->prepare("UPDATE service_request SET Status = ? WHERE Request_ID = ? AND Techinician_ID = ?");
    $stmt->bind_param("sii", $status, $request_id, $technician_id);

    if ($stmt->execute()) {
        // If the status is "Rejected", clear the Techinician_ID
        if ($status === 'Rejected') {
            $clearStmt = $conn->prepare("UPDATE service_request SET Techinician_ID = NULL WHERE Request_ID = ?");
            $clearStmt->bind_param("i", $request_id);
            $clearStmt->execute();
            $clearStmt->close();
        }
        echo "<script>alert('Status updated successfully!'); window.location.href='assignedtask.php';</script>";
    } else {
        echo "<script>alert('Error updating status'); window.location.href='assignedtask.php';</script>";
    }
    $stmt->close();
} else {
    header("Location: assignedtask.php");
}
?>