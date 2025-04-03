<?php 
    session_start();
    include("../includes/db.php"); 
    $user_id = $_SESSION['userid'];

    $total_orders_query = "SELECT COUNT(*) AS total FROM service_request WHERE User_ID = $user_id";
    $total_orders_result = mysqli_query($conn, $total_orders_query);
    $total_orders = mysqli_fetch_assoc($total_orders_result)['total'];

    $pending_orders_query = "SELECT COUNT(*) AS pending FROM service_request WHERE User_ID = $user_id AND status = 'Pending'";
    $pending_orders_result = mysqli_query($conn, $pending_orders_query);
    $pending_orders = mysqli_fetch_assoc($pending_orders_result)['pending'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>USER DASHBOARD</title>
    <link rel="stylesheet" href="../public/css/global.css">
    <link rel="stylesheet" href="../public/css/submit-button.css">
    <link rel="stylesheet" href="../user/css/dash.css">
</head>
<body>
    <div class="sidebar" id="sidebar">
        <h2>Dashboard</h2>
        <ul>
            <li><a href="../public/index.php">Home</a></li>
            <li><a href="../user/user-request.php">Request a Service</a></li>
            <li><a href="../user/track-service.php">Track Your Service Status</a></li>
            <li><a href="../user/user-feedback.php">Rating and Feedback</a></li>
        </ul>
        <form action="../includes/logout.php" method="POST">
            <button class="logout" name="logout">Logout</button>
        </form>
    </div>
    <div class="main-content">
        <div class="topbar">
            Welcome, <?php echo isset($_SESSION["username"]) ? $_SESSION["username"] : "User"; ?>
        </div>      
        <div class="cards">
            <div class="card">
                <h3>Total Orders</h3>
                <p><?php echo $total_orders; ?></p>
            </div>
            <div class="card">
                <h3>Pending Orders</h3>
                <p><?php echo $pending_orders; ?></p>
            </div>
        </div>
    </div>
</body>
</html>
