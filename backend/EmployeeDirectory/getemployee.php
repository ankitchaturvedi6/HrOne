<?php
session_start();
// include('connection.php');
include('../../connection.php');


if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $value = $_POST['value'];



    $sql = "Select * from Employee where id = {$value}";

    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        header('Content-Type:application/json');


        $row = $result->fetch_assoc();
        echo json_encode(['name' => $row['name'], 'email' => $row['email'], 'mobile' => $row['mobileno'], 'date' => $row['dateofjoining']]);
    }



    $conn->commit();
    $conn->close();
}