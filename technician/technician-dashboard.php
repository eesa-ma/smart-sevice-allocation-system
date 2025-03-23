<?php
session_start();
include '../includes/db.php';

$technician_id = $_SESSION["technicianid"];

// Fetch assigned tasks count (Status: In progress)
$query_assigned = "SELECT COUNT(*) AS assigned_count FROM service_request WHERE Techinician_ID = $technician_id AND Status = 'In progress'";
$result_assigned = mysqli_query($conn, $query_assigned);
$row_assigned = mysqli_fetch_assoc($result_assigned);
$assigned_tasks = $row_assigned['assigned_count'];

// Fetch completed tasks count (Status: Completed)
$query_completed = "SELECT COUNT(*) AS completed_count FROM service_request WHERE Techinician_ID = $technician_id AND Status = 'Completed'";
$result_completed = mysqli_query($conn, $query_completed);
$row_completed = mysqli_fetch_assoc($result_completed);
$completed_tasks = $row_completed['completed_count'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Technician Dashboard</title>
    <link rel="stylesheet" href="../public/css/global.css">
    <link rel="stylesheet" href="../technician/css/dashboard.css">
</head>

<body>
    <div class="tech_dahboard">
        <div class="sidebar">
            <h2>Technician Panel</h2>
            <a href="#">Dashboard</a>
            <a href="../technician/assignedtask.php">Assigned Tasks</a>
            <a href="#">Profile</a>
            <a href="#">Settings</a>
            <form action="../includes/logout.php" method="POST">
                <button class="logout" name="logout">Logout</button>
            </form>
        </div>
        <div class="content">
            <h2>Welcome, Technician</h2>
            <div class="card-container">
                <div class="card">
                    <h5>Assigned Tasks</h5>
                    <p><?php echo $assigned_tasks; ?></p>
                </div>
                <div class="card">
                    <h5>Completed Tasks</h5>
                    <p><?php echo $completed_tasks; ?></p>
                </div>
            </div>
        </div>
        <div class="techside">
            <h2>Profile</h2> <br>
            <i class="fa-regular fa-user"></i> <br>
            <p id="techeid">Technician ID: <?php echo isset($_SESSION["technicianid"]) ? $_SESSION["technicianid"] : "Technician-ID"; ?></p> <br>
            <p id="techname"><?php echo isset($_SESSION["name"]) ? $_SESSION["name"] : "Technician"; ?></p> 
            <button class="attendance-button" id="attendanceBtn">Unavailable</button>
        </div>
    </div>
    <script src="https://kit.fontawesome.com/781c7c7d6c.js" crossorigin="anonymous"></script>
    <script src="../technician/js/attendancebtn.js"></script>
</body>
</html>
