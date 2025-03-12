<?php 
    include '../includes/db.php';

    if(isset($_POST["submit"])) {
        $name = $_POST["tech-name"];
        $email = $_POST["tech-mail"];
        $phoneno = $_POST["tech-phone"];
        $house = $_POST["house"];
        $street = $_POST["street"];
        $city = $_POST["city"];
        $pincode = $_POST["pincode"];
        $address = $house . ", " . $street . ", " . $city . " - " . $pincode;
        $skills = $_POST["tech-skill"];
        $password = $_POST["technicain-password"];
        $confirmpassword = $_POST["confirm-password"];

        if ($password !== $confirmpassword) {
            echo "<script>alert('Passwords do not match.');</script>";
        } else { 
            $sql = "INSERT INTO technician (Name, Skills, Location, Phone_No, Email, Password)
            VALUES ('$name','$skills','$address','$phoneno','$email','$password')";

        if (mysqli_query($conn, $sql)) {
            echo "<script>alert('Account created successfully!');window.location.href='admin-dash.php';</script>";
            exit();
        } else {
            $error = "Error: " . mysqli_error($conn);
        }    
    }
}
?>

<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Technician Management</title>
    <link rel="stylesheet" href="../public/css/global.css">
    <link rel="stylesheet" href="../admin/css/admin-login.css">
    <link rel="stylesheet" href="../public/css/form.css">
    <link rel="stylesheet" href="../public/css/submit-button.css">
</head>
<body>
    <header>
    <h1><center> Create Technician </center></h1>
    </header>
    <section class="create-tech">
        <form action="" method="post">
            <table>
                <tr>
                    <th colspan="2">Create Technician</th>
                </tr>
                <tr>
                    <td><label for="techname">Technician Name:</label></td>
                    <td><input type="text" name="tech-name" id="tech-name" required></td>
                </tr>
                <tr>
                    <td><label for="skills">Skills:</label></td>
                    <td><input type="text" name="tech-skill" id="tech-skill" required></td>
                </tr>
                <tr>
                    <td rowspan="4"><label for="tech-location">Location:</label></td>
                    <td><input type="text" name="house" id="house" placeholder="house no and house name" required></td>
                </tr>
                <tr>
                    <td><input type="text" id="street" name="street" placeholder="street name" required></td>
                </tr>
                <tr>
                    <td><input type="text" name="city" id="city" placeholder="city name" required></td>
                </tr>
                <tr>
                    <td><input type="number" name="pincode" id="pincode" placeholder="postal code" required></td>
                </tr>
                <tr>
                    <td><label for="techphone">Phone NO:</label></td>
                    <td><input type="text" name="tech-phone" id="tech-phone" required></td>
                </tr>
                <tr>
                    <td><label for="techmail">Email:</label></td>
                    <td><input type="text" name="tech-mail" id="tech-mail" required></td>
                </tr>
                <tr>
                    <td><label for="technician-pass">Password:</label></td>
                    <td><input type="password" name="technicain-password" id="technician-password"  required></td>
                </tr>
                <tr>
                    <td><label for="confirm-password">Confrim-password</label></td>
                <td><input type="password" name="confirm-password" id="confirm-password"  required></td>
                </tr>
                <tr>
                    <td colspan="2"><center><input type="submit" value="CREATE ACCOUNT" id="submit" name="submit"></center></td>
                </tr>

            </table>   
        </form>
    </section>
</body>
</html>