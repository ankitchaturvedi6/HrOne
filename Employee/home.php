<div id="employee-div">
    <div class="border bg-white p-4 m-4">
        <p class="uppercase font-bold text-xl text-grey-darkest">Add New Employee</p>
        <button id="add-employee-btn"
            class="w-1/12 border bg-green-200 hover:bg-teal-dark  uppercase text-lg p-2 rounded">Add</button>


    </div>


    <div class="border bg-white mt-8 m-4 p-2">
        <p class="uppercase font-bold text-xl text-grey-darkest">All Employees Details</p>


        <div id="table-div" class="border mt-5">
            <table id="con-table" class="rounded-t-lg w-full bg-gray-200 text-gray-800">

            </table>
        </div>


    </div>

    <input type="hidden" id="page-url" value="backend/employee/employee_pagination.php">

</div>
<div id="add-employee" class="hidden">
    <?php include("employee_model.php") ?>
</div>

<table class="table-page-no border-b-2 border-gray-300 ml-2 cursor-pointer absolute right-10 mb-4">
    <tr class="bg-green-100">
        <th id="page-prev" style="display:none" onclick="pagePrev()">prev</th>
        <th class="selected-page px-4 py-3 border" style="display:none" id="page-1" onclick="pageFirst()">1</th>
        <th id="page-2" class="px-4 py-3 border" style="display:none" onclick="pageSecond()">2</th>
        <th id="page-3" class="px-4 py-3 border" style="display:none" onclick="pageThird()">3</th>
        <th id="page-next" class="px-4 py-3 border" style="display:none" onclick="pageNext()">Next</th>
    </tr>
</table>


<script>
// getresult("Pagination/getresult.php");

const empDivEl = document.getElementById('employee-div');
const addEmployeeBtn = document.getElementById('add-employee-btn');
const cancelEl = document.getElementById('cancel-btn');
const showEmployeeModel = function() {
    // alert('clicked')
    document.querySelector('.table-page-no').classList.add('hidden');
    empDivEl.classList.add("hidden");
    const ele = document.getElementById('add-employee');
    ele.classList.remove('hidden');


}

const removeEmployeeModel = function() {
    empDivEl.classList.remove('hidden');
    document.querySelector('.table-page-no').classList.remove('hidden');

    ele = document.getElementById('add-employee');
    ele.classList.add('hidden');

}
cancelEl.addEventListener('click', removeEmployeeModel);

addEmployeeBtn.addEventListener('click', showEmployeeModel);
</script>

<!-- script to add new employee -->

<script type="text/javascript">
const addEmpBtn = document.getElementById('add-emp-btn');



function validateInputFields(name, fatherName, address, mobile) {
    const numrRegex = /^[0-9]+$/i;
    const alphaRegex = /^[a-z]+$/i;
    const alphaNumeric = /^[a-z0-9]+$/i;

    console.log('p')

    if (!name || !address || !fatherName || !mobile) return false

    console.log('q')

    // if (!name.match(alphaRegex) || !fatherName.match(alphaRegex)) return false;

    console.log('r')

    if (!mobile.match(numrRegex)) return false;

    return true;

}



const addEmployee = function() {
    const name = document.getElementById('name').value;
    const fatherName = document.getElementById('fathername').value;
    const address = document.getElementById('address').value;
    const mobile = document.getElementById('mobile').value;
    const dob = document.getElementById('dob').value;
    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;
    const gender = document.getElementById('gender').value;
    const position = document.getElementById('position').value;
    const manager = document.getElementById('manager').value;
    const role = document.getElementById('role').value;

    console.log(`gender ${gender}`);
    const isValid = validateInputFields(name, fatherName, address, mobile)
    if (isValid) {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                alert(this.responseText);
            }
        };
        xmlhttp.open("POST", "backend/employee/add.php", true);
        xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        const sendData =
            `name=${name}&father=${fatherName}&address=${address}
        &mobile=${mobile}&dob=${dob}&email=${email}&password=${password}&gender=${gender}&position=${position}&manager=${manager}&role=${role}`;
        xmlhttp.send(sendData);





    } else {
        alert("Fill Correct Details");
    }
}




addEmpBtn.addEventListener('click', addEmployee);
</script>


<script type="text/javascript" src="backend/employee/pagination_control.js"></script>