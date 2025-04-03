<?php
include '../includes/db.php'; 
session_start();
if (!isset($_SESSION["Admin_ID"])) {
    header("Location: admin-login.php"); 
    exit();
}
$query = "SELECT f.Feedback_ID, f.Comments, f.Rating, f.Request_ID, u.Name AS User_Name, t.Name AS Technician_Name 
          FROM feedback f
          JOIN service_request s ON f.Request_ID = s.Request_ID
          JOIN user u ON f.User_ID = u.user_ID
          JOIN technician t ON s.Techinician_ID = t.Techinician_ID";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - View Feedback</title>
    <style>
       body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            color:white;
            background-color: #f3f3e0;
            background-image: url('/smart-sevice-allocation-system/public/images/all.png'); 
            background-size: cover; /* Ensures the whole image is displayed without cropping */
            background-position: center; /* Centers the image */
            background-repeat: no-repeat; /* Prevents repetition */
            background-attachment: fixed;
        }
        .container {
            max-width: 900px;
            margin: auto;
            background: #333333 ;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 2px solid #ccc;
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f3f3e0;
            color: black;
        }
        
        .back-btn:hover {
            background: darkred;
        }
        .back-btn { display: block; margin: 10px auto; padding: 8px 15px; background-color: red; color: white; text-align: center; text-decoration: none; width: 150px; border-radius: 5px; }
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
<h2>All Feedback</h2>
<table>
    <tr>
        <th>Feedback ID</th>
        <th>User</th>
        <th>Technician</th>
        <th>Request ID</th>
        <th>Rating</th>
        <th>Comments</th>
    </tr>
    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
    <tr>
        <td><?php echo $row['Feedback_ID']; ?></td>
        <td><?php echo $row['User_Name']; ?></td>
        <td><?php echo $row['Technician_Name']; ?></td>
        <td><?php echo $row['Request_ID']; ?></td>
        <td><?php echo $row['Rating']; ?> / 5</td>
        <td><?php echo $row['Comments']; ?></td>
    </tr>
    <?php } ?>
</table>
<a href="admin-dash.php" class="back-btn">Back to Dashboard</a>
<div>
</body>
</html>
