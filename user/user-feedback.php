<?php 
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 500px;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
        }
        label {
            font-weight: bold;
        }
        input, textarea, select {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        input[readonly] {
            background-color: #e9ecef;
        }
        button {
            width: 100%;
            padding: 10px;
            background: #28a745;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background: #218838;
        }
    </style>
    <script>
        function generateRandomID(prefix) {
            return prefix + Math.floor(1000 + Math.random() * 9000); // Generates a 4-digit random number
        }

        function loadIDs() {
            document.getElementById("requestID").value = generateRandomID("REQ-");
            document.getElementById("feedbackID").value = generateRandomID("FBK-");
            document.getElementById("userID").value = generateRandomID("USR-");
        }

        function submitFeedback() {
            alert("Thank you for your feedback!");
            document.getElementById("feedbackForm").reset();
            loadIDs(); // Regenerate IDs after submission
        }
        
        window.onload = loadIDs; // Load IDs when page loads
    </script>
</head>
<body>
    <div class="container">
        <h2>Feedback Form</h2>
        <form id="feedbackForm" onsubmit="event.preventDefault(); submitFeedback();">
            
            <label for="requestID">Request ID:</label>
            <input type="text" id="requestID" name="requestID" readonly>

            <label for="feedbackID">Feedback ID:</label>
            <input type="text" id="feedbackID" name="feedbackID" readonly>

            <label for="userID">User ID:</label>
            <input type="text" id="userID" name="userID" readonly>

            <label for="rating">Rating (1-5):</label>
            <select id="rating" name="rating" required>
                <option value="">Select</option>
                <option value="1">1 - Very Poor</option>
                <option value="2">2 - Poor</option>
                <option value="3">3 - Average</option>
                <option value="4">4 - Good</option>
                <option value="5">5 - Excellent</option>
            </select>

            <label for="comments">Comments:</label>
            <textarea id="comments" name="comments" placeholder="Enter your feedback..." required></textarea>

            <button type="submit">Submit Feedback</button>
        </form>
    </div>
</body>
</html>