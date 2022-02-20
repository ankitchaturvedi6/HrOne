<?php

include('validateCredentials.php');

?>










<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LoginAndSignUp</title>
    <link type="text/css" rel="stylesheet" href="login_style.css">



</head>

<body>


    <div class="container" id="container">
        <div class="form-container sign-in-container">
            <form id="login-from" method="POST" onsubmit="return validateField()">
                <h1>Log in</h1>
                <h6 class="error-text">Fields Can't be Empty</h6>

                <input id="user-id" type="number" name="user-id" placeholder="UserId" />
                <input id="user-password" type="password" name="user-pass" placeholder="Password" />
                <button id="sign-in-btn" type="submit" value="submit">Sign In</button>
            </form>
        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-right">
                    <h1>Welcome!</h1>
                    <p>To keep connected with us please login with your personal info</p>

                </div>
            </div>
        </div>
    </div>



    <script type="text/javascript">
    let userIdEl = document.getElementById('user-id');
    let userPassEl = document.getElementById('user-password');
    let errorEl = document.querySelector('.error-text');

    let err = <?= $error . " " ?>;

    if (err) {
        errorEl.textContent = '<?= $errorText ?>';
        errorEl.style.display = 'block';
    }

    function validateField() {
        let userId = userIdEl.value;
        let userPass = userPassEl.value;

        let errorText = "";
        if (!userId || !userPass) {
            errorEl.style.display = 'block';
            return false;
        }

        return true;
    }
    </script>






</body>

</html>