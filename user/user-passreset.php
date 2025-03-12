<?php 
    session_start();
    include '../includes/db.php';
    if(isset($_POST["submit"])) {
        $password = $_POST["new-password"];
        $confirmpassword = $_POST["confirm-password"];

        if (empty($_POST["new-password"]) || empty($_POST["confirm-password"])){
            echo "<script>alert('Please fill in all fields.')</script>;";
        }
        elseif ($password !== $confirmpassword) {
            echo "<script>alert('Passwords do not match.');</script>";    
        } else { 
            $useremail =  $_SESSION["useremail"];
            $sql = "UPDATE user SET password = '$password' WHERE Email = '$useremail'";

            if (mysqli_query($conn, $sql)) {
                echo "<script>alert('Password updated successfully!');window.location.href='../user/user-signin.php';</script>";
            } else {
                echo "<script>alert('Error updating password.');</script>";
            }
        }
       
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <link rel="stylesheet" href="../public/css/global.css">
    <link rel="stylesheet" href="../public/css/form.css">
    <link rel="stylesheet" href="../public/css/submit-button.css">
    <link rel="stylesheet" href="../user/css/passreset.css">
</head>
<body>
    <div class="div-container">
    <form action="user-passreset.php" method="POST">
        <table>
            <tr>
                <th colspan="2">Reset Password</th>
            </tr>
            <tr>
                <td><label for="new-password">New password: </label></td>
                <td><input type="password" id="new-password" name="new-password"></td>
            </tr>
            <tr>
                <td><label for="confirm-password">Confirm password:</label></td>
                <td><input type="password" id="confirm-password" name="confirm-password"></td>
            </tr>
            <tr>
                <td colspan="2"><center><input type="submit" id="submit" name="submit" value="Reset Password"></center></td>
            </tr>
        </table>
    </form>
</div>
</body>
</html>