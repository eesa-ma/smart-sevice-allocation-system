<?php 
session_start();
include '../includes/db.php';

if (isset($_POST['assign_technician'])) {
    $request_id = $_POST['request_id'];
    $technician_id = $_POST['technician_id'];
    
    // Use prepared statement for security
    $stmt = $conn->prepare("UPDATE service_request 
                            SET Techinician_ID = ?, Status = 'In Progress' 
                            WHERE Request_ID = ?");
    $stmt->bind_param("ii", $technician_id, $request_id);
    
    if ($stmt->execute()) {
        echo "<script>alert('Technician Assigned Successfully!'); window.location.href='service-manage.php';</script>";
    } else {
        echo "<script>alert('Error Assigning Technician');</script>";
    }
    $stmt->close();
}

if (isset($_POST['delete_request'])) {
    $request_id = $_POST['request_id'];
    
    $stmt = $conn->prepare("DELETE FROM service_request WHERE Request_ID = ?");
    $stmt->bind_param("i", $request_id);
    
    if ($stmt->execute()) {
        echo "<script>alert('Request Deleted Successfully!'); window.location.href='service-manage.php';</script>";
    } else {
        echo "<script>alert('Error Deleting Request');</script>";
    }
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Service Requests</title>
    <link rel="stylesheet" href="../public/css/global.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            color:white;
            background-color: #f3f3e0;
            background-image: url('/smart-sevice-allocation-system/public/images/all.png'); 
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }
        .container {
            max-width: 900px;
            margin: auto;
            background: #333333;
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
        td{
            background-color:#333333;
            color:white;
        }
        select, button {
            padding: 10px;
            margin-top: 5px;
            border-radius: 5px;
            width: 100%;
        }
        button.update-btn {
            background: #FF0000;
            color: white;
            border: none;
            cursor: pointer;
        }
        button.delete-btn {
            background-color:red;
            color: white;
            border: none;
            cursor: pointer;
        }
        button.update-btn:hover {
            background: darkred;
        }
        button.delete-btn:hover {
            background: darkred;
        }
        .action-column {
            display: flex;
            gap: 5px;
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
        .backbutton:hover {
            background: darkred;
        }
        .status-rejected {
            background-color: #ffe6e6;
            color: #721c24;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Manage Service Requests</h2>
        <table>
            <tr>
                <th>Request ID</th>
                <th>Customer Name</th>
                <th>Service Description</th>
                <th>Location</th>
                <th>Assign Technician</th>
                <th>Action</th>
                <th>Status</th> <!-- Added Status column -->
            </tr>
            <?php 
                // Updated query to show both Pending and Rejected requests
                $query = "SELECT sr.Request_ID, u.name, sr.Description, sr.Location, sr.Techinician_ID, sr.Status
                          FROM service_request sr 
                          JOIN user u ON sr.User_ID = u.user_ID
                          WHERE sr.Status IN ('Pending', 'Rejected')";
                $result = mysqli_query($conn, $query);
                while ($row = mysqli_fetch_assoc($result)) {
                    $rowClass = $row['Status'] == 'Rejected' ? 'status-rejected' : '';
                    echo "<tr class='$rowClass'>
                        <td>{$row['Request_ID']}</td>
                        <td>{$row['name']}</td>
                        <td>{$row['Description']}</td>
                        <td>{$row['Location']}</td>
                        <td>
                            <form method='POST' action=''>
                                <input type='hidden' name='request_id' value='{$row['Request_ID']}'>
                                <select name='technician_id' required>
                                    <option value=''>Select Technician</option>";
                                    $loc = $row['Location'];
                                    $techQuery = "SELECT Techinician_ID, Name FROM technician WHERE Availability_Status = 1 AND Location LIKE '%$loc%'";
                                    $techResult = mysqli_query($conn, $techQuery);
                                    while ($tech = mysqli_fetch_assoc($techResult)) {
                                        echo "<option value='{$tech['Techinician_ID']}'>{$tech['Name']}</option>";
                                    }
                    echo "          </select>
                        </td>
                        <td class='action-column'>
                            <button type='submit' name='assign_technician' class='update-btn'>Update</button>
                            </form>
                            <form method='POST' action=''>
                                <input type='hidden' name='request_id' value='{$row['Request_ID']}'>
                                <button type='submit' name='delete_request' class='delete-btn'>Delete</button>
                            </form>
                        </td>
                        <td>{$row['Status']}</td>
                    </tr>";
                }
            ?>
        </table>
        <center><button onclick="history.back()" class="backbutton" name="backbutton">
        back
        </button></center>
    </div>
</body>
</html>