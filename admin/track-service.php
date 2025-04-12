<?php
    session_start();
    include("../includes/db.php"); ; 
    $query = "SELECT * FROM service_request";
    $result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Track Service</title>
    <link rel="stylesheet" href="../public/css/global.css">
    <link rel="stylesheet" href="../user/css/track-service.css">
</head>
<body>
    <div class="container">
        <h2>Track Your Service Status</h2>
        <table>
            <tr>
                <th>Request ID</th>
                <th>Description</th>
                <th>Status</th>
            </tr>
            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td><?php echo ($row['Request_ID']); ?></td>
                    <td><?php echo ($row['Description']); ?></td>
                    <td><?php echo ($row['Status']); ?></td>
                </tr>
            <?php } ?>
            
        </table>
        <center><button onclick="history.back()" class="backbutton" name="backbutton" >
        back
        </button></center>
    </div>
</body>
</html>
