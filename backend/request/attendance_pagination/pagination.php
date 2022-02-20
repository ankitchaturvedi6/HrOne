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

    $sql = 'Select * From Attendance_Correction Where uid=? LIMIT ?,?';

    $stmt = $conn->prepare($sql);
    $stmt->bind_param('sss', $uid, $offsetValue, $noOfRow);
    $stmt->execute();
    $result = $stmt->get_result();

    $contentString = '
    <thead>
            <tr class="text-left border-b-2 border-gray-300">
                <th class="px-4 py-3">Date</th>
                <th class="px-4 py-3">Reason</th>
                <th class="px-4 py-3">Request-in</th>
                <th class="px-4 py-3">Request-out</th>
                <th class="px-4 py-3">status</th>
                <th class="px-4 py-3">Remarks</th>

            </tr>
        </thead>
    <tbody>

    ';



    if ($result->num_rows > 0) {


        while ($row = $result->fetch_assoc()) {
            $reasonText = "";
            $statusText = "";
            if ($row['reason'] == 0) {
                $reasonText = "Forgot Check In";
            } else if ($row['reason'] == 1) {
                $reasonText = "Forgot Check Out";
            } else {
                $reasonText = "Forgot Both";
            }

            if ($row['status'] == -1) {
                $statusText = "Pending";
            } else if ($row['status'] == 0) {
                $statusText = 'Rejected';
            } else {
                $statusText = 'Approved';
            }



            $contentString .= '<tr>';

            $contentString .= '<td class="px-4 py-3">' . $row['date'] . '</td>';

            $contentString .=  '<td class="px-4 py-3">' . $reasonText . '</td>';

            $contentString .=  '<td class="px-4 py-3">' . $row['check-in'] . '</td>';

            $contentString .=  '<td class="px-4 py-3">' . $row['check-out'] . '</td>';

            $contentString .=  '<td class="px-4 py-3">' . $statusText . '</td>';

            $contentString .=  '<td class="px-4 py-3">' . $row['remarks'] . '</td>';

            $contentString .=  '</tr>';
        }
        $contentString .= '</tbody>';
    }

    function getMaxPageNo($conn, $uid)
    {
        $sql = "Select Count(*) As Total From Attendance_Correction Where uid='{$uid}'";


        $result = $conn->query($sql);

        $total = 0;
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $total = $row['Total'];
            }
        }


        return $total;
    }

    function sendJsonData($conn, $contentString, $uid)
    {

        $total = getMaxPageNo($conn, $uid);
        header('Content-Type:application/json');

        echo json_encode(['maxPage' => $total, 'values' => $contentString]);
    }

    if ($pageNo == 1) {

        sendJsonData($conn, $contentString, $uid);
    } else {
        echo $contentString;
    }
}