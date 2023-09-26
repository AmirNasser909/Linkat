<?php
session_start();
include_once '../functions/checkSQL.php';
include_once '../Classes/Admin.php';
//add course
if($_SERVER['REQUEST_METHOD'] === "POST"){
    if(checksql($_POST['name']) and checksql($_POST['message'])){
        $c = new Admin();
        $id = $_SESSION['user_ID'];
        $result =  $c->Add_course($_POST['name'] , $_POST['message'], $id);
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
        <title>Add Course</title>

        <!--
          css links
        -->
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <link rel="stylesheet" href="css/AddCourse.css">
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
                            <h1 class="heading bold">Add Course</h1>
                            <hr>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <form action="#" method="post" class="wow fadeInUp" data-wow-delay="0.6s">
                            <div class="col-md-6 col-sm-6">
                                <input type="text" class="form-control" placeholder="Course Name" name="name" required>
                            </div>
                            <div class="col-md-12 col-sm-12">
                                <textarea class="form-control" placeholder="Course Description" rows="7" name="message" required></textarea>
                            </div>
                            <div class="col-md-offset-4 col-md-8 col-sm-offset-4 col-sm-8">
                                <input type="submit" class="form-control" value="Submit" onclick="../Admin_profile.php">
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
