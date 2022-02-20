<?php
session_start();
// include('connection.php');
include('../../../connection.php');


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $array = $_POST['users-id'];
    $array = explode(",", $array);
    $sql = "start transaction;";

    foreach ($array as $value) {

        $sql .= "Update Leaves Set status=1 where uid={$value};";
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