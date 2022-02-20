<?php

include('/var/www/html/HROneWebsite/connection.php');

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $uid = $_POST['uid'];
    $date = date("Y-m-d");
    date_default_timezone_set("Asia/Kolkata");
    $checkOut = date("h:i:sa");
    $sql = "Select * From Attendance where uid = {$uid} and date = '{$date}'";

    $result = $conn->query($sql);
    // if result contains zero row then there is no such entry
    if ($result->num_rows === 1) {
        $sql = "Update Attendance Set `checkout` = '{$checkOut}' where uid = {$uid}";
        if ($conn->query($sql) === TRUE) {
            echo "Checked Out successfully";
        } else {
            echo "Error: " . $conn->error;
        }
    } else {
        // echo "hello world" . $result->num_rows;
        echo "Please Try After Some Time";
    }

    if (!$conn->commit()) {
        echo "Please Try After Some Time";
        exit();
    }

    $conn->close();
}
// echo "nothing happened";