<?php

include('/var/www/html/HROneWebsite/connection.php');

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $uid = $_POST['uid'];
    $checkOut = NULL;
    $date = date("Y-m-d");
    date_default_timezone_set("Asia/Kolkata");
    $checkIn = date("h:i:sa");
    $in_status = $out_status = -1;
    $mydate = getdate(date("U"));
    $month = $mydate['month'];
    $year = $mydate['year'];

    $sql = "Select * From Attendance where uid = {$uid} and date = '{$date}'";

    $result = $conn->query($sql);


    // if result contains zero row then there is no such entry
    if ($result->num_rows === 0) {
        $sql = "Insert Into Attendance Values(NULL,{$uid},'{$checkIn}',NULL,'{$date}','{$month}','{$year}',{$in_status},{$out_status})";
        if ($conn->query($sql) === TRUE) {
            echo "Checked in successfully";
        } else {
            echo "Error: " . $conn->error;
        }
    } else {
        // echo "hello world" . $result->num_rows;

        echo  "Already Checked in";
    }

    if (!$conn->commit()) {
        echo "Please Try After Some Time";
        exit();
    }

    $conn->close();
}
// echo "nothing happened";