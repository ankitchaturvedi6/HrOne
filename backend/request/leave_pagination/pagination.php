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

    $sql = "Select Leaves.*,Leave_Types.type From Leaves INNER Join Leave_Types ON Leaves.leaveid = Leave_Types.id and Leaves.uid = {$uid} LIMIT {$offsetValue},{$noOfRow}";

    $result = $conn->query($sql);
    $contentString = '
    <thead>
            <tr class="text-left border-b-2 border-gray-300">
                <th class="px-4 py-3">type</th>
                <th class="px-4 py-3">start-date</th>
                <th class="px-4 py-3">end-date</th>
                <th class="px-4 py-3">status</th>
                <th class="px-4 py-3">request date</th>
                <th class="px-4 py-3">reason</th>

            </tr>
        </thead>
    <tbody>

    ';
    $cnt = 0;
    if ($result->num_rows > 0) {


        while ($row = $result->fetch_assoc()) {
            ++$cnt;
            $statusText = "";
            if ($row['status'] == -1) {
                $statusText = "Pending";
            } else if ($row['status'] == 0) {
                $statusText = 'Rejected';
            } else {
                $statusText = 'Approved';
            }


            $contentString .= '<tr>';

            $contentString .= '<td class="px-4 py-3">' . $row['type'] . '</td>';

            $contentString .=  '<td class="px-4 py-3">' . $row['startdate'] . '</td>';

            $contentString .=  '<td class="px-4 py-3">' . $row['enddate'] . '</td>';

            $contentString .=  '<td class="px-4 py-3">' . $statusText . '</td>';

            $contentString .=  '<td class="px-4 py-3">' . $row['requestdate'] . '</td>';

            $contentString .=  '<td class="px-4 py-3">' . $row['reason'] . '</td>';

            $contentString .=  '</tr>';
        }
        $contentString .= '</tbody>';
    }

    function getMaxPageNo($conn)
    {
        global $uid;
        $sql = "Select Count(*) As Total From Leaves where uid ='{$uid}'";


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