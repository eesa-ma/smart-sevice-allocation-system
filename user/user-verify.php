<?php 
    session_start();
    include '../includes/db.php';

    if(isset($_POST["submit"])) {
        $useremail = $_POST["user-email"];
        
        $sql = "SELECT * FROM user WHERE Email = '$useremail'";
        $result = mysqli_query($conn,$sql);

        if($row = mysqli_fetch_assoc($result)) {
            if($useremail == $row["Email"]) {
                $_SESSION["useremail"] = $row["Email"];

                echo "<script>alert('Verification done');window.location.href='user-passreset.php';</script>";
                exit();
            } else {
                echo "<script>alert('Invalid credentials');window.location.href='user-signin.php';</script>";
            }
        } else {
            echo "<script>alert('Invalid credentials');window.location.href='user-signin.php';</script>";
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify-user</title>
    <link rel="stylesheet" href="../public/css/global.css">
    <link rel="stylesheet" href="../public/css/submit-button.css">
    <link rel="stylesheet" href="../user/css/verify.css">
    <link rel="stylesheet" href="../public/css/form.css">
</head>
<body>
    <div class="div-container" style="background-color: white;">
        <i class="fa-solid fa-user-lock"></i>
        <p>Trouble with logging in?</p>
        <p>Enter your email address to verify your account</p>
        <form action="user-verify.php" method="POST" style="all:unset">
        <input type="email" id="user-email" name="user-email" required> <br> <br>
        <input type="submit" value="verify" id="submit" name="submit">
    </div>
    <script src="https://kit.fontawesome.com/781c7c7d6c.js" crossorigin="anonymous"></script>
</body>
</html>