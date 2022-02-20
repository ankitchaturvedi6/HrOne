<?php
session_start();
// include('connection.php');
include('../../connection.php');


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $_POST['name'];
    $father = $_POST['father'];
    $address = $_POST['address'];
    $mobile = $_POST['mobile'];
    $dob = $_POST['dob'];
    $position = $_POST['position'];
    $manager = $_POST['manager'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $gender = $_POST['gender'];
    $role = $_POST['role'];
    $date;
    $mydate = getdate(date("U"));
    $date = "$mydate[year]-$mydate[mon]-$mydate[mday]";

    $password = md5($password);
    $sql = "Insert Into Employee Values(NULL,'{$name}','{$email}','{$password}','{$mobile}','{$date}','{$father}','{$dob}','{$gender}',{$manager},{$position},{$role})";

    if ($conn->query($sql) === TRUE) {
        $conn->commit();
        echo "successfull";
    } else {
        echo $sql;
        echo "Try After Some Time";
    }
    $conn->close();
}