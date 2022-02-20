<!-- <div id="directory-model" class="hidden z-20 w-full h-full fixed">

    <div class="fixed z-30 border  left-90">
        <div class="w-1/2 justify-center bg-white ">
            <p class="uppercase font-bold text-lg text-grey-darkest control-label">Employee Directory</p>

            <span>
                <p class="inline-block uppercase font-bold text-sm text-grey-darkest control-label">Search Employee</p>
                <input type="text" placeholder="Search By Code,Name,Email">
            </span>

            <span>
                <label for="Select Employee uppercase font-bold text-sm text-grey-darkest control-label">Pick
                    Employee</label>
                <select class="w-8/12 border py-2 px-3 text-grey-darkest form-control bg-white" name="select-employee"
                    id="select-employee" required>

                    <?php

                    $sql = 'Select * from Role';
                    $query = $conn->query($sql);
                    while ($row = $query->fetch_assoc()) {
                        echo "<option value='" . $row['id'] . "'>" . $row['role'] . "(" . $row['id'] . ")" . "</option>";
                    }
                    ?>
                </select>
            </span>
        </div>
    </div>

    <div class="fixed pin overflow-auto bg-opacity-25 bg-gray-100 w-full h-full">
    </div>

</div> -->


<div id="directory-model"
    class="modal opacity-0 pointer-events-none fixed w-full h-full top-0 left-0 flex items-center justify-center z-20">
    <div class="modal-overlay absolute w-full h-full bg-gray-900 opacity-50"></div>

    <div class="modal-container bg-white w-8/12  mx-auto rounded shadow-lg z-50 overflow-y-auto">

        <div
            class="modal-close absolute top-0 right-0 cursor-pointer flex flex-col items-center mt-4 mr-4 text-white text-sm z-50">
            <svg class="fill-current text-white" xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                viewBox="0 0 18 18">
                <path
                    d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z">
                </path>
            </svg>
            <span class="text-sm">(Esc)</span>
        </div>

        <div class="modal-content py-4 text-left px-6">
            <!--Title-->
            <div class="flex justify-between items-center pb-3">
                <p class="text-2xl font-bold">Employee Direcotry!</p>
                <div class="modal-close cursor-pointer z-50">
                    <svg class="fill-current text-black" xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                        viewBox="0 0 18 18">
                        <path
                            d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z">
                        </path>
                    </svg>
                </div>
            </div>

            <!--Body-->
            <div>
                <p class="inline-block uppercase font-bold text-sm text-grey-darkest control-label">Search Employee</p>
                <input oninput="searchEmployee()" id="search-employee" type="text"
                    placeholder="Search By Code,Name,Email"
                    class="w-10/12 border border-gray-500 py-2 px-3 text-grey-darkest">
            </div>
            <div class="mt-2">
                <label for="Select-Employee" class="uppercase font-bold text-sm text-grey-darkest control-label">Pick
                    Employee</label>
                <select class="w-8/12 border border-gray-500 py-2 px-3 text-grey-darkest form-control bg-white"
                    name="select-employee" id="select-employee" required>

                </select>
                <button id="get-detail-btn"
                    class="px-4 bg-transparent p-3 rounded-lg text-indigo-500 hover:bg-gray-100 hover:text-indigo-400 mr-2">Details</button>
            </div>


            <div id="details-model" class="grid grid-cols-2 hidden">
                <div>
                    <label for="name">Name</label>
                    <p id="employee-name" class="text-indigo-500">Name will be shown here</p>
                </div>
                <div>
                    <label for="name">Email</label>
                    <p id="employee-email" class="text-indigo-500">Email will be shown here</p>
                </div>
                <div>
                    <label for="name">Mobile</label>
                    <p id="employee-mobile" class="text-indigo-500">Mobile</p>
                </div>
                <div>
                    <label for="name">Date Of Joining</label>
                    <p id="employee-date" class="text-indigo-500">Mobile</p>
                </div>

            </div>


            <!--Footer-->
            <div class="flex justify-end pt-2">
                <!-- <button
                    class="px-4 bg-transparent p-3 rounded-lg text-indigo-500 hover:bg-gray-100 hover:text-indigo-400 mr-2">Action</button> -->
                <button
                    class="modal-close cursor-pointer px-4 bg-indigo-500 p-3 rounded-lg text-white hover:bg-indigo-400">Close</button>
            </div>

        </div>
    </div>
</div>
<script type="text/javascript" src="employee_directory_script.js"></script>