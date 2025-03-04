

function markAttendance () {
    let btn = document.getElementById("techeattendance");

    if (btn.innerHTML === "Unavailable") {
        btn.innerHTML = "Available";
        btn.style.backgroundColor = "green";
    } else {
        btn.innerHTML = "Unavailable";
        btn.style.backgroundColor = "red"; 
    }
}