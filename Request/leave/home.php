<div id="Request-att-nav-bar">

    <ul>
        <li id="leave-nav" class="uppercase font-bold text-lg text-grey-darkest cursor-pointer home-content ml-5 mt-2">
            Leave</li>
        <!-- <li id="check-in-rq-item" class="inline-block cursor-pointer">Check-in Request</li> -->
    </ul>

    <div id="content-leave" class="nav-selected-content main-content home-content m-5">
        <div class="border mt-6 p-4 ">
            <p class="mb-2 uppercase font-bold text-lg text-grey-darkest">Apply For A Leave</p>
            <button id="apply-new-leave" class="bg-green-400 p-2">Apply New</button>
        </div>
    </div>


    <div id="content-correction" class="hidden">
        <div class="border m-5">

            <div class="p-2 m-2">

                <span>
                    <label for="type" class="mb-2 uppercase font-bold text-lg text-grey-darkest">Select Leave
                        Type</label><br>
                    <select name="leave-type" id="leave-type" class="border py-2 px-3 text-grey-darkest bg-white"
                        required>

                        <?php

                        $sql = 'Select id,type from Leave_Types';
                        $query = $conn->query($sql);
                        while ($row = $query->fetch_assoc()) {
                            echo "<option value='" . $row['id'] . "'>" . $row['type'] . "</option>";
                        }
                        ?>
                    </select>
                </span>
            </div>
            <div class="p-2 m-2">
                <label for="dates" class="mb-2 uppercase font-bold text-lg text-grey-darkest">Pick Dates
                    Range</label><br>
                <input type="date" id="start-date" placeholder="start" class="border py-2 px-3 text-grey-darkest"><span
                    class="m-2 uppercase text-md text-grey-darkest">To</span>
                <input type="date" id="end-date" placeholder="end" class="border py-2 px-3 text-grey-darkest">
            </div>





            <div class="p-2 m-2">
                <label for="remarks" class="mb-2 uppercase font-bold text-lg text-grey-darkest ">Reason</label>
                <br>
                <input class="w-1/3 border py-2 px-3 text-grey-darkest" type="text" name="remarks" id="remarks">
            </div>
            <div class="p-2 m-2">
                <button id="cancel-apply"
                    class="border bg-green-300 hover:bg-teal-dark  uppercase text-lg p-2 rounded">cancel</button>
                <button id="submit-apply"
                    class="border bg-green-300 hover:bg-teal-dark  uppercase text-lg p-2 rounded">apply</button>
            </div>
        </div>
    </div>
    <input type="hidden" id="page-url" value="backend/request/leave_pagination/pagination.php">


    <div id="table-div" class="m-5 home-content">
        <table id="con-table" class="rounded-t-lg w-full bg-gray-200 text-gray-800">

        </table>
    </div>



</div>




<table class="table-page-no  mt-2 ml-2 cursor-pointer absolute right-10">
    <tr class="bg-green-400">
        <th id="page-prev" style="display:none" onclick="pagePrev()">prev</th>
        <th class="selected-page px-4 py-3 border" style="display:none" id="page-1" onclick="pageFirst()">1</th>
        <th id="page-2" class="px-4 py-3 border" style="display:none" onclick="pageSecond()">2</th>
        <th id="page-3" class="px-4 py-3 border" style="display:none" onclick="pageThird()">3</th>
        <th id="page-next" class="px-4 py-3 border" style="display:none" onclick="pageNext()">Next</th>
    </tr>
</table>
<script type="text/javascript">
const leavNavEl = document.getElementById('leave-nav');
const applyBtn = document.getElementById('apply-new-leave');
const contCorrEl = document.getElementById('content-correction');
const tableContEl = document.getElementById('table-div');
const homeContEl = document.querySelectorAll('.home-content')

const cancelBtn = document.getElementById('cancel-apply');
const submitBtn = document.getElementById('submit-apply');


function submitLeaveAjaxRequest(leaveType, startDate, endDate, remarks) {
    let xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            alert(this.responseText);
            for (let i = 0; i < homeContEl.length; i++) {
                homeContEl[i].classList.remove('hidden');
            }
            contCorrEl.classList.add('hidden');
        }
    };
    xmlhttp.open("POST", "backend/request/leave_request.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    const sendData = `type=${leaveType}&sdate=${startDate}
    &edate=${endDate}&remarks=${remarks}`;
    xmlhttp.send(sendData);
}


//submit the leave request
submitBtn.addEventListener('click', function() {
    const leaveType = document.getElementById('leave-type').value;
    const startDate = document.getElementById('start-date').value;
    const endDate = document.getElementById('end-date').value;
    const remarks = document.getElementById('remarks').value;


    if (!leaveType || !startDate || !endDate || !remarks || remarks.length < 4) {
        alert('Please Fill Correct Details');
    } else {
        submitLeaveAjaxRequest(leaveType, startDate, endDate, remarks);
    }

})


applyBtn.addEventListener('click', function() {

    for (let i = 0; i < homeContEl.length; i++) {
        homeContEl[i].classList.add('hidden');
    }
    contCorrEl.classList.remove('hidden');

})


cancelBtn.addEventListener('click', function() {
    for (let i = 0; i < homeContEl.length; i++) {
        homeContEl[i].classList.remove('hidden');
    }
    contCorrEl.classList.add('hidden');
})
</script>

<script type="text/javascript" src="backend/request/pagination_control.js"></script>