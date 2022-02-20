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
    $sql = "Select Employee.name ,Attendance_Correction.* From Employee inner JOIN Attendance_Correction ON Employee.id = Attendance_Correction.uid and Employee.reportingmanager = {$uid} and Attendance_Correction.status = -1";
    $result = $conn->query($sql);
    // $nameResult = $conn->query($nameSql);
    // $contentString = '
    // <thead>
    //         <tr class="text-left border-b-2 border-gray-300">
    //         <th class="px-4 py-3"><input id="all-checkbox" type="checkbox" class="select-all"></th>
    //         <th class="px-4 py-3">Name</th>
    //             <th class="px-4 py-3">Date</th>
    //             <th class="px-4 py-3">Reason</th>
    //             <th class="px-4 py-3">Request-in</th>
    //             <th class="px-4 py-3">Request-out</th>
    //             <th class="px-4 py-3">status</th>
    //             <th class="px-4 py-3">Remarks</th>

    //         </tr>
    //     </thead>
    // <tbody>

    // ';
    $reasonText = "";
    $cnt = 0;

    if ($result->num_rows > 0) {

        while ($row = $result->fetch_assoc()) {
            ++$cnt;


            if ($row['reason'] == 0) {
                $reasonText = "Forgot Check-in";
            } else if ($row['reason'] == 1) {
                $reasonText = "Forgot Check-out";
            } else {
                $reasonText = "Forgot Both";
            }


            $contentString .= '<tr class="border-b-2 border-gray-300">';

            $contentString .= '<td class="px-4 py-3">' . '<input type="checkbox" id="' . $row['id'] . '" class="select" >' . '</td>';

            $contentString .= '<td class="px-4 py-3">' . $row['name'] . '</td>';


            $contentString .= '<td class="px-4 py-3">' . $row['date'] . '</td>';

            $contentString .=  '<td class="px-4 py-3">' . $reasonText . '</td>';

            $contentString .=  '<td class="px-4 py-3">' . $row['check-in'] . '</td>';

            $contentString .=  '<td class="px-4 py-3">' . $row['check-out'] . '</td>';

            // $contentString .=  '<td class="px-4 py-3">' . $row['status'] . '</td>';

            $contentString .=  '<td class="px-4 py-3">' . $row['remarks'] . '</td>';

            $contentString .=  '</tr>';
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