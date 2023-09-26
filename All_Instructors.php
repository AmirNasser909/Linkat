<?php
include_once '../Classes/Guest.php';
include_once '../Classes/programming_language.php';
include_once '../functions/checkSQL.php';
$plclass = new programming_language();
$person = new Guest();
$pl = $plclass->get_all_courses();

//print_r($pl);
if (isset($_POST['beinstructor']) and ! isset($_SESSION['message'])) {
    $fname = $_POST['firstname'];
    $lname = $_POST['lastname'];
    $email = $_POST['email'];
    $pl = $_POST['pl'];
    $acceptance_reason = $_POST['acceptance_reason'];
    $filename = $_FILES['cv']['tmp_name'];
    $actualfile_name = $_FILES['cv']['name'];
    $size = $_FILES['cv']['size'];
    $type = $_FILES['cv']['type'];
    $error = $_FILES['cv']['error'];
    if (checksql($fname) and checksql($lname) and checksql($email) and checksql($acceptance_reason)) {
        $cv_path = $person->Upload_File($filename, $size, $actualfile_name);
        $result = $person->beInstructor($fname, $lname, $email, $pl, $acceptance_reason, $cv_path);
        if ($result) {
            $_SESSION['message'] = "Your request has been sent successfully follow up your mail to know if ";
            $_SESSION['message'] .= "you're accepted or regected :D !";
        } else {
            $_SESSION['message'] = "Sorry please fill your data again!";
        }
    } else {
        $_SESSION['message'] = "Sorry please fill your data again!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <title>All Instructors</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
        <script src="JS/login.js"></script>
    </head>

    <body>
        <?php
        include_once './Header.php';
        include_once './preloader.php';
        ?>
      <div class="login-box animated fadeInUp">
        <div class="box-header">
            <h2>All Instructors</h2>
        </div>
      </div>


        <?php
        include_once './footer.php';
        ?>



    </body>

</html>
