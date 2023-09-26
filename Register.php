<?php
include_once '../functions/checkSQL.php';
include_once '../Classes/Guest.php';
if ($_SERVER['REQUEST_METHOD'] === "POST") {
    if(checksql($_POST['firstname']) and checksql($_POST['lastname']) and checksql($_POST['email']) and checksql($_POST['password'])){
        $register = new Guest();
        $result =  $register->Register($_POST['firstname'], $_POST['lastname'], $_POST['email'], $_POST['password']);
        if(!$result)
        {
            $msg = "Registeration failed please try again !";
        }
    }
 else {
    $msg="Invalid inputs please try again";    
    }
 
 }
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <title>Register</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
        <script src="JS/login.js"></script>
        <script src="JS/rejisterpasswordvalidate.js"></script>
    </head>

    <body>
        <?php
        include_once './Header.php';
        include_once './preloader.php';
        ?>

        <section id="Register">
            <div class="container">
                <div class="top">

                </div>
                <div class="login-box animated fadeInUp">
                    <div class="box-header">
                        <h2>Register</h2>
                          <?php
                    if (isset($msg)) {
                        echo '<h3 style="color:red ; font-size:14px">' . $msg . '</h3>';
                    }
                    ?>
                    </div>
                    <form action="#" method="post">
                        <input type="text" id="firstname" name="firstname" placeholder="First name" required>
                        <br>
                        <input type="text" id="lastname" name="lastname" placeholder="Last name" required>
                        <br>
                        <input type="email" id="email" name="email" placeholder="Email" required>
                        <br/>
                        <input type="password" id="password1" name="password" placeholder="Password" required>                                       
                        <p id="validate-length" style="color: black ;display: none"></p>
                        <br>
                        <input type="password" id="password2" name="passwordcheck" placeholder="Retype password" required>
                        <br/>
                        <p id="validate-status" ></p>
                        <br>
                        <input  type="submit" id="registerbtn" name="registerbtn" value="Register">
                      
                    </form>
                </div>
            </div>
        </section>
        <?php
        include_once './footer.php';
        ?>
    </body>


</html>