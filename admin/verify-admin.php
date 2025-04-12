<?php 
    session_start();
    include '../includes/db.php';
    if(isset($_POST["submit"])) {
        $adminid = $_POST["admin-id"];
        
        $sql = "SELECT * FROM admin WHERE Admin_ID = '$adminid'";
        $result = mysqli_query($conn,$sql);

        if($row = mysqli_fetch_assoc($result)) {
            if($adminid == $row["Admin_ID"]) {
                $_SESSION["Admin_ID"] = $row["Admin_ID"];

                echo "<script>alert('Verification done');window.location.href='admin-pass-reset.php';</script>";
                exit();
            } else {
                echo "<script>alert('Invalid admin ID');window.location.href='admin-login.php';</script>";
            }
        } else {
            echo "<script>alert('Invalid admin ID');window.location.href='admin-login.php';</script>";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify-admin</title>
    <link rel="stylesheet" href="../public/css/global.css">
    <link rel="stylesheet" href="../public/css/submit-button.css">
    <link rel="stylesheet" href="../admin/css/verify-admin.css">
    <link rel="stylesheet" href="../public/css/form.css">
</head>
<body>
<button onclick="history.back()" class="backbutton" name="backbutton" >
        back
        </button>
    <div class="div-container" style="background-color: white;">
        <i class="fa-solid fa-user-lock"></i>
        <p>Trouble with logging in?</p>
        <p>Enter your email address to verify your account</p>
        <form action="verify-admin.php" method="POST" style="all:unset">
        <input type="number" id="admin-id" name="admin-id" required>
        <br> <br>
        <input type="submit" value="verify" id="submit" name="submit">
       </form>
    </div>
    <script src="https://kit.fontawesome.com/781c7c7d6c.js" crossorigin="anonymous"></script>
</body>
</html>