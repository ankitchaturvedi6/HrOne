<?php
session_start();
// include('connection.php');
include('../../../connection.php');


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $array = $_POST['users-id'];
    $array = explode(",", $array);
    $sql = "start transaction;";

    $checkInArray = array();
    $chekOutArray = array();

    foreach ($array as $value) {
        if ($value[strlen($value) - 1] == 'i') {
            $checkInArray[] =  substr($value, 0, strlen($value) - 1);
        } else {
            $checkOutArray[] = substr($value, 0, strlen($value) - 1);
        }
    }

    foreach ($checkInArray as $value) {
        $sql .= "Update Attendance Set instatus=0 where id={$value}; ";
    }


    foreach ($checkOutArray as $value) {
        $sql .= "Update Attendance Set outstatus=0 where id={$value}; ";
    }

    $sql .= "commit;";
    if ($conn->multi_query($sql)) {
        // $conn->commit();
        echo $sql;
        echo "successfully";
    } else {
        echo "some error occurred";
    }
}