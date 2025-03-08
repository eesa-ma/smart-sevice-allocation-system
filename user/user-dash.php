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
    </div>

    <div class="main-content">
        <button class="toggle-btn" onclick="toggleSidebar()">☰ Menu</button>
        <div class="topbar">
            Welcome, User
        </div>
        
        <div class="cards">
            <div class="card">
                <h3>Total Orders</h3>
                <p>4</p>
            </div>
            <div class="card">
                <h3>Pending Orders</h3>
                <p>2</p>
            </div>
        </div>
    </div>
</body>
</html>