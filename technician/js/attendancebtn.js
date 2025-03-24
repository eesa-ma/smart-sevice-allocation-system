document.getElementById("attendanceBtn").addEventListener("click", function (event) {
    event.preventDefault(); // Prevent default button action
    let btn = this;

    fetch("../technician/attendance.php", { method: "POST" }) // Ensure correct path
    .then(response => response.text())
    .then(data => {
        if (data.trim() === "1") {  // Ensure it matches "1" exactly
            btn.innerHTML = "Available";
            btn.style.backgroundColor = "green";
        } else if (data.trim() === "0") {
            btn.innerHTML = "Unavailable";
            btn.style.backgroundColor = "red";
        } else {
            console.error("Database update failed:", data);
        }
    })
    .catch(error => console.error("Fetch Error:", error));
});
