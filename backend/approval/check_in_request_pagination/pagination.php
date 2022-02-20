<?php
session_start();
// include('connection.php');
include('../../../connection.php');

if ($_SERVER["REQUEST_METHOD"] == 'GET') {
    $uid = $_SESSION['uid'];
    $pageNo = $_GET['Page'];
    $noOfRow = $_GET['Row'];
    $perfomr = $_GET['Perform'];
    $offsetValue = ($pageNo - 1) * ($noOfRow);
    $sql = "Select Employee.name ,Attendance.* From Employee inner JOIN Attendance ON Employee.id = Attendance.uid and Employee.reportingmanager = {$uid} and (Attendance.outstatus = -1 or Attendance.instatus = -1) Order By Attendance.date DESC";
    $result = $conn->query($sql);
    // $nameResult = $conn->query($nameSql);
    // $contentString = '
    // <thead>
    //         <tr class="text-left border-b-2 border-gray-300">
    //         <th class="px-4 py-3"><input type="checkbox" class="select-all"></th>
    //         <th class="px-4 py-3">Name</th>
    //             <th class="px-4 py-3">Date</th>
    //             <th class="px-4 py-3">check-in</th>
    //             <th class="px-4 py-3">check-out</th>
    //         </tr>
    //     </thead>
    // <tbody>

    // ';
    $cnt = 0;
    if ($result->num_rows > 0) {

        while ($row = $result->fetch_assoc()) {
            $cnt += 2;
            if (!empty($row['checkin']) && $row['instatus'] == -1) {
                $contentString .= '<tr class="border-b-2 border-gray-300">';

                $contentString .= '<td class="px-4 py-3">' . '<input type="checkbox" id="' . $row['id'] . 'i" class="select" >' . '</td>';

                $contentString .= '<td class="px-4 py-3">' . $row['name'] . '</td>';


                $contentString .= '<td class="px-4 py-3">' . $row['date'] . '</td>';

                $contentString .=  '<td class="px-4 py-3">' . $row['checkin'] . '</td>';


                $contentString .=  '<td class="px-4 py-3">' . '</td>';


                $contentString .=  '<td class="px-4 py-3">' . '</td>';

                $contentString .=  '</tr>';
            }


            if (!empty($row['checkout']) && $row['outstatus'] == -1) {
                $contentString .= '<tr class="border-b-2 border-gray-300">';

                $contentString .= '<td class="px-4 py-3">' . '<input type="checkbox" id="' . $row['id'] . 'o" class="select" >' . '</td>';

                $contentString .= '<td class="px-4 py-3">' . $row['name'] . '</td>';


                $contentString .= '<td class="px-4 py-3">' . $row['date'] . '</td>';

                $contentString .=  '<td class="px-4 py-3">' . '</td>';


                $contentString .=  '<td class="px-4 py-3">' . $row['checkin'] . '</td>';


                $contentString .=  '<td class="px-4 py-3">' . '</td>';

                $contentString .=  '</tr>';
            }
        }
        // $contentString .= '</tbody>';
    }

    function getMaxPageNo($conn)
    {
        global $cnt;
        // $sql = "Select Count(*) As Total From Attendance_Correction";


        // $result = $conn->query($sql);

        // $total = 0;
        // if ($result->num_rows > 0) {
        //     while ($row = $result->fetch_assoc()) {
        //         $total = $row['Total'];
        //     }
        // }


        return $cnt;
    }

    function sendJsonData($conn, $contentString)
    {

        $total = getMaxPageNo($conn);
        header('Content-Type:application/json');

        echo json_encode(['maxPage' => $total, 'values' => $contentString]);
    }

    if ($pageNo == 1) {

        sendJsonData($conn, $contentString);
    } else {
        echo $contentString;
    }
}