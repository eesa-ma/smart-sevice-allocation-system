<?php 
    session_start();
    if (!isset($_SESSION["userid"])) {
        echo "<script>alert('User not logged in. Please log in first.'); window.location.href='../user/user-signin.php';</script>";
        exit();  
    }
    include '../includes/db.php';

    if(isset($_POST["submit"])) {
        $servicetype = $_POST["serviceType"];
        $description = $_POST["description"];
        $location = $_POST["location"];
        $mobileno = $_POST["mobile"];

        if(isset($_SESSION["userid"])) {
            $userID = $_SESSION["userid"];
        }
       
        $sql = "INSERT INTO service_request (Description, Location, Status, User_ID) 
                VALUES ('$description', '$location', 'Pending', '$userID')";
        $result = mysqli_query($conn, $sql);

        if($result) {
            echo "<script>
                    alert('Your service request has been submitted successfully!');
                    window.location.href = '../user/user-dash.php';
                  </script>";
                
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Service Request</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 500px;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
        }
        label {
            font-weight: bold;
        }
        input, textarea, select {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button {
            width: 100%;
            padding: 10px;
            background: #28a745;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background: #218838;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Service Request Form</h2>
        <form action="user-request.php" method="POST" id="serviceForm">
            <label for="serviceType">Type of Service:</label>
            <select id="serviceType" name="serviceType" required>
                <option value="">Select</option>
                <option value="electronics-repair">Electronics Repair</option>
                <option value="device-installation">Device Installation & Setup</option>
                <option value="technical-troubleshooting">Technical Troubleshooting</option>
            </select>
            
            <label for="description">Service Description:</label>
            <textarea id="description" name="description" required></textarea>
            
            <label for="location">District:</label>
            <select id="location" name="location" required>
                <option value="">Select District</option>
                <option value="Thiruvananthapuram">Thiruvananthapuram</option>
                <option value="Kollam">Kollam</option>
                <option value="Pathanamthitta">Pathanamthitta</option>
                <option value="Alappuzha">Alappuzha</option>
                <option value="Kottayam">Kottayam</option>
                <option value="Idukki">Idukki</option>
                <option value="Ernakulam">Ernakulam</option>
                <option value="Thrissur">Thrissur</option>
                <option value="Palakkad">Palakkad</option>
                <option value="Malappuram">Malappuram</option>
                <option value="Kozhikode">Kozhikode</option>
                <option value="Wayanad">Wayanad</option>
                <option value="Kannur">Kannur</option>
                <option value="Kasaragod">Kasaragod</option>
            </select>
            <label for="mobile">Mobile Number:</label>
            <input type="tel" id="mobile" name="mobile" pattern="[0-9]{10}" placeholder="Enter 10-digit mobile number" required>
            <button type="submit" id="submit" name="submit">Submit Request</button>
        </form>
    </div>
</body>
</html>
