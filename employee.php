<?php
session_start();
include('connection.php');

if ($_SESSION['positionid'] == 3 or !isset($_SESSION['positionid'])) {
    header("Location:index.php");
    exit;
}
if (!isset($_SESSION['uid'])) {
    header("Location:login.php");
    exit;
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST['logout'])) {
        session_destroy();
        $_POST = array();
        header("Location:login.php");
        exit;
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <style type="text/css">
    * {
        font-family: 'Source Sans Pro', sans-serif;
    }
    </style>

</head>

<body>

    <div class="h-screen flex relative">

        <!-- navigation header and menu -->
        <?php
        include("navigation_ui/header_navigation.php");
        include("navigation_ui/menu_navigation.php");
        ?>










        <main class="absolute top-20 left-60 right-0 border h-screen ">
            <div id="main-inner-content" class="inner-content">
                <?php include("Employee/home.php") ?>

            </div>


        </main>

        <main class="overlay-model">
            <?php include('employee_directory_model.php') ?>

        </main>










    </div>


    <script type="text/javascript" src="index_script.js"></script>

    <!-- <script type="text/javascript" src="employee_directory_script.js"></script> -->

    <script type="text/javascript">
    const directoryElem = document.getElementById('employee-directory');
    directoryElem.addEventListener('click', function() {

        // console.log('is clicked');
        toggleModal();

    })

    function toggleModal() {

        // console.log('in toggle model');
        const body = document.querySelector('body')
        const modal = document.querySelector('.modal')
        modal.classList.toggle('opacity-0')
        modal.classList.toggle('pointer-events-none')
        body.classList.toggle('modal-active')
    }
    var closemodal = document.querySelectorAll('.modal-close')
    // console.log(closemodal)
    for (var i = 0; i < closemodal.length; i++) {
        console.log('hhhh')
        closemodal[i].addEventListener('click', toggleModal)
    }
    document.onkeydown = function(evt) {
        evt = evt || window.event
        var isEscape = false
        if ("key" in evt) {
            isEscape = (evt.key === "Escape" || evt.key === "Esc")
        } else {
            isEscape = (evt.keyCode === 27)
        }
        if (isEscape && document.body.classList.contains('modal-active')) {
            toggleModal()
        }
    };
    </script>
</body>

</html>