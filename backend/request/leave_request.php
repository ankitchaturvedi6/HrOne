<?php
session_start();
// include('connection.php');
include('../../connection.php');

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $uid = $_SESSION['uid'];
    $name = $_SESSION['name'];
    $type = $_POST['type'];
    $sdate = $_POST['sdate'];
    $edate = $_POST['edate'];
    $remarks = $_POST['remarks'];
    $mydate = getdate(date("U"));
    $tdate = "$mydate[year]-$mydate[mon]-$mydate[mday]";

    $sql = "Insert Into Leaves Values(NULL,{$uid},'{$sdate}','{$edate}','{$type}','-1','{$tdate}','{$remarks}','{$name}')";

    if ($conn->query($sql) === TRUE) {
        $conn->commit();
        echo "Successfull";
    } else {
        // echo $sql;
        echo "Please Try After Some time";
    }
}