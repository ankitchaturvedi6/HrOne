<?php
session_start();
// include('connection.php');
include('../../connection.php');


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $uid = $_SESSION['uid'];
    $inTime = $_POST['inTime'];
    $outTime = $_POST['outTime'];
    $date = $_POST['date'];
    $reason = $_POST['reason'];
    $remarks = $_POST['remarks'];


    $sql = "Insert Into Attendance_Correction Values(NULL,{$uid},'{$reason}','{$date}','{$inTime}','{$outTime}','-1','{$remarks}')";

    if ($conn->query($sql) === TRUE) {
        $conn->commit();
        echo $sql;
    } else {
        echo $uid;
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}