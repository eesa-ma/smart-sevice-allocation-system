<?php
include '../includes/db.php'; 
session_start();
$user_id = $_SESSION["userid"]; 
$query = "SELECT Request_ID, Description FROM service_request WHERE User_ID = '$user_id' AND Status = 'Completed'";
$result = mysqli_query($conn, $query);
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $request_id = $_POST['request_id'];
    $rating = $_POST['rating'];
    $comments = $_POST['comments'];

    $sql = "INSERT INTO feedback (User_ID, Request_ID, Rating, Comments) 
            VALUES ('$user_id', '$request_id', '$rating', '$comments')";
    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Feedback submitted successfully!'); window.location='user-dash.php';</script>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback</title>
    <style>
        body { font-family: Arial, sans-serif; padding: 20px; }
        form { width: 50%; margin: auto; border: 1px solid #ccc; padding: 20px; border-radius: 10px; }
        label { font-weight: bold; display: block; margin-top: 10px; }
        select, textarea, button { width: 100%; padding: 10px; margin-top: 5px; }
        button { background-color: #007bff; color: white; border: none; cursor: pointer; }
        button:hover { background-color: #0056b3; }
    </style>
    <script>
        function showServiceDetails() {
            let serviceDetails = document.getElementById("serviceDetails");
            let selectedOption = document.getElementById("request_id").selectedOptions[0];
            serviceDetails.innerText = "Service Description: " + selectedOption.getAttribute("data-desc");
        }
    </script>
</head>
<body>
<h2>Submit Feedback</h2>
<form method="POST" action="">
    <label>Select Service:</label>
    <select name="request_id" id="request_id" onchange="showServiceDetails()" required>
        <option value="">-- Select Service --</option>
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <option value="<?php echo $row['Request_ID']; ?>" data-desc="<?php echo $row['Description']; ?>">
                <?php echo "Request #" . $row['Request_ID']; ?>
            </option>
        <?php } ?>
    </select>
    <p id="serviceDetails" style="font-style: italic; color: gray;"></p>
    <label>Rating (1-5):</label>
    <select name="rating" required>
        <option value="1">1 - Poor</option>
        <option value="2">2 - Fair</option>
        <option value="3">3 - Good</option>
        <option value="4">4 - Very Good</option>
        <option value="5">5 - Excellent</option>
    </select>
    <label>Comments:</label>
    <textarea name="comments" required></textarea>
    <button type="submit">Submit Feedback</button>
</form>
</body>
</html>
