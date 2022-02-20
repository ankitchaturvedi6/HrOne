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
    $sql = 'Select * From Attendance Where uid = ? LIMIT ?,?';

    $stmt = $conn->prepare($sql);
    $stmt->bind_param('sss', $uid, $offsetValue, $noOfRow);
    $stmt->execute();
    $result = $stmt->get_result();



    $contentString = '
    <thead>
            <tr class="text-left border-b-2 border-gray-300">
                <th class="px-4 py-3">Date</th>
                <th class="px-4 py-3">check-in</th>
                <th class="px-4 py-3">check-out</th>
                <th class="px-4 py-3">in-status</th>
                <th class="px-4 py-3">out-status</th>
  

            </tr>
        </thead>
    <tbody>

    ';
    if ($result->num_rows > 0) {


        while ($row = $result->fetch_assoc()) {
            $instatuText = "";
            $outstatusText = "";
            if ($row['instatus'] == -1) {
                $instatusText = "Pending";
            } else if ($row['instatus'] == 0) {
                $instatusText = 'Rejected';
            } else {
                $instatusText = 'Approved';
            }

            if ($row['outstatus'] == -1) {
                $outstatusText = "Pending";
            } else if ($row['outstatus'] == 0) {
                $outstatusText = 'Rejected';
            } else {
                $outstatusText = 'Approved';
            }
            $contentString .= '<tr class="text-left border-b-2 border-gray-300">';
            $contentString .= '<td class="px-4 py-3">' . $row['date'] . '</td>';
            $contentString .=  '<td class="px-4 py-3">' . $row['checkin'] . '</td>';

            $contentString .=  '<td class="px-4 py-3">' . $row['checkout'] . '</td>';

            $contentString .=  '<td class="px-4 py-3">' . $instatusText . '</td>';

            $contentString .=  '<td class="px-4 py-3">' . $outstatusText . '</td>';
            $contentString .=  '</tr>';
        }
        $contentString .= '</tbody>';
    }


    function getMaxPageNo($conn)
    {
        global $uid;

        $sql = "Select Count(*) As Total From Attendance where uid = {$uid}";


        $result = $conn->query($sql);

        $total = 0;
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $total = $row['Total'];
            }
        }


        return $total;
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