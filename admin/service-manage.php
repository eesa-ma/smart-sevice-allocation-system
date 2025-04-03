<?php 
    session_start();
    include '../includes/db.php';

    if (isset($_POST['assign_technician'])) {
        $request_id = $_POST['request_id'];
        $technician_id = $_POST['technician_id'];
        $assignQuery = "UPDATE service_request 
                        SET Techinician_ID = '$technician_id', Status = 'In Progress' 
                        WHERE Request_ID = '$request_id'";
        
        if (mysqli_query($conn, $assignQuery)) {
            echo "<script>alert('Technician Assigned Successfully!'); window.location.href='service-manage.php';</script>";
        } else {
            echo "<script>alert('Error Assigning Technician');</script>";
        }
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
            background-color: #f4f4f4;
        }
        .container {
            max-width: 900px;
            margin: auto;
            background: white;
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
            border: 1px solid #ccc;
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #28a745;
            color: white;
        }
        select, button {
            padding: 10px;
            margin-top: 5px;
            border-radius: 5px;
            width: 100%;
        }
        button {
            background: #007bff;
            color: white;
            border: none;
            cursor: pointer;
        }
        button:hover {
            background: #0056b3;
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
            </tr>
            <?php 
                $query = "SELECT sr.Request_ID, u.name, sr.Description, sr.Location, sr.Techinician_ID
                          FROM service_request sr 
                          JOIN user u ON sr.User_ID = u.user_ID
                          WHERE sr.Status = 'Pending'";
                $result = mysqli_query($conn, $query);
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>
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
                                    echo $loc;
                                    $techQuery = "SELECT Techinician_ID, Name FROM technician WHERE Availability_Status = 1 AND Location LIKE '%$loc%'";
                                    $techResult = mysqli_query($conn, $techQuery);
                                    while ($tech = mysqli_fetch_assoc($techResult)) {
                                        echo "<option value='{$tech['Techinician_ID']}'>{$tech['Name']}</option>";
                                    }

                    echo "          </select>
                        </td>
                        <td><button type='submit' name='assign_technician'>Update</button></td>
                            </form>
                        </tr>";
                }
            ?>
        </table>
    </div>
</body>
</html>
