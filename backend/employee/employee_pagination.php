<?php
session_start();
// include('connection.php');
include('../../connection.php');

if ($_SERVER["REQUEST_METHOD"] == 'GET') {
    $uid = $_SESSION['uid'];
    $pageNo = $_GET['Page'];
    $noOfRow = $_GET['Row'];
    $perfomr = $_GET['Perform'];
    $offsetValue = ($pageNo - 1) * ($noOfRow);

    $sql = 'Select * From Employee LIMIT ?,?';

    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ss', $offsetValue, $noOfRow);
    $stmt->execute();
    $result = $stmt->get_result();

    $contentString = '
    <thead>
            <tr class="text-left border-b-2 border-gray-300">
                <th class="px-4 py-3">Name</th>
                <th class="px-4 py-3">Email</th>
                <th class="px-4 py-3">Mobile-No</th>
                <th class="px-4 py-3">Joining-Date</th>
                <th class="px-4 py-3">Reporting Manager</th>
                <th class="px-4 py-3">Position</th>
                <th class="px-4 py-3">Role</th>

            </tr>
        </thead>
    <tbody>

    ';


    $cnt = 0;
    if ($result->num_rows > 0) {


        while ($row = $result->fetch_assoc()) {
            ++$cnt;

            $contentString .= '<tr>';

            $contentString .= '<td class="px-4 py-3">' . $row['name'] . '</td>';

            $contentString .=  '<td class="px-4 py-3">' . $row['email'] . '</td>';

            $contentString .=  '<td class="px-4 py-3">' . $row['mobileno'] . '</td>';

            $contentString .=  '<td class="px-4 py-3">' . $row['dateofjoining'] . '</td>';

            $contentString .=  '<td class="px-4 py-3">' . $row['reportingmanager'] . '</td>';

            $contentString .=  '<td class="px-4 py-3">' . $row['position-id'] . '</td>';

            $contentString .=  '<td class="px-4 py-3">' . $row['roleid'] . '</td>';

            $contentString .=  '</tr>';
        }
        $contentString .= '</tbody>';
    }

    function getMaxPageNo($conn, $uid)
    {
        $total = 0;
        $sql = "Select count(*) As Total From Employee";
        $result = $conn->query($sql);
        $row  = $result->fetch_assoc();
        $total = $row['Total'];

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