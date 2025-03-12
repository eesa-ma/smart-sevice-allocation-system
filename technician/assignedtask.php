<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Technician Panel</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 900px;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
        }
        .table-container {
            overflow-x: auto;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #007bff;
            color: white;
        }
        select, button {
            padding: 10px;
            margin-top: 10px;
            border-radius: 5px;
            width: 100%;
        }
        button {
            background: #28a745;
            color: white;
            border: none;
            cursor: pointer;
        }
        button:hover {
            background: #218838;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Technician Panel - Assigned Requests</h2>
        <div class="table-container">
            <table>
                <tr>
                    <th>Request ID</th>
                    <th>Customer Name</th>
                    <th>Service Type</th>
                    <th>Location</th>
                    <th>Mobile Number</th>
                    <th>Customer Details</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                <tr>
                    <td>001</td>
                    <td>Ashir</td>
                    <td>Electrical</td>
                    <td>Kozhikode, Kerala</td>
                    <td>9876543210</td>
                    <td><button>View Details</button></td>
                    <td>
                        <select>
                            <option value="Pending">Pending</option>
                            <option value="Accepted">Accepted</option>
                            <option value="In Progress">In Progress</option>
                            <option value="Completed">Completed</option>
                        </select>
                    </td>
                    <td><button>Update</button></td>
                </tr>
                <tr>
                    <td>002</td>
                    <td>Eesa</td>
                    <td>Plumbing</td>
                    <td>Ernakulam, Kerala</td>
                    <td>9876501234</td>
                    <td><button>View Details</button></td>
                    <td>
                        <select>
                            <option value="Pending">Pending</option>
                            <option value="Accepted">Accepted</option>
                            <option value="In Progress">In Progress</option>
                            <option value="Completed">Completed</option>
                        </select>
                    </td>
                    <td><button>Update</button></td>
                </tr>
                <tr>
                    <td>003</td>
                    <td>Deva</td>
                    <td>Garden</td>
                    <td>Thiruvananthapuram, Kerala</td>
                    <td>9876123456</td>
                    <td><button>View Details</button></td>
                    <td>
                        <select>
                            <option value="Pending">Pending</option>
                            <option value="Accepted">Accepted</option>
                            <option value="In Progress">In Progress</option>
                            <option value="Completed">Completed</option>
                        </select>
                    </td>
                    <td><button>Update</button></td>
                </tr>
            </table>
        </div>
    </div>
</body>
</html>