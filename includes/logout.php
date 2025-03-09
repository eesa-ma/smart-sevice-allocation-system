<?php 
    session_start();
    if(isset($_POST["logout"])) {
        session_destroy();
        header("Location: ../public/index.php");
        exit();
    }
?>