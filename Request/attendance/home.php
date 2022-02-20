<div id="Request-att-nav-bar">

    <ul class="m-5">
        <li id="att-item"
            class="uppercase font-bold text-lg text-grey-darkest inline-block cursor-pointer border border-gray-200 p-2 m-2">
            Attendance
        </li>
        <li id="check-in-rq-item"
            class="uppercase font-bold text-lg text-grey-darkest inline-block cursor-pointer border border-gray-200 p-2 m-2">
            Check-in Request</li>
    </ul>

    <div id="content-attendance" class="m-5 nav-selected-content main-content">
        <div class="border mt-6 p-4 ">
            <p class="uppercase font-bold text-lg text-grey-darkest">Apply Attendance Correction</p>
            <button id="apply-new-corr" class="bg-green-400 p-2 mt-2">Apply New</button>
        </div>
    </div>


    <div id="content-correction" class="m-5 main-content hidden">
        <div class="border">
            <div class="p-2 m-2 ">
                <label for="CorrectionDate" class="uppercase font-bold text-lg text-grey-darkest">Attendance
                    Date</label><br>
                <input type="date" class="border py-2 px-3 text-grey-darkest" name="CorrectionDate" id="CorrectionDate">
            </div>

            <div class="p-2 m-2 ">
                <label for="Reason" class="uppercase font-bold text-lg text-grey-darkest">Reason</label>
                <br>
                <span>
                    <label for="In">Forgot Check-In</label>
                    <input class="border py-2 px-3 text-grey-darkest radio-btn" type="radio" name="fg-in"
                        id="forgot-in">
                    <label for="In">Forgot Check-Out</label>
                    <input class="border py-2 px-3 text-grey-darkest radio-btn" type="radio" name="fg-out"
                        id="forgot-out">
                    <label for="In">Forgot Both</label>
                    <input class="border py-2 px-3 text-grey-darkest radio-btn" type="radio" name="fg-both"
                        id="forgot-both">
                </span>
            </div>

            <div class="p-2 m-2 ">
                <span>
                    <label for="check-in" class="uppercase font-bold text-lg text-grey-darkest">Check In</label>
                    <input class="form-input border py-2 px-3 text-grey-darkest " type="time" name="in-time"
                        id="check-in-time">
                    <label for="check-out" class="uppercase font-bold text-lg text-grey-darkest">Check Out</label>
                    <input class="border py-2 px-3 text-grey-darkest" type="time" name="out-time" id="check-out-time">
                </span>
            </div>
            <div class="p-2 m-2 ">
                <label for="remarks" class="uppercase font-bold text-lg text-grey-darkest">Remarks</label><br>
                <input class="border py-2 px-3 text-grey-darkest" type="text" name="remarks" id="remarks">
            </div>
            <div class="p-2 m-2 ">
                <button id="cancel-apply"
                    class="border bg-green-300 hover:bg-teal-dark  uppercase text-lg p-2 rounded">cancel</button>
                <button id="submit-apply"
                    class="border bg-green-300 hover:bg-teal-dark  uppercase text-lg p-2 rounded">apply</button>
            </div>
        </div>
    </div>
    <input type="hidden" id="page-url" value="backend/request/attendance_pagination/pagination.php">


    <div id="table-div" class="border m-5">
        <table id="con-table" class="rounded-t-lg w-full bg-gray-200 text-gray-800">

        </table>
    </div>



</div>






<script type="text/javascript">
const contAttEl = document.getElementById('att-item');
const contCheckInEl = document.getElementById('check-in-rq-item');
const contCorrEl = document.getElementById('content-correction');
const applyCorrBtn = document.getElementById('apply-new-corr');

const showAttendance = function() {
    // console.log('attendance');
    document.querySelector('.table-page-no').classList.remove('hidden');
    document.getElementById('table-div').classList.remove('hidden');
    const content = document.querySelectorAll('.main-content');
    for (let i = 0; i < content.length; i++) {
        content[i].classList.add('hidden');
    }
    document.getElementById('content-attendance').classList.remove('hidden');
    const urlElem = document.getElementById('page-url');
    urlElem.value = "backend/request/attendance_pagination/pagination.php";
    fetchData(1);
}
contAttEl.addEventListener('click', showAttendance)

contCheckInEl.addEventListener('click', function() {
    document.getElementById('table-div').classList.remove('hidden');
    const content = document.querySelectorAll('.main-content');
    for (let i = 0; i < content.length; i++) {
        content[i].classList.add('hidden');
    }
    const urlElem = document.getElementById('page-url');
    urlElem.value = "backend/request/check_in_request_pagination/pagination.php";
    fetchData(1);
})

applyCorrBtn.addEventListener('click', function() {
    document.getElementById('table-div').classList.add('hidden');
    document.querySelector('.table-page-no').classList.add('hidden');

    const content = document.querySelectorAll('.main-content');
    for (let i = 0; i < content.length; i++) {
        content[i].classList.add('hidden');
    }
    contCorrEl.classList.remove('hidden');
})

const applyBtn = document.getElementById('submit-apply');
const cancelApplyBtn = document.getElementById('cancel-apply');

cancelApplyBtn.addEventListener('click', showAttendance)


applyBtn.addEventListener('click', function() {
    const corrDate = document.getElementById('CorrectionDate').value;
    const inTime = document.getElementById('check-in-time').value;
    const outTime = document.getElementById('check-out-time').value;
    const isForgotIn = document.getElementById('forgot-in').checked;
    const isForgotOut = document.getElementById('forgot-out').checked;
    const isForgotBoth = document.getElementById('forgot-both').checked;
    const remarks = document.getElementById('remarks').value;

    let flag = -1;

    if (isForgotIn) {
        if (!inTime) alert("select in time");
        else if (!corrDate) alert("select date");
        else flag = 0;
    } else if (isForgotOut) {
        if (!outTime) alert('select out time');
        else if (!corrDate) alert('select date');
        else flag = 1;
    } else if (isForgotBoth) {
        if (!outTime || !inTime) alert("select time");
        else if (!corrDate) alert('select date');
        else flag = 2;
    }

    if (flag === -1) alert("pick reason");
    else {


        console.log(`inTime=${inTime}&outTime=${outTime}&date=${corrDate}&reason=${flag}`)
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                showAttendance();
            }
        };
        xmlhttp.open("POST", "backend/request/attendance_correction.php", true);
        xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

        xmlhttp.send(
            `inTime=${inTime}&outTime=${outTime}&date=${corrDate}&reason=${flag}&remarks=${remarks}`);
    }


})

const inRadioBtn = document.getElementById('forgot-in');
const outRadioBtn = document.getElementById('forgot-out');
const bothRadioBtn = document.getElementById('forgot-both');

inRadioBtn.addEventListener('click', function() {
    const allRadioBtn = document.querySelectorAll('.radio-btn');
    for (let i = 0; i < allRadioBtn.length; i++) {
        allRadioBtn[i].checked = false;
    }
    inRadioBtn.checked = true;

})
outRadioBtn.addEventListener('click', function() {
    const allRadioBtn = document.querySelectorAll('.radio-btn');
    for (let i = 0; i < allRadioBtn.length; i++) {
        allRadioBtn[i].checked = false;
    }
    outRadioBtn.checked = true;
})
bothRadioBtn.addEventListener('click', function() {
    const allRadioBtn = document.querySelectorAll('.radio-btn');
    for (let i = 0; i < allRadioBtn.length; i++) {
        allRadioBtn[i].checked = false;
    }
    bothRadioBtn.checked = true;
})
</script>
<table class="table-page-no border-b-2 border-gray-300 mt-2 ml-2 cursor-pointer absolute right-5">
    <tr class="bg-green-100">
        <th id="page-prev" style="display:none" onclick="pagePrev()">prev</th>
        <th class="selected-page px-4 py-3 border" style="display:none" id="page-1" onclick="pageFirst()">1</th>
        <th id="page-2" class="px-4 py-3 border" style="display:none" onclick="pageSecond()">2</th>
        <th id="page-3" class="px-4 py-3 border" style="display:none" onclick="pageThird()">3</th>
        <th id="page-next" class="px-4 py-3 border" style="display:none" onclick="pageNext()">Next</th>
    </tr>
</table>
<script type="text/javascript" src="backend/request/pagination_control.js"></script>