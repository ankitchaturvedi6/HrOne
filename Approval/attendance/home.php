<div id="Request-att-nav-bar" class="mx-2">

    <ul class="mt-2">
        <li id="att-item" class="inline-block cursor-pointer border p-2">Attendance</li>
        <li id="check-in-rq-item" class="inline-block cursor-pointer border p-2">Check-in Request</li>
    </ul>


    <input type="hidden" id="page-url" value="backend/approval/attendance_pagination/pagination.php">


    <div id="table-div" class="border mt-5">
        <table class="rounded-t-lg w-full bg-gray-200 text-gray-800">
            <thead id="att-heading">
                <tr class="text-left border-b-2 border-gray-300">
                    <th class="px-4 py-3"><input type="checkbox" class="select-all all-checkbox"></th>
                    <th class="px-4 py-3">Name</th>
                    <th class="px-4 py-3">Date</th>
                    <th class="px-4 py-3">Reason</th>
                    <th class="px-4 py-3">Request-in</th>
                    <th class="px-4 py-3">Request-out</th>
                    <!-- <th class="px-4 py-3">status</th> -->
                    <th class="px-4 py-3">Remarks</th>

                </tr>
            </thead>
            <thead class="hidden" id="check-in-heading">
                <tr class="text-left border-b-2 border-gray-300">
                    <th class="px-4 py-3"><input type="checkbox" class="select-all all-checkbox"></th>
                    <th class="px-4 py-3">Name</th>
                    <th class="px-4 py-3">Date</th>
                    <th class="px-4 py-3">check-in</th>
                    <th class="px-4 py-3">check-out</th>
                </tr>
            </thead>

            <tbody id="con-table">

            </tbody>
        </table>
    </div>





</div>



<script type="text/javascript" src="backend/request/pagination_control.js"></script>


<script type="text/javascript">
const contAttEl = document.getElementById('att-item');
const contCheckInEl = document.getElementById('check-in-rq-item');
const attHeadingEl = document.getElementById('att-heading');
const checkInHeadingEl = document.getElementById('check-in-heading');

let selectedNav = null;

function toggleHeadings() {
    attHeadingEl.classList.toggle('hidden');
    checkInHeadingEl.classList.toggle('hidden');

}


const showAttendance = function() {
    toggleHeadings();
    selectedNav = contAttEl;
    console.log('attendance');
    document.getElementById('table-div').classList.remove('hidden');
    const content = document.querySelectorAll('.main-content');
    for (let i = 0; i < content.length; i++) {
        content[i].classList.add('hidden');
    }
    const urlElem = document.getElementById('page-url');
    urlElem.value = "backend/approval/attendance_pagination/pagination.php";
    fetchData(1);
}
contAttEl.addEventListener('click', showAttendance)

contCheckInEl.addEventListener('click', function() {
    toggleHeadings();
    selectedNav = contCheckInEl;
    document.getElementById('table-div').classList.remove('hidden');
    const content = document.querySelectorAll('.main-content');
    for (let i = 0; i < content.length; i++) {
        content[i].classList.add('hidden');
    }
    const urlElem = document.getElementById('page-url');
    urlElem.value = "backend/approval/check_in_request_pagination/pagination.php";
    fetchData(1);
})
</script>



<table class="table-page-no border-b-2 border-gray-300 mt-2 ml-2 cursor-pointer">
    <tr class="bg-green-100">
        <th id="page-prev" style="display:none" onclick="pagePrev()">prev</th>
        <th class="selected-page px-4 py-3 border" style="display:none" id="page-1" onclick="pageFirst()">1</th>
        <th id="page-2" class="px-4 py-3 border" style="display:none" onclick="pageSecond()">2</th>
        <th id="page-3" class="px-4 py-3 border" style="display:none" onclick="pageThird()">3</th>
        <th id="page-next" class="px-4 py-3 border" style="display:none" onclick="pageNext()">Next</th>
    </tr>
</table>
<div class="absolute right-10">
    <button class="bg-green-100 p-2" id="Approve-Atte">Approve</button>
    <button class="bg-green-100 p-2" id="Reject-Atte">Reject</button>

</div>

<script type="text/javascript">
const appAtt = document.getElementById('Approve-Atte');
const rejectAtt = document.getElementById('Reject-Atte');
const selectAll = document.querySelectorAll('.all-checkbox');

console.log(selectAll);
for (let i = 0; i < selectAll.length; i++) {
    selectAll[i].addEventListener('click', function() {
        const checkItems = document.querySelectorAll('.select');
        console.log('here');
        if (selectAll[i].checked) {
            for (let i = 0; i < checkItems.length; i++) {
                checkItems[i].checked = true;
            }
        } else {
            for (let i = 0; i < checkItems.length; i++) {
                checkItems[i].checked = false;
            }
        }

    })
}


function approveAttendanceRequest(array) {
    let xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            console.log(`this_>${this.responseText}`);
            fetchData(1);
        }
    };
    if (selectedNav == contAttEl)
        xmlhttp.open("POST", "backend/approval/attendance_approval/approve.php", true);
    else if (selectedNav = contCheckInEl)
        xmlhttp.open("POST", "backend/approval/check_in_approval/approve.php", true);

    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send(`users-id=${array}`);

}

function rejectAttendanceRequest(array) {
    let xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            console.log(`this_>${this.responseText}`);
            fetchData(1);
        }
    };
    if (selectedNav == contAttEl)
        xmlhttp.open("POST", "backend/approval/attendance_approval/reject.php", true);
    else if (selectedNav = contCheckInEl)
        xmlhttp.open("POST", "backend/approval/check_in_approval/reject.php", true);

    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send(`users-id=${array}`);



}


appAtt.addEventListener('click', function() {
    const checkItems = document.querySelectorAll('.select');
    const checkedArray = [];
    for (let i = 0; i < checkItems.length; i++) {
        if (checkItems[i].checked) {
            checkedArray.push(checkItems[i].id);
        }
    }
    console.log(checkedArray);
    if (checkedArray.length !== 0) {
        //approve the selected attendace
        approveAttendanceRequest(checkedArray);

    }
})


rejectAtt.addEventListener('click', function() {
    const checkItems = document.querySelectorAll('.select');
    const checkedArray = [];
    for (let i = 0; i < checkItems.length; i++) {
        if (checkItems[i].checked) {
            checkedArray.push(checkItems[i].id);
        }
    }

    if (checkedArray.length !== 0) {
        //reject the selected attendance
        console.log(`reject array->${checkedArray}`);
        rejectAttendanceRequest(checkedArray);
    }

})
</script>