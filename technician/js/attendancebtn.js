document.getElementById("techeattendance").addEventListener("click", function (event) {
    event.preventDefault(); // Prevent form submission
    let btn = this;

    fetch("../technician/attendance.php", { method: "POST" })
    .then(response => response.text())
    .then(data => {
        if (data === "success") {
            // Toggle button text and color
            if (btn.innerHTML === "Unavailable") {
                btn.innerHTML = "Available";
                btn.style.backgroundColor = "green";
            } else {
                btn.innerHTML = "Unavailable";
                btn.style.backgroundColor = "red";
            }
        } else {
            console.error("Database update failed");
        }
    })
    .catch(error => console.error("Fetch Error:", error));
});