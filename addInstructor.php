<?php
session_start();
include_once '../Classes/programming_language.php';
include_once '../Classes/Admin.php';
include_once '../functions/checkSQL.php';
$plclass = new programming_language();
$person = new Admin();
$pl = $plclass->get_all_courses();
//print_r($pl);
if (isset($_POST['addinstructor']) and ! isset($_SESSION['message'])) {
    $fname = $_POST['firstname'];
    $lname = $_POST['lastname'];
    $email = $_POST['email'];
    $pl = $_POST['pl'];
    //print_r($_FILES);
    $filename = $_FILES['cv']['tmp_name'];
    $actualfile_name = $_FILES['cv']['name'];
    $size = $_FILES['cv']['size'];
    $type = $_FILES['cv']['type'];
    $error = $_FILES['cv']['error'];
    if (checksql($fname) and checksql($lname) and checksql($email) ) {
        $cv_path = $person->Upload_File($filename, $size, $actualfile_name);
        //print_r($cv_path);
        $result = $person->Add_ins($fname, $lname, $email, $pl,  $cv_path);
        if ($result) {
            $_SESSION['message'] = "instructor added ";
        } else {
            $_SESSION['message'] = $cv_path;
        }
    }else {
        $_SESSION['message'] = "Sorry please fill the data again!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <title>Add instructor</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
        <script src="JS/login.js"></script>
    </head>

    <body>
        <?php
        include_once './Header.php';
        include_once './preloader.php';
        ?>

        <section id="beinstructor">
            <div class="container">
                <div class="top">

                </div>
                <div class="login-box animated fadeInUp">
                    <div class="box-header">
                        <h2>Be instructor
                        <?php if(isset($message)){
                        echo $_SESSION['message'];
                        } ?>
                        </h2>
                    </div>
                    <?php
                    if (!isset($_SESSION['message'])) {
                        ?>
                        <form action="#" method="post"enctype="multipart/form-data">
                            <input type="text" id="firstname" name="firstname" placeholder="First name" required>
                            <br>
                            <input type="text" id="lastname" name="lastname" placeholder="Last name" required>
                            <br>
                            <input type="email" id="email" name="email" placeholder="Email" required>
                            <br>
                            <div style="color: #2ec392">Choose Programming language you know:</div>
                            <br>
                            <?php
                            foreach ($pl as $key => $value) {
                                echo '<input type="radio" id="pl" name="pl" value="' . $value['pl_name'] . '" required> <label> ' . $value['pl_name'] . '</label><br>';
                            }
                            ?>
                            <br>
                            <label  for="cv" >Please upload your CV.</label>
                            <br>
                            <input  type="file"  name="cv"  required>
                            <br>
                            <input  type="submit" name="addinstructor" value="Add instructor" >

                        </form>
                        <?php
                    } else {
                        ?>
                        <h1 style="color: #2ec392"> <?php echo $_SESSION['message']; ?></h1>

                        <?php
                    }
                    unset($_POST);
                    unset($_SESSION['message']);
                    ?>
                </div>
            </div>
        </section>

        <?php
        include_once './footer.php';
        ?>
    </body>
</html>
