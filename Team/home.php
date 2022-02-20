<div class="border m-6">

    <?php
    session_start();
    $uid = $_SESSION['uid'];
    $sql = "Select name,id From Employee where reportingmanager = '{$uid}'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {

            echo "<p class=\"p-2 bg-green-100 border m-1 \">" . $row['id'] . $row['name'] . "</p>";
        }
    } else {
        echo $uid . "No team memebr";
    }
    $conn->commit();
    ?>






</div>