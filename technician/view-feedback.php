<?php
include '../includes/db.php'; // Database connection
session_start();
if (!isset($_SESSION["technicianid"])) {
    header("Location: login.php"); // Redirect if not logged in
    exit();
}
$technician_id = $_SESSION["technicianid"];

// Fetch feedback related to the technician's services
$query = "SELECT f.Feedback_ID, f.Comments, f.Rating, f.Request_ID, u.Name AS User_Name 
          FROM feedback f
          JOIN service_request s ON f.Request_ID = s.Request_ID
          JOIN user u ON f.User_ID = u.user_ID
          WHERE s.Techinician_ID = '$technician_id'";

$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Technician Feedback</title>
    <style>
        body { font-family: Arial, sans-serif; padding: 20px; }
        h2 { text-align: center; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 10px; text-align: left; }
        th { background-color: #007bff; color: white; }
        tr:nth-child(even) { background-color: #f2f2f2; }
        .back-btn { display: block; margin: 10px auto; padding: 8px 15px; background: #007bff; color: white; text-align: center; text-decoration: none; width: 150px; border-radius: 5px; }
    </style>
</head>
<body>

<h2>Feedback for Your Services</h2>

<table>
    <tr>
        <th>Feedback ID</th>
        <th>User</th>
        <th>Request ID</th>
        <th>Rating</th>
        <th>Comments</th>
    </tr>
    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
    <tr>
        <td><?php echo $row['Feedback_ID']; ?></td>
        <td><?php echo $row['User_Name']; ?></td>
        <td><?php echo $row['Request_ID']; ?></td>
        <td><?php echo $row['Rating']; ?> / 5</td>
        <td><?php echo $row['Comments']; ?></td>
    </tr>
    <?php } ?>
</table>

<a href="technician-dashboard.php" class="back-btn">Back to Dashboard</a>

</body>
</html>
