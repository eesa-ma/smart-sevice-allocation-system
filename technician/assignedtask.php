<?php
session_start();
include '../includes/db.php'; 
$technician_id = $_SESSION["technicianid"]; 
$query = "SELECT r.Request_ID, u.name AS customer_name, 
                 u.Address, u.Phone_NO, r.Status
          FROM service_request r
          JOIN user u ON r.User_ID = u.user_ID
          WHERE r.Techinician_ID = $technician_id 
          AND r.Status NOT IN ('Completed', 'Rejected')";
$result = mysqli_query($conn, $query);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Technician Panel</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f3f3e0;
            background-image: url('/smart-sevice-allocation-system/public/images/all.png'); 
    background-size: contain;
    background-position: center;
    background-repeat: no-repeat;
    background-attachment: fixed;
    position: relative;
        }
        .container {
            max-width: 900px;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background-color: #333333;
            color:white;
        }
        h2 {
            text-align: center;
        }
        .table-container {
            overflow-x: auto;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f3f3e0;
            color: black;
        }
        select, button {
            padding: 10px;
            margin-top: 10px;
            border-radius: 5px;
            width: 100%;
        }
        button {
            background: red;
            color: white;
            border: none;
            cursor: pointer;
        }
        button:hover {
            background: darkred;
        }
        .backbutton {
    width: 100%;
    padding: 10px;
    background-color: red;
    color: white;
    border: none;
    border-radius: 10px;
    cursor: pointer;
}
.backbutton:hover{
    background: darkred;
}
    </style>
</head>
<body>
    <div class="container">
        <h2>Technician Panel - Assigned Requests</h2>
        <div class="table-container">
            <table>
                <tr>
                    <th>Request ID</th>
                    <th>Customer Name</th>
                    <th>Location</th>
                    <th>Mobile Number</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td><?php echo $row['Request_ID']; ?></td>
                    <td><?php echo $row['customer_name']; ?></td>
                    <td><?php echo $row['Address']; ?></td>
                    <td><?php echo $row['Phone_NO']; ?></td>
                    <td>
                        <form action="update_status.php" method="POST">
                            <input type="hidden" name="request_id" value="<?php echo $row['Request_ID']; ?>">
                            <select name="status" required>
                                <option value="" disabled selected>Select </option>
                                <option value="Accepted" <?php if ($row['Status'] == 'Accepted') echo 'selected'; ?>>Accepted</option>
                                <option value="Rejected" <?php if ($row['Status'] == 'Rejected') echo 'selected'; ?>>Rejected</option>
                                <option value="Completed" <?php if ($row['Status'] == 'Completed') echo 'selected'; ?>>Completed</option>
                            </select>
                    </td>
                    <td><button type="submit">Update</button></td>
                    </form>
                </tr>
                <?php } ?>
            </table>
            <center><button onclick="window.location.href='../technician/technician-dashboard.php'" class="backbutton" name="backbutton">
        back
        </button></center>
        </div>
    </div>
</body>
</html>
