<div class="">


    <label for="PersonalInfo" class="uppercase font-bold text-xl text-grey-darkest m-5"> Personal
        Information</label>
    <div class="grid grid-cols-3 border m-5 p-4">
        <div class="Form-Group">
            <label for="name" class="uppercase font-bold text-lg text-grey-darkest">Full name</label>
            <br>
            <input type="text" id="name" name="name" class=" border py-2 px-3 text-grey-darkest" required>
        </div>



        <div class="Form-Group">
            <label for="fathername" class="uppercase font-bold text-lg text-grey-darkest" require>FatherName</label>
            <br>
            <input type="text" id="fathername" name="fathername" class="border py-2 px-3 text-grey-darkest">
        </div>

        <div class="Form-Group">
            <label for="Address" class="uppercase font-bold text-lg text-grey-darkest">Address</label>
            <br>
            <textarea id='address' name="address" class="border py-2 px-3 text-grey-darkest" required>

            </textarea>
        </div>

        <div class="Form-Group">
            <label for="Contact Info" class="uppercase font-bold text-lg text-grey-darkest">Contact Info</label>
            <br>
            <input type="number" maxlength="10" id='mobile' name="mobile" class="border py-2 px-3 text-grey-darkest"
                required>
        </div>

        <div class="Form-Group">
            <label for="Contact Info" class="uppercase font-bold text-lg text-grey-darkest">D.O.B</label>
            <br>
            <input id="dob" name="dob" type="date" class="border py-2 px-3 text-grey-darkest" required>
        </div>
        <div class="Form-Group">
            <label for="Contact Info" class="uppercase font-bold text-lg text-grey-darkest">Email</label>
            <br>
            <input type="email" id="email" name="email" class="border py-2 px-3 text-grey-darkest" required>
        </div>
        <div class="Form-Group">
            <label for="Contact Info" class="uppercase font-bold text-lg text-grey-darkest">Password</label>
            <br>
            <input id="password" name="password" class="border py-2 px-3 text-grey-darkest" required>
        </div>
        <div class="form-group">
            <label for="gender" class="uppercase font-bold text-lg text-grey-darkest">Gender</label>

            <div>
                <select class="bg-white border py-2 px-3 text-grey-darkest form-control" name="gender" id="gender"
                    required>

                    <option value="Male" selected>Male</option>
                    <option value="Female">Female</option>
                </select>
            </div>
        </div>
    </div>


    <label for="professional info" class="uppercase font-bold text-xl text-grey-darkest m-5">Professional Info</label>
    <div class="grid grid-cols-3 border m-5 p-4">
        <div class="form-group">
            <label for="position" class="uppercase font-bold text-lg text-grey-darkest control-label">Position</label>

            <div class="col-sm-9">
                <select class="w-8/12 bg-white border py-2 px-3 text-grey-darkest form-control" name="position"
                    id="position" required>

                    <?php

                    $sql = 'Select id,pos from Position';
                    $query = $conn->query($sql);
                    while ($row = $query->fetch_assoc()) {
                        echo "<option value='" . $row['id'] . "'>" . $row['pos'] . "(" . $row['id'] . ")" . "</option>";
                    }
                    ?>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label for="Manager" class="uppercase font-bold text-lg text-grey-darkest control-label">Reporting
                Manager</label>

            <div class="col-sm-9">
                <select class="w-8/12 bg-white border py-2 px-3 text-grey-darkest form-control" name="manager"
                    id="manager" required>

                    <?php

                    $sql = 'Select id,name from Employee';
                    $query = $conn->query($sql);
                    while ($row = $query->fetch_assoc()) {
                        echo "<option value='" . $row['id'] . "'>" . $row['name'] . "(" . $row['id'] . ")" . "</option>";
                    }
                    ?>
                </select>
            </div>
        </div>


        <div class="form-group">
            <label for="role" class="uppercase font-bold text-lg text-grey-darkest control-label">Role</label>

            <div class="col-sm-9">
                <select class="w-8/12 border py-2 px-3 text-grey-darkest form-control bg-white" name="role" id="role"
                    required>

                    <?php

                    $sql = 'Select * from Role';
                    $query = $conn->query($sql);
                    while ($row = $query->fetch_assoc()) {
                        echo "<option value='" . $row['id'] . "'>" . $row['role'] . "(" . $row['id'] . ")" . "</option>";
                    }
                    ?>
                </select>
            </div>
        </div>


    </div>

    <div class="ml-5">
        <button id="add-emp-btn"
            class="w-1/12 border bg-green-300 hover:bg-teal-dark  uppercase text-lg p-2 rounded">Add</button>
        <button id="cancel-btn"
            class="w-1/12 border bg-green-300 hover:bg-teal-dark  uppercase text-lg p-2 rounded">cancel</button>
    </div>


</div>