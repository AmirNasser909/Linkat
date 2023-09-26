<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include_once '../Classes/Student.php';
include_once '../Classes/Notification.php';
session_start();

$student = new Student($_SESSION['user_ID']);

//print_r($_SESSION['assignments']);
?>

<!DOCTYPE HTML>

<html>
    <head>
        <link rel="stylesheet" href="css/student_prof.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
        <script src="../View/JS/jquery-3.2.0.min.js"></script> 
        <title>Assignments</title>
    </head>
    <body>
        <?php
        include_once './Header.php';
        include_once './preloader.php';
        ?>
        <section id="studentprofile">
            <div class="container">
                <div class="row">

                    <div class="col-lg-9 col-md-9 col-sm-9" style="text-align: -webkit-left;text-align: left">
                        <select name="course" id="subject"  onchange="onselectSubject()"  >
                            <option value="selected">Select course</option>
                            <?php
                            foreach ($_SESSION['registered_courses'] as $key => $value) {

                                echo '<option value="' . $value['pl_ID'] . '" id="pl_option">' . $value['pl_name'] . '</option>';
                            }
                            ?>
                        </select>
                        <div class="row">

                            <div  class="col-lg-9 col-md-9 col-sm-9 " >
                                <div id="sub">
                                    <?php
                                    if (isset($_GET['subject'])) {
                                        $id = $_GET['subject'];
                                        $name = $_GET['pl_name'];
                                        $course = new programming_language();
                                        $course->setvalues($id, $name);
                                        $_SESSION['assignments'] = $course->getassignments();
                                        if ($_SESSION['assignments']) {
                                            ?>
                                            <table  class="table div2 " id="r_data" style="margin-top: 10px">
                                                <tr>
                                                    <th>Assignment title</th>
                                                    <th>Download</th>
                                                </tr>
                                                <?php
                                                foreach ($_SESSION['assignments'] as $value) {
                                                    $question_name = explode("../uploads/", $value['question']);
                                                    // print_r($question_name);
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $question_name[1]; ?></td>
                                                        <td>
                                                            <a href="<?php echo $value['question']; ?> "download="" style="color: #ffffff">
                                                                <span class="glyphicon glyphicon-download">                                                
                                                                </span>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                }
                                                ?>
                                            </table>
                                            <button 
                                                type="button"
                                                class="btn btn-primary" 
                                                data-toggle="modal" 
                                                data-target="#mymodelerupload1" 
                                                id="instructor_navv"
                                                style="border: none;background:white; color: #2ec392; font-size: 26px">
                                                Upload assignment 
                                            </button>
                                            <!-- [ Modal #1 assignment uploaded ] -->
                                            <div class="modal fade" 
                                                 id="mymodelerupload1" 
                                                 tabindex="-1">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <button
                                                            type="button"
                                                            class="close"
                                                            data-dismiss="modal">
                                                            <i class="icon-xs-o-md"></i>
                                                        </button>
                                                        <div class="modal-header">
                                                            <button
                                                                type="button"
                                                                class="close"
                                                                data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true" id="word">&times;</span>
                                                            </button>
                                                            <h4 class="modal-title caps" id="word">
                                                                <strong>Upload assignment</strong>
                                                            </h4>
                                                        </div>


                                                        <div class="modal-body">

                                                            <form action="#" method="post" enctype="multipart/form-data">
                                                                <div class="form-group" style="text-align:left ">
                                                                    <input
                                                                        type="file" 
                                                                        name="assignment"
                                                                        class="form-control"  
                                                                        id="inputfile"
                                                                        required
                                                                        />                                                                                              
                                                                        <?php
                                                                        foreach ($_SESSION['assignments'] as $value) {
                                                                            $question_name = explode("../uploads/", $value['question']);
                                                                            // print_r($question_name);
                                                                            ?>

                                                                        <input 
                                                                            type="submit"
                                                                            name="uploadass" 
                                                                            class="btn btn-default" 
                                                                            class="btn btn-info" 
                                                                            data-toggle="modal"  
                                                                            id="word" 
                                                                            value="<?php echo $question_name[1] ?>"/> 
                                                                        <?php }
                                                                        ?>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>  
                                                </div>
                                            </div>

                                            <?php
                                        } else {
                                            ?>
                                            <div id="r_data" style="margin-top: 50px">
                                                <h2 class="capitalize">No assignments posted yet , check later :D !</h2>
                                            </div>
                                            <?php
                                        }
                                    }
                                    if (isset($_POST['uploadass'])) {
                                        //print_r($_FILES);
                                        $name = $_POST['uploadass'];
                                        $question;
                                        //print_r($name);
                                        foreach ($_SESSION['assignments'] as $value) {
                                            if (stristr($value['question'], $name)) {
                                                $question = $value['assignment_ID'];
                                                //echo $question;
                                                break;
                                            }
                                        }
                                        $filename = $_FILES['assignment']['tmp_name'];
                                        $actualfile_name = $_FILES['assignment']['name'];
                                        //print_r($actualfile_name);
                                        $size = $_FILES['assignment']['size'];
                                        $type = $_FILES['assignment']['type'];
                                        $error = $_FILES['assignment']['error'];
                                        if ($error === 0) {
                                            $result = $student->Upload_Assignment($filename, $size, $actualfile_name, $question);

                                            if ($result) {
                                                ?>

                                                <div id="r_data" style="margin-top: 50px">
                                                    <h2 class="capitalize">Assignment <?php echo "$name"; ?> is uploaded successfully :D ! !</h2>
                                                </div>
                                                <?php
                                            } else {
                                                ?>
                                                <div id="r_data" style="margin-top: 50px">
                                                    <h2 class="capitalize">Assignment <?php echo "$name"; ?> is updated successfully :D ! !</h2>
                                                </div>
            <?php
        }
    } else {
        ?>
                                            <div id="r_data" style="margin-top: 50px">
                                                <h2 class="capitalize">Error while uploading please try again!</h2>
                                            </div>
                                            <?php
                                        }
                                        unset($_SESSION['assignments']);
                                        unset($_POST['uploadass']);
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-2 col-sm-2" style="text-align: -webkit-center">
                        <aside class="aside">
                            <section class="section">
                                <h3 class="capitalize">options</h3>
                                <p>
                                    <a href="#">Take quiz</a>
                                    <a href="../View/Student_assignments.php">Assignments page</a>
                                    <a href="#">Question Page</a>
                                </p>
                            </section>
                        </aside>
                    </div>
                </div>
            </div>
        </section>

        <script LANGUAGE="JavaScript">
            function onselectSubject() {
                //   alert('welcome');
                var subject = $("#subject").val();
                var pl_option = $("#subject option:selected").text();
                ;
                if (subject === 'selected') {

                    alert("Please Select A Subject....!!");

                } else {
                    $.post('../View/Ajax_Student_assignment.php', {
                        subject: subject,
                        pl_name: pl_option
                    }, function (html) {
                        //alert(html);
                        $("#sub").empty();
                        $('#sub').append(html);
                    });

                }
            }

        </script>

<?php
include_once './footer.php';
?>
    </body>
</html>

