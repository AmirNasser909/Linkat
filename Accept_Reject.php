<?php
session_start();
include_once '../Classes/Admin.php';
include_once '../Classes/instructor.php';

$ins = new instructor();
$user = new Admin();
$ins = $user->View_ins_Requests();
if($ins){
    $id = $ins->id;
    if (isset($_POST['Accept'])){        
            $user->AcceptORreject_ins(1,$id);
    }

    else if (isset($_POST['Reject'])) {
            $user->AcceptORreject_ins(0,$id);
    }
}
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <title>Accept Or Reject</title>
        <link rel="stylesheet" href="css/style.css"/>
        <link rel="stylesheet" href="css/instructor_prof.css">
        <link href='https://fonts.googleapis.com/css?family=Roboto:400,300,500' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="../bootstrap-3.3.7-dist/css/bootstrap.min.css">
        <script src="../View/JS/jquery-3.2.0.min.js"></script>        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
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
                        <h2>Accebt Or Reject</h2>
                    </div>
                    <?php
                    if (!isset($_SESSION['message'])) {
                        ?>
                        <form action="#" method="post"enctype="multipart/form-data">
                            <input type="text" id="firstname" name="firstname" placeholder="First name" value="<?php print_r($ins->fname);?>">
                            <br>
                            <input type="text" id="lastname" name="lastname" placeholder="Last name" value="<?php print_r($ins->lname);?>">
                            <br>
                            <input type="email" id="email" name="email" placeholder="Email" value="<?php print_r($ins->email);?>">
                            <br>
                            <div style="color: #2ec392">the Programming language he know:</div>
                            <a href="beinstructor.php"></a>
                            <br>
                            <?php
                            echo '<input type="radio" id="pl" name="pl" value="' . $ins->pl . '"> <label> ' . $ins->pl . '</label><br>';?>
                            <br>
                            <div class="login-box animated fadeInUp" style="position: inherit;">
                                <div class="box-header">
                                    <h2 >CV<a href="<?php echo "$ins->cv";?> "download="">
                                            <span class="glyphicon glyphicon-download">                                                
                                            </span>
                                        </a></h2>
                                </div>
                                <iframe src=<?php echo "$ins->cv"; ?> frameborder="0" scrolling="no" style="text-align: -webkit-center" onload="resizeIframe(this)"></iframe>
                            </div>
                            <input type="submit" name="Accept" value="Accept">
                            <input type="submit" name="Reject" value="Reject">
                            <br>
                            <input type="submit" name=">" value=">">
                        </form>
                        <?php
                    } else {
                        ?>
                        <h1 style="color: #2ec392"> <?php echo $_SESSION['message']; ?></h1>

                        <?php
                    }
                    unset($_POST);
                    unset($_SESSION);
                    session_destroy();
                    ?>
                </div>
            </div>
        </section>

        <?php
        include_once './footer.php';
        ?>
    </body>

</html>
