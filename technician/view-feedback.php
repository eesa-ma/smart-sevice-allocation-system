<?php
include '../includes/db.php'; 
session_start();
if (!isset($_SESSION["technicianid"])) {
    header("Location: login.php"); 
    exit();
}
$technician_id = $_SESSION["technicianid"];
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
        body { font-family: Arial, sans-serif; padding: 20px;background-color:#f3f3e0; 
            background-image: url('/smart-sevice-allocation-system/public/images/all.png'); 
            background-size: contain; /* Ensures the whole image is displayed without cropping */
            background-position: center; /* Centers the image */
            background-repeat: no-repeat; /* Prevents repetition */
            background-attachment: fixed}
        h2 { text-align: center; }
        form{background-color: #333333;color:white; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; background-color: #333333}
        th, td { border: 1px solid ; padding: 10px; text-align: left; }
        th { background-color: #f3f3e0; color: black; }
        .back-btn { display: block; margin: 10px auto; padding: 8px 15px; background: red; color: white; text-align: center; text-decoration: none; width: 150px; border-radius: 5px; }
        .back-btn:hover{
            background: darkred;
        }
        .container {
            max-width: 900px;
            margin: auto;
            background: #333333 ;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    <div class="container">
    <form>
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
    </form>
    </div>
</body>
</html>
