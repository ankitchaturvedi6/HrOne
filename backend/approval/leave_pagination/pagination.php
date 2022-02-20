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
    $sql = "SELECT Leave_Types.type,Leaves.* From Leaves INNER JOIN Leave_Types ON Leave_Types.id = Leaves.leaveid and Leaves.status = -1 and  Leaves.uid IN (Select id FROM Employee WHERE reportingmanager = {$uid}) Limit {$offsetValue},{$noOfRow}";
    $result = $conn->query($sql);
    // $nameResult = $conn->query($nameSql);
    $contentString = '
    <thead>
            <tr class="text-left border-b-2 border-gray-300">
            <th class="px-4 py-3"><input type="checkbox" class="select-all"></th>
            <th class="px-4 py-3">Name</th>
                <th class="px-4 py-3">start-date</th>
                <th class="px-4 py-3">end-date</th>
                <th class="px-4 py-3">type</th>
                <th class="px-4 py-3">request-date</th>
                <th class="px-4 py-3">reason</th>

            </tr>
        </thead>
    <tbody>

    ';
    $cnt = 0;
    if ($result->num_rows > 0) {

        while ($row = $result->fetch_assoc()) {
            ++$cnt;
            $contentString .= '<tr>';

            $contentString .= '<td class="px-4 py-3">' . '<input type="checkbox" id="' . $row['uid'] . '" class="select" >' . '</td>';

            $contentString .= '<td class="px-4 py-3">' . $row['name'] . '</td>';


            $contentString .= '<td class="px-4 py-3">' . $row['startdate'] . '</td>';

            $contentString .=  '<td class="px-4 py-3">' . $row['enddate'] . '</td>';

            $contentString .=  '<td class="px-4 py-3">' . $row['type'] . '</td>';

            $contentString .=  '<td class="px-4 py-3">' . $row['requestdate'] . '</td>';

            $contentString .=  '<td class="px-4 py-3">' . $row['reason'] . '</td>';

            $contentString .=  '</tr>';
        }
        $contentString .= '</tbody>';
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