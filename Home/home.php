<div class="flex flex-row justify-between w-100vh bg-gray-300 py-4">
    <ul class="ml-4">
        <li>
            <h1>Home</h1>
        </li>
    </ul>
    <button id="attendance-btn" class="border p-2 bg-indigo-400 order-last mr-4">Mark Attendace</button>
</div>



<div class="grid grid-cols-2 m-4 gap-4">


    <div class="border border-gray-300 p-8 flex flex-col text-left">
        <?php
        include('connection.php');
        $uid = $_SESSION['uid'];
        $sql = "Select * from Employee where id = {$uid}";
        $result = $conn->query($sql);

        if ($result->num_rows == 1) {

            $row = $result->fetch_assoc();
        }
        ?>
        <div>
            <p>Name</p>
            <p class="text-indigo-500"> <?= $row['name'] ?></p>
        </div>

        <div>
            <p>Email</p>
            <p class="text-indigo-500"><?= $row['email'] ?></p>
        </div>
        <div>
            <p>Mobile-NO</p>
            <p class="text-indigo-500"><?= $row['mobileno'] ?></p>
        </div>

        <div>
            <p>Reporting Manager</p>
            <p class="text-indigo-500">
                <?php
                $manageid = $row['reportingmanager'];
                $s = "Select name from Employee where id = '{$manageid}'";
                $r = $conn->query($s);
                if ($r->num_rows > 0) {
                    $ro = $r->fetch_assoc();
                    // echo $manageid;
                    echo $ro['name'];
                } else {
                    echo "Admin";
                }
                ?>



            </p>
        </div>
    </div>

    <div class="border border-gray-300 p-8 flex flex-col text-left">

        <?php
        // $uid = $_SESSION['uid'];
        $leaveArray  = array();
        $leaveName = array();
        $sql = "Select * From Leave_Types";
        $result = $conn->query($sql);
        while ($row = $result->fetch_assoc()) {
            $leaveArray[$row['id']] = $row['qty'];
            $leaveName[$row['id']] = $row['type'];
        }
        // $sql = "Select Leave_Types.*,Leaves.uid,Leaves.leaveid,COUNT(Leaves.leaveid) As TotalUsed From Leaves INNER JOIN Leave_Types ON Leaves.leaveid = Leave_Types.id and Leaves.status = 1 and Leaves.uid = '{$uid}' GROUP BY Leaves.leaveid;";
        $sql = "Select Leaveid From Leaves where uid = '{$uid}' and status = 1";
        $result = $conn->query($sql);
        while ($row = $result->fetch_assoc()) {
            $leaveArray[$row['Leaveid']] -= 1;
        }
        foreach ($leaveArray as $key => $value) {
        ?>


        <p><?= $leaveName[$key]; ?></p>
        <p class="text-indigo-500">
            <?= $value ?>
        </p>
        <?php
        } ?>

    </div>



</div>

<div id="mark-attendance" class="w-1/3 bg-white fixed top-5 left-100 z-20 text-center hidden">
    <i id="close-attendance" class="large material-icons absolute right-0 cursor-pointer">close</i>
    <h1 class="px-3 my-4">Mark Your Attendance</h1>
    <button id="check-in" class="mx-4 my-4 p-2 bg-indigo-400">Check-in</button>
    <button id="check-out" class="mx-4 my-4 p-2 bg-indigo-400">Check-out</button>
</div>

<div class="alert-box bg-green-200 border w-60 fixed right-5 top-2 z-10 hidden">
    <p class="text-black p-2 alert-box-text"></p>


</div>


<input type="hidden" value="<?= $_SESSION['uid'] ?>" id="userid">


<script type="text/javascript" src="Scripts/home/attendance.js"></script>