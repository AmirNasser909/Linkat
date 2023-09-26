<?php

include_once '../Classes/Guest.php';
include_once '../functions/checkSQL.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (checksql($_POST['username']) and checksql($_POST['password'])) {
        $person = new Guest();
        $login = $person->Login($_POST['username'], $_POST['password']);
        //var_dump($login);
        if (!$login) {
            $msg = "Username and password mismatch!";
        }
    } else {
        $msg = "Invalid username or password please try again";
    }
    if (isset($_SESSION['type'])) {
        if ($_SESSION['type'] == 1) {
            header("Location:Admin_profile.php");
        } elseif ($_SESSION['type'] == 2) {
            header("Location:student_profile.php");
        } elseif ($_SESSION['type'] == 3) {
            header("Location:ins_profile.php");
        }
    }
}
?>
<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <title>Login</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
</head>
<body>
    <?php
    include_once './Header.php';
    include_once './preloader.php';
    ?>
    <section id="login">
        <div class="container">
            <div class="top">
            </div>
            <div class="login-box animated fadeInUp">
                <div class="box-header">
                    <h2>Log In</h2>
                    <?php
                    if (isset($msg)) {
                        echo '<h3 style="color:red ; font-size:14px">' . $msg . '</h3>';
                    }
                    ?>

                </div>
                <form action="#" method="post">
                    <input type="text" id="username" name="username" placeholder="Username/Email" required>
                    <br>
                    <input type="password" id="password" name="password" placeholder="Password" required>
                    <br/>
                    <input type="submit" name="login" value="Log in">
                   <!-- <a href="#"><p class="small">Forgot your password?</p></a>-->
                </form>
            </div>
        </div>
    </section>
    <?php
    include_once './footer.php';
    ?>
</body>
</html>