<?php
session_start();
// include('connection.php');
include('../../connection.php');


if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $value = $_POST['value'];


    if (strlen($value) > 0) {
        $str = $value . "%";
        $sql = "Select * from Employee where name like '{$str}' or email like '{$str}' or mobileno like '{$str}' or id like '{$str}' ";
        echo strlen($value);
        echo $sql;
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<option value='" . $row['id'] . "'>" . $row['name'] . "(" . $row['email'] . ")" . "</option>";
            }
        }
    }

    $conn->commit();
    $conn->close();
}