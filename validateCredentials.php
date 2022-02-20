<?php
session_start();

if (isset($_SESSION['uid'])) {
    header("Location:http://localhost/HROneWebsite/index.php");
    exit;
}
include('connection.php');

function isValid($userId)
{
    $noRegx = "/^[0-9]*$/i";
    return preg_match($noRegx, $userId);
}




$error = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $userId = $_POST['user-id'];
    $userPass = $_POST['user-pass'];
    $errorText = "";

    // validate data before checking in table


    if (isValid($userId)) {

        $passwordHash = md5($userPass);


        $sql = "Select * From Employee Where id = {$userId} and password = '{$passwordHash}'";

        $result = $conn->query($sql);

        if ($result->num_rows == 1) {
            $_SESSION['uid'] = $userId;
            $row = $result->fetch_assoc();
            $_SESSION['name'] = $row['name'];
            $_SESSION['positionid'] = $row['positionid'];

            header("Location:http://localhost/HROneWebsite/index.php");
            exit;
        } else {
            $error = true;
            $errorText = "Invalid Details";
        }
    } else {
        // user id and password is not correct
        $error = true;
        $errorText = "Invalid Details";
    }
}



$conn->close();