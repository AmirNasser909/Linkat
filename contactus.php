<?php
session_start();
include_once '../functions/checkSQL.php';
include_once '../Classes/Student.php';
if ($_SERVER['REQUEST_METHOD'] === "POST") {
    if(checksql($_POST['name']) and checksql($_POST['email']) and checksql($_POST['message'])){
        $id = $_SESSION['user_ID'];
        $feedback = new Student($id);
        $result =  $feedback->Send_feedback($_POST['name'] , $_POST['email'], $_POST['message'], $id);
        if(!$result)
        {
            $msg = "done";
        }
    }
 else {
    $msg="error";
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Contact us</title>

        <!--
          css links
        -->
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <link rel="stylesheet" href="css/contactus.css">
    </head>
    <body>
        <!-- preloader section -->
        <?php
        include_once './Header.php';
        include_once './preloader.php';
        ?>
        <!-- contact section -->
        <section id="contact">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 text-center">
                        <div class="section-title">
                            <h1 class="heading bold">Contact us</h1>
                            <hr>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12 contact-info">
                        <h2 class="heading bold">Contact info</h2>
                        <p>Your opinion matters, please share it with us!</p>
                        <div class="col-md-6 col-sm-4">
                            <h3><i class="icon-envelope medium-icon wow bounceIn" data-wow-delay="0.6s"></i> EMAIL</h3>
                            <p>Linkat@gmail.com</p>
                        </div>
                        <div class="col-md-6 col-sm-4">
                            <h3><i class="icon-phone medium-icon wow bounceIn" data-wow-delay="0.6s"></i> PHONES</h3>
                            <p>010-2057-5215 | 011-2274-2648</p>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <form action="#" method="post" class="wow fadeInUp" data-wow-delay="0.6s">
                            <div class="col-md-6 col-sm-6">
                                <input type="text" class="form-control" placeholder="Name" name="name" required>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <input type="email" class="form-control" placeholder="Email" name="email" required>
                            </div>
                            <div class="col-md-12 col-sm-12">
                                <textarea class="form-control" placeholder="Message" rows="7" name="message" required></textarea>
                            </div>
                            <div class="col-md-offset-4 col-md-8 col-sm-offset-4 col-sm-8">
                                <input type="submit" class="form-control" value="Submit" onclick="../student_profile.php">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>

        <!-- footer section -->
        <?php
        include_once './footer.php';
        ?>

    </body>
</html>
