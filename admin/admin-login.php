<?php 
    session_start();
    include '../includes/db.php';
    if(isset($_POST["submit"])) {
        $adminid = $_POST["admin-id"];
        $password = $_POST["admin-pass"];
        $sql = "SELECT * FROM admin WHERE Admin_ID = '$adminid'";
        $result = mysqli_query($conn,$sql);

        if($row = mysqli_fetch_assoc($result)) {
            if($password == $row["password"]) {
                $_SESSION["Admin_ID"] = $row["Admin_ID"];
                
                header("Location: admin-dash.php");
                exit();
            } else {
                echo "<script>alert('Incorrect password!');window.location.href='admin-login.php';</script>";
            }
        } else {
            echo "<script>alert('Invalid login credentials');window.location.href='admin-login.php';</script>";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN LOGIN</title>
    <link rel="stylesheet" href="../public/css/global.css">
    <link rel="stylesheet" href="../admin/css/admin-login.css">
    <link rel="stylesheet" href="../public/css/form.css">
    <link rel="stylesheet" href="../public/css/submit-button.css">
</head>
<body>
    <div class="container">
        <h1><center>ADMIN LOGIN</center></h1>
        <section class="log-sec">
            <form action="admin-login.php" method="post">
                <table>
                    <tr>
                        <th colspan="2">ADMIN LOGIN</th>
                    </tr>
                    <tr>
                        <td><label for="admin-id">ADMIN ID:</label></td>
                        <td><input type="number" name="admin-id" id="admin-id" required></td>
                    </tr>
                    <tr>
                        <td><label for="admin-pass">Password:</label></td>
                        <td><input type="password" name="admin-pass" id="admin-pass" required></td>
                    </tr>
                    <tr>
                        <td colspan="2"><center><a href="../admin/verify-admin.php">Forgotten your password?</a></center></td>
                    </tr>
                    <tr>
                        <td colspan="2"><center><input type="submit" value="LOGIN" id="submit" name="submit"></center></td>
                    </tr>
                </table>   
            </form>
        </section>
    </div>
</body>

</html>