<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/css/global.css">
    <title>Admin Dashboard</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
        }
        .sidebar {
            width: 200px;
            height: 100vh;
            background: #333;
            color: white;
            padding: 20px;
            position: fixed;
        }
        .sidebar h2 {
            text-align: center;
        }
        .sidebar ul {
            list-style: none;
            padding: 0;
        }
        .sidebar ul li {
            padding: 15px;
            border-bottom: 1px solid #444;
        }
        .sidebar ul li a {
            color: white;
            text-decoration: none;
            display: block;
        }
        .sidebar ul li:hover {
            background: #444;
        }
        .main-content {
            margin-left: 260px;
            padding: 20px;
            width: 100%;
        }
        .dashboard-cards {
            display: flex;
            gap: 20px;
        }
        .card {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px gray;
            flex: 1;
            text-align: center;
        }
        .logout {
            position: absolute;
            bottom: 45px;
            left: 50%;
            transform: translateX(-50%);
            background: red;
            padding: 10px;
            color: white;
            text-align: center;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body>

    <div class="sidebar">
        <h2>Admin Panel</h2>
        <ul>
            <li><a href="#home">Dashboard</a></li>
         
            <li><a href="/admin/service-manage.html">Manage Services</a></li>
            <li><a href="#">Reports</a></li>
            <li><a href="#">Settings</a></li>
        </ul>
        <div class="logout">Logout</div>
    </div>

    <div class="main-content" id="home">
        <h1>Welcome, Admin</h1>
        <div class="dashboard-cards">
            <div class="card">
                <h3>Total Users</h3>
                <p>150</p>
            </div>
            <div class="card">
                <h3>Active Services</h3>
                <p>35</p>
            </div>
            <div class="card">
                <h3>Pending Requests</h3>
                <p>10</p>
            </div>
        </div>
    </div>

</body>
</html>