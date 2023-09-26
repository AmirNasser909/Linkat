<?php

session_start();
include_once '../Classes/Student.php';
include_once '../Classes/Registered_person.php';
include_once '../Classes/Helper.php';

if (isset($_POST['your_name'])) {
        $user = new Student();
        $p = new Registered_person();
        $id = $_SESSION['user_ID'];
        echo "$id";
        $Delete = $user->Delete_account($id);
        
    if($Delete)
    {
        $p->logout();
        header("Location: index.php");
    }
    else {
        echo "didn't delete"; 
        header("Location: student_profile.php");
    }
}

$student = new Student($_SESSION['user_ID']);
$_SESSION['registered_courses'] = $student->getRegisteredCourses($_SESSION['user_ID']);
//print_r($_SESSION['registered_courses']);

if (isset($_POST['Questions_page'])) {
        $user = new Helper();
        $id = $_SESSION['user_ID'];
        $pl = $_POST['Questions_page'];
        $data=array();
        $data = $user->Show_Right_Answers($id,$pl);
        
    if($data)
    {
        $question=$data['question'];
        $right=$data['right'];
        header("Location: answers.php");
        echo "$question";
        echo "$right";
    }
    else {
        header("Location: sorry.php");
    }
}
?>
<!DOCTYPE HTML>
<html>
    <head>
        <link rel="stylesheet" href="css/student_prof.css">
        <title><?php echo $_SESSION['fname'] . " " . $_SESSION['lname']; ?></title>
    </head>
    <body>
        <?php
        include_once './Header.php';
        include_once './preloader.php';
        ?>
        <section id="studentprofile">
            <div class="container">
                <div class="row">
                    <div class="col-lg-2 col-md-1 col-sm-1" style="margin-bottom: 50px;min-height: 70px">
                        <div  id="p_data" >
                            <table id="t_data" >
                                <tr>
                                    <td > <img src="images/student profilhhe.jpg"  width="70px" id="p_img"/></td>
                                </tr>
                                <tr>
                                    <td id="r_data">
                                        welcome back,<br> <?php echo $_SESSION['fname']; ?>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-2 col-sm-2">
                        <div id="clockdiv" style="margin-top: 20px">
                            <h1 class="h1">Compete after</h1>
                            <div >
                                <span class="days"></span>
                                <div class="smalltext">Days</div>
                            </div>
                            <div >
                                <span class="hours"></span>
                                <div class="smalltext">Hours</div>
                            </div>
                            <div >
                                <span class="minutes"></span>
                                <div class="smalltext">Minutes</div>
                            </div>
                            <div >
                                <span class="seconds"></span>
                                <div class="smalltext">Seconds</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-2" style="text-align: -webkit-center">
                        <aside class="aside" style="margin-top: 20px">
                            <section class="section">
                                <h3 class="capitalize">options</h3>
                                <p>
                                    <a href="../View/Student_assignments.php">Assignments page</a>
                                    <form action="#" method="POST">
                                         <button type="submit" name="your_name" value="your_value" class="btn-link confirm" style="color: #fff;text-decoration: none;">Delete account</button>
                                    </form>
                                </p>
                            </section>
                        </aside>
                    </div>
                    <div class="row"> 
                        <div  class="col-lg-8 col-md-6 col-sm-6 " style="margin-top: 20px">
                            <article>
                                <section class="div2">
                                    <h3 class="capitalize">Course information</h3>
                                   
                                    <table>
                                         <?php
                                    if(isset($_SESSION['registered_courses'])){
                                    ?>
                                        <tr>
                                            <th class="tr">Course</th>
                                            <th class="tr">quiz</th>
                                            <th class="tr">Competition</th>
                                            <th class="tr">Points</th>
                                        </tr>
                                        <?php
                                        foreach ($_SESSION['registered_courses'] as $value) {
                                            ?>
                                            <tr>
                                                <td><?php echo $value['pl_name'] ?></td>
                                                <td><?php echo $value['no_quiz'] ?></td>
                                                <td><?php echo $value['no_competitions'] ?></td>
                                                <td><?php echo $value['points'] ?></td>
                                                <td>
                                                    <form action="answers.php" method="POST">
                                                         <button type="submit" name="Questions_page" value="<?php echo $value['pl_ID'] ?>" class="btn-link" style="color: #fff;text-decoration: none;">Question Page</button>
                                                    </form>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                    }else{
                                        ?>
                                            <tr>
                                                <td>No courses registered yet..</td>
                                                <td>You can register from here -></td>
                                                <td><a href="../View/course.php">Courses</a></td>
                                            </tr>          
                                            <?php
                                    }
                                    ?>
                                    </table>
                                </section>
                            </article>
                        </div>
                    </div>
                </div>


            </div>
        </section>



        <?php
        include_once './footer.php';
        ?>
        <script src="js/student.js"></script>
        <script src="js/student_prof.js"></script>
    </body>
</html>
