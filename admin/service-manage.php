<?php 
    session_start();
    include '../includes/db.php';
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
            max-width: 800px;
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
        select, button, textarea {
            padding: 10px;
            margin-top: 10px;
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
                <th>Status</th>
                <th>Action</th>
            </tr>
            <?php 
                $query = "SELECT sr.Request_ID, u.name, sr.Description, sr.Location, sr.Status 
                          FROM service_request sr 
                          JOIN user u ON sr.User_ID = u.user_ID";

                $result = mysqli_query($conn, $query);
                
                while($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>
                        <td>{$row['Request_ID']}</td>
                        <td>{$row['name']}</td>
                        <td>{$row['Description']}</td>
                        <td>{$row['Location']}</td>
                        <td>
                            <select>
                                <option value='Pending' " . ($row['Status'] == 'Pending' ? 'selected' : '') . ">Pending</option>
                                <option value='In Progress' " . ($row['Status'] == 'In Progress' ? 'selected' : '') . ">In Progress</option>
                                <option value='Completed' " . ($row['Status'] == 'Completed' ? 'selected' : '') . ">Completed</option>
                            </select>
                        </td>
                        <td><button>Update</button></td>
                    </tr>";
                }
            ?>
        </table>
    </div>
</body>
</html>
