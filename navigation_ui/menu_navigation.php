<nav class="nav-bar-left fixed top-0 left-0 bottom-0 w-60 border bg-gray-800">

    <img src="assests/images/logo.png" class="w-full h-40">

    <ul class="w-3/5 mx-10 text-white p-5 list-none">

        <li id="item-home" class="text-lg ny-2 cursor-pointer">
            <a href="index.php" target="_self">Home</a>
        </li>


        <li id="Approval" class="text-lg my-2 cursor-pointer">
            Approval
            <ul id="Approval-items" class="list-items text-base w-3/5 mx-2 hidden">
                <li id="Approval-items__Leave" class="my-4"><a href="approve_leave.php">Leave</a></li>
                <li id="Approval-items__Attendance" class="my-4"><a href="approve_attendance.php"
                        target="_self">Attendance</a></li>

            </ul>

        </li>



        <li id="Request" class="text-lg my-2 cursor-pointer">
            Request
            <ul id="Request-items" class="list-items text-base w-3/5 mx-2 my-2 hidden list-none">
                <li id="Request-items__Leave" class="my-4"><a href="request_leave.php">Leave</a></li>
                <li id="Request-items__Attendance" class="my-4"><a href="request_attendance.php"
                        target="_self">Attendance</a></li>


            </ul>

        </li>


        <li class="text-lg my-2 cursor-pointer">
            <a href="team.php" target="_self">Team</a>
        </li>



        <?php
        if ($_SESSION['positionid'] != 3) {
        ?>
        <li id="add-member" class="text-lg my-2 cursor-pointer">
            <a href="employee.php" target="_self">Employee</a>
        </li>

        <?php
        }
        ?>




    </ul>




</nav>