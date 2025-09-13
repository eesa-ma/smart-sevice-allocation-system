<?php
    session_start();
    include '../includes/db.php';

    if(isset($_POST["submit"])) {
        $email = $_POST["useremail"];
        $password = $_POST["userpassword"];


        
        $sql = "SELECT * FROM user WHERE Email = '$email'";
        $result = mysqli_query($conn, $sql);

        if ($row = mysqli_fetch_assoc($result)) {
            if($password == $row["Password"]) {
               
                $_SESSION["userid"] = $row["user_ID"];
                $_SESSION["username"] = $row["Name"];
                $_SESSION["useremail"] = $row["Email"];
    
                header("Location: user-dash.php");
                
            } else {
                echo "<script>alert('Incorrect password!'); window.location.href='user-signin.php';</script>";
            }
        } else {
            echo "<script>alert('User not found! Please sign up first.'); window.location.href='user-account.php';</script>";
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sign-in</title>
    <link rel="stylesheet" href="../public/css/global.css">
    <link rel="stylesheet" href="css/signin.css">
    <link rel="stylesheet" href="../public/css/form.css">
    <link rel="stylesheet" href="../public/css/submit-button.css">
</head>
<body>
    <div class="container">
    <header>
        <h1>SMART SERVICE ALLOCATION SYSTEM</h1>
    </header>
    <form action="user-signin.php" method="post">
        <table>
            <tr>
                <th colspan="2">SIGN IN/SIGN UP</th>
            </tr>
            <tr>
                <td><label for="useremail">Email id:</label></td>
                <td><input type="email" id="useremail" name="useremail" required></td>
            </tr>
            <tr>
                <td><label for="userpassword">Password:</label></td>
                <td><input type="password" id="userpassword" name="userpassword"></td>
            </tr>
            <tr>
            </tr>
            <tr>
            <td colspan="2">
                <center><input type="submit" value="Sign In" id="submit" name="submit"></center>
            </td>
            </tr>
            <tr>
            <td colspan="2">
                <center><button onclick="history.back()" class="backbutton" name="backbutton" >
        back
        </button></center>
            </td>
            </tr>
            <tr>
               <td colspan="2"><center><a href="../user/user-verify.php" >Forgotten your password?</a></center></td> 
            </tr>
            <tr>
                <td colspan="2"><center><a href="../user/user-account.php">Don't have an account?</a></center></td>
            </tr>
        </table>
    </form>
</div>
</body>
</html>