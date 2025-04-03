<?php 
    session_start();
    include '../includes/db.php';

    if(isset($_POST["submit"])) {
        $techncianemail = $_POST["techemail"]; 
        $password = $_POST["techpassword"];   
        $sql = "SELECT * FROM technician WHERE Email = '$techncianemail'";
        $result = mysqli_query($conn, $sql);
        if (!$result) {
            die("Database query failed: " . mysqli_error($conn));
        }
        if ($row = mysqli_fetch_assoc($result)) {
            if ($password === $row["Password"]) { 
                $_SESSION["technicianid"] = $row["Techinician_ID"];
                $_SESSION["name"] = $row["Name"];
                $_SESSION["technicianemail"] = $row["Email"];
                header("Location: technician-dashboard.php");
                exit();
            } else {
                echo "<script>alert('Incorrect password!'); window.location.href='technician_login.php';</script>";
            }
        } else {
            echo "<script>alert('Technician not found!'); window.location.href='technician_login.php';</script>";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TECHNICIAN LOGIN</title>
    <link rel="stylesheet" href="../public/css/global.css">
    <link rel="stylesheet" href="../technician/css/signin.css">
    <link rel="stylesheet" href="../public/css/form.css">
    <link rel="stylesheet" href="../public/css/submit-button.css">
</head>
<body>
    <div class="container">
    <h1>TECHNICIAN LOGIN</h1>
    <form action="technician_login.php" method="post">
        <table>
            <tr>
                <th colspan="2">SIGN IN</th>
            </tr>
            <tr>
                <td><label for="techemail">Email id:</label></td>
                <td><input type="email" id="techemail" name="techemail" required></td>
            </tr>
            <tr>
                <td><label for="techpassword">Password:</label></td>
                <td><input type="password" id="techhpassword" name="techpassword"></td>
            </tr>
            <tr>
            </tr>
            <tr> 
                <td><p id="techloginerror" name="techloginerror"></p></td> 
            </tr>
            <tr>
            <td colspan="2">
                <center><input type="submit" value="Sign In" id="submit" name="submit"></center>
            </td>
            </tr>
            <tr>
               <td colspan="2"><center><a href="../technician/verify-technician.php" >Forgotten your password?</a></center></td> 
            </tr>
        </table>
    </form>
    </div>
</body>
</html>