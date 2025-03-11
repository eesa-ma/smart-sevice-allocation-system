<?php 
    session_start();
    include '../includes/db.php';

    if(isset($_POST["submit"])) {
        $techncianemail = $_POST["techemai"];
        $password = $_POST["techpassowrd"];

        $sql = "SELECT * FROM technician WHERE Email = '$techncianemail'";
        $result = mysqli_query($conn,$sql);

        if($row = mysqli_fetch_assoc($result)) {
            if($password == $row["Password"]) {
                $_SESSION["technicianid"] = $row["Techinician_ID"];
                $_SESSION["name"] = $row["Name"];
                $_SESSION["technicianemail"] = $row["Email"];

                header("Location: technician-dashboard.php");
                exit();
            } else {
                echo "<script>alert('Incorrect password!'); window.location.href='user-signin.php';</script>";
            }
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
                <td colspan="2" id="savetechinfo"><input type="checkbox" id="techlogincheck" name="techlogincheck">&nbsp<label for="techlogincheck">Save login info</label></td>
            </tr>
            <tr> 
                <td><p id="techloginerror" name="techloginerror"></p></td> <!--for displaying error message -->
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
</body>
</html>