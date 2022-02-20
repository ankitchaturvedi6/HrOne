'use strict'
const searchEmplElem = document.getElementById('search-employee');

function searchEmployee() {
    const value = searchEmplElem.value;

    if (value && value.length > 0) {
        let xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById('select-employee').innerHTML = this.responseText;
            }
        };
        xmlhttp.open("POST", "backend/EmployeeDirectory/search.php", true);
        xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xmlhttp.send(`value=${value}`);

    } else {
        document.getElementById('select-employee').innerHTML = "";

    }
}

const getDetailsBtn = document.getElementById('get-detail-btn');

getDetailsBtn.addEventListener('click', function () {
    const selectedElm = document.getElementById('select-employee');

    if (selectedElm.value) {
        const value = selectedElm.value;
        let xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                const jsonContent = JSON.parse(this.responseText);
                document.getElementById('employee-name').textContent = jsonContent.name;
                document.getElementById('employee-email').textContent = jsonContent.email;
                document.getElementById('employee-mobile').textContent = jsonContent.mobile;
                document.getElementById('employee-date').textContent = jsonContent.date;

                document.getElementById('details-model').classList.remove('hidden');

            }
        };
        xmlhttp.open("POST", "backend/EmployeeDirectory/getemployee.php", true);
        xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xmlhttp.send(`value=${value}`);
    }
})