<?php
session_start();
include_once '../Classes/programming_language.php';
include_once '../Classes/link.php';
include_once '../Classes/Student.php';
$pl = new programming_language();
$links = new link();
$student = new Student($_SESSION['user_ID']);
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$courses = $pl->get_all_courses();
$link = $links->get_all_links();
$size = sizeof($courses);
//print_r($_SESSION);
$index = array();
for ($i = 0; $i < $size; $i++) {
    $index[$courses[$i]['pl_name']] = $i;
}
include_once './Header.php';
include_once './preloader.php';
$questions = array(array("images/student profilhhe.jpg", "username", "question", array(array("images/student profilhhe.jpg", "username", "reply"))), array("images/student profilhhe.jpg", "username", "question", array(array("images/student profilhhe.jpg", "username", "reply"))), array("images/student profilhhe.jpg", "username", "question", array(array("images/student profilhhe.jpg", "username", "reply"))), array("images/student profilhhe.jpg", "username", "question", array(array("images/student profilhhe.jpg", "username", "reply"))), array("images/student profilhhe.jpg", "username", "question", array(array("images/student profilhhe.jpg", "username", "reply"))), array("images/student profilhhe.jpg", "username", "question", array(array("images/student profilhhe.jpg", "username", "reply"))));
if (isset($_POST['plbtn'])) {
    $_SESSION['index'] = $_POST['plbtn'];
    $pl->setvalues($courses[$index[$_SESSION['index']]]['pl_ID'], $courses[$index[$_SESSION['index']]]['pl_name'], $courses[$index[$_SESSION['index']]]['pl_description']);
 $_SESSION['pl_ID']=$pl->getID();
 unset($_POST['plbtn']);
    
}
if (isset($_SESSION['type'])) {   
    $registered = $student->isRegistered($_SESSION['user_ID'], $_SESSION['pl_ID']);
}
if(isset($_POST['registerplbtn']))
{
    $registered = $student->isRegistered($_SESSION['user_ID'], $_SESSION['pl_ID']);
    if(!$registered){
        $result = $student->register_course($_SESSION['user_ID'], $_SESSION['pl_ID']);
        $registered = $student->isRegistered($_SESSION['user_ID'], $_SESSION['pl_ID']);
    }
    if($result){
        $msg = "You registered this course ,take quizes and competitions to increse your points ;) !";
    } else {
        $msg = "Registration failed please try again later!";
    }
    unset($_POST);
}
if (isset($_POST['quizbtn'])) {
//   header("Location: Quiz.php");
    $ID=$_SESSION['user_ID'];
    $pl=$_SESSION['pl_ID'];
    // Query database
    $s=new Student($ID);
    $data2 = array();
    $an= new answer();
    $an1= new answer();
    $an2= new answer();
    $an3= new answer();
    $sa=new assigment($an, $an1, $an2, $an3);
        
    $data2=$s->Take_assynments($pl);
    
    $sa->question=$data2['question'];
    $an->answer=$data2['answer1'];
    $an1->answer=$data2['answer2'];
    $an2->answer=$data2['answer3'];
    $an3->answer=$data2['answer4'];
    $an->right=$data2['right'];
}
?>
<html>
    <head>
        <meta charset="utf-8">
        <?php
        if (!isset($_SESSION['index']) ) {
            ?>
            <title>Courses</title>
            <?php
        } else {
            ?>
            <title><?php echo $courses[$index[$_SESSION['index']]]['pl_name']; ?></title>
            <?php
        }
        ?>
        <!--
          css links
        -->
        <meta charset="UTF-8">
        <link rel="stylesheet" href="css/coursecss.css">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <link rel="stylesheet" href="css/animate.min.css">
        <link rel="stylesheet" href="css/et-line-font.css">
        <link rel="stylesheet" href="css/coursecss.css">
        <link href='https://fonts.googleapis.com/css?family=Roboto:400,300,500' rel='stylesheet' type='text/css'>
        <meta name="viewport" content="width=device-width"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
        <div class="container" id="all">
            <div  class="row">
                <!--Pl navigation-->
                <div class="navbar  custom-navbar">
                    <div class="navbar-header">
                        <a href="#" class="navbar-brand">Courses</a>
                    </div>
                    <ul class="nav navbar-nav navbar-right" style="display: -webkit-inline-box" >
                        <form action="#" method="post" style="display: -webkit-inline-box">
                            <?php
                            foreach ($courses as $value) {
                                echo '<li><input type="submit" name="plbtn" class="smoothScroll" id="plbtn" value="' . $value['pl_name'] . '"/></li>';
                            }
                            ?>   
                        </form>
                    </ul>

                </div>
            </div>
            <!--end of pl navigation-->
            <?php
            if (isset($_SESSION['index'])) {
                if(isset($msg)){
                ?>
            <div class="row" >
                    <div class="col-lg-12 col-sm-12 col-md-12">
                        <h2><?phpecho $msg;?></h2>
                    </div>
            </div>
            <?php
                }
            ?>
                <!-- PL description-->
                <div class="row" >
                    <div class="col-lg-6 col-sm-12 col-md-12">
                        <fieldset  id="course_dis" style="margin-top: 20px">
                            <legend class="l1">
                                <?php echo $courses[$index[$_SESSION['index']]]['pl_name']; ?>
                            </legend>
                            <div class=""><strong> Description : </strong><br> <?php echo $courses[$index[$_SESSION['index']]]['pl_description']; ?>  </div>
                        </fieldset>
                    </div>
                    <!-- end of pl description-->

                    <!-- Materials description-->
                    <div class="col-lg-6 col-sm-12 col-md-12">
                        <fieldset   id="course_dis" style="margin-top: 20px">
                            <legend class="l1">Material </legend>
                            <table id="link_table">
                                <tr>
                                    <th>
                                        <strong> Description </strong>
                                    </th>
                                    <th id="link" >
                                        <strong> Link  </strong>
                                    </th>
                                </tr>
                                <?php
                                foreach ($link as $value) {
                                    if ($value['link_type'] == 3 and $value['pl'] === $courses[$index[$_SESSION['index']]]['pl_ID']) {
                                        ?>
                                        <tr>
                                            <td>
                                                <b><?php echo $value['link_description']; ?> </b>
                                            </td>
                                            <td id="link">
                                                <a href=<?php echo $value['link_URL']; ?> > <?php echo $value['link_URL'] ?></a>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                }
                                ?>
                            </table>
                        </fieldset>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12 col-sm-12 col-md-12" >     

                        <fieldset id="course_dis" >
                            <legend class="l1"><strong>Arabic Reference</strong></legend>


                            <table id="link_table">

                                <tr>
                                    <th>
                                        <strong>Description </strong>
                                    </th>
                                    <th id="link" >
                                        <strong> Link  </strong>
                                    </th>
                                </tr>
                                <?php
                                foreach ($link as $value) {
                                    if ($value['link_type'] == 1 and $value['link_language'] == 2 and $value['pl'] === $courses[$index[$_SESSION['index']]]['pl_ID']) {
                                        ?>
                                        <tr>

                                            <td>
                                                <b><?php echo $value['link_description']; ?> </b>
                                            </td>
                                            <td id="link">
                                                <a href="<?php echo $value['link_URL'] ?>" > <?php echo $value['link_URL'] ?></a>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                }
                                ?>
                            </table>
                        </fieldset>
                    </div>


                </div>

                <div class="row">
                    <div class="col-lg-12 col-sm-12 col-md-12">     

                        <fieldset  id="course_dis">
                            <legend class="l1"><strong>English Reference</strong></legend>

                            <table id="link_table">

                                <tr>
                                    <th>
                                        <strong> Description </strong>
                                    </th>
                                    <th id="link" >
                                        <strong> Link  </strong>
                                    </th>
                                </tr>
                                <?php
                                foreach ($link as $value) {
                                    if ($value['link_type'] == 1 and $value['link_language'] == 1 and $value['pl'] === $courses[$index[$_SESSION['index']]]['pl_ID']) {
                                        ?>
                                        <tr>

                                            <td>
                                                <b><?php echo $value['link_description']; ?> </b>
                                            </td>
                                            <td id="link">
                                              <a href="<?php echo $value['link_URL'] ?>" > <?php echo $value['link_URL'] ?></a>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                }
                                ?>
                            </table>
                        </fieldset>
                    </div>
                </div>
                <?php
                if (isset($_SESSION['type']) and $_SESSION['type'] == 2) {
                    if ($registered) {
                        ?>
                        
                            <div class="row" style="text-align: -webkit-center">
                                <div class="col-lg-6 col-md-4 col-sm-4">
                                    <form method="post" action="Quiz.php">
                                        <input type="submit" value="Take Quiz" name="quizbtn" class="quizbtn btn" /> 
                                    </form>
                                </div>
                                <div class="col-lg-6 col-md-4 col-sm-4">
                                    <form method="post" action="competition.php">
                                        <input type="submit" value="Take competition" name="competitionbtn" class="comptetionbtn btn"/>
                                    </form>
                                </div>
                            </div>
                      
                    <?php } else {
                        ?>
                        <form method="post">
                            <div class="row" style="text-align: -webkit-center">

                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <input type="submit" value="Register" name="registerplbtn" class="comptetionbtn btn"/>
                                </div>
                            </div>
                        </form>
                        <?php
                    }
                }
            } else {
                ?>
                <div class="row">
                    <div class="col-lg-12 col-sm-12 col-md-12">     

                        <fieldset  id="course_dis">
                            <legend class="l1"><strong>Courses</strong></legend>

                            <table id="link_table">

                                <tr>
                                    <td style="text-align: -webkit-auto">
                                        <ul style="list-style: none">
                                            <form action="#" method="post" style="display: -webkit-inline-box;">
                                                <?php
                                                foreach ($courses as $value) {
                                                    echo '<li><input type="submit" name="plbtn" class="smoothScroll" id="plbtn" value="' . $value['pl_name'] . '"style="color: #2ec392"/>|</li>';
                                                }
                                                ?>   
                                            </form>
                                        </ul>   </td>
                                </tr>

                            </table>
                        </fieldset>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
        <?php
        include_once './footer.php';
        ?>
    </body>
</html>