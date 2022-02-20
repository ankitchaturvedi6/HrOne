'use strict';

const checkInEl = document.getElementById('check-in');
const checkOutEl = document.getElementById('check-out');
const attendanceEl = document.getElementById('mark-attendance');
const closeAttendance = document.getElementById('close-attendance');
const attendanceBtn = document.getElementById('attendance-btn');
const userId = document.getElementById('userid').value;

const removeAlertEl = function () {
    const alertBox = document.querySelector('.alert-box');
    alertBox.classList.add('hidden');
}

const markCheckIn = function () {
    let xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            const alertBox = document.querySelector('.alert-box');
            alertBox.classList.remove('hidden');
            document.querySelector('.alert-box-text').textContent = this.responseText;
            closeAtt();
            setTimeout(removeAlertEl, 1500);
        }
    };
    xmlhttp.open("POST", "backend/attendance/mark_attendance_check_in.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("uid=" + userId);

}

const markCheckOut = function () {

    let xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            const alertBox = document.querySelector('.alert-box');
            alertBox.classList.remove('hidden');
            document.querySelector('.alert-box-text').textContent = this.responseText;
            closeAtt();
            setTimeout(removeAlertEl, 1500);
        }
    };
    xmlhttp.open("POST", "backend/attendance/mark_attendance_check_out.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("uid=" + userId);

}

const closeAtt = function () {
    attendanceEl.classList.add('hidden');
}

const showAttendance = function () {
    attendanceEl.classList.remove('hidden');
}

checkInEl.addEventListener('click', markCheckIn);

checkOutEl.addEventListener('click', markCheckOut);

closeAttendance.addEventListener('click', closeAtt);

attendanceBtn.addEventListener('click', showAttendance);