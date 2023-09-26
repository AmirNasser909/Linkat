<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Ajax_Student_assignment
 *
 * @author marya
 */
error_reporting(E_ERROR);

session_start();
//put your code here
include_once '../Classes/programming_language.php';
//print_r($_POST);
if (isset($_POST['subject'])) {
    print_r($_POST['subject']);
    $id = $_POST['subject'];
    $name = $_POST['pl_name'];
    $course = new programming_language();
    $course->setvalues($id, $name);
    $_SESSION['assignments'] = $course->getassignments();
    if ($_SESSION['assignments']) {
        ?>
        <html>
            <head>
                <script src="../View/JS/jquery-3.2.0.min.js"></script>
                <link rel="stylesheet" href="../bootstrap-3.3.7-dist/css/bootstrap.min.css">
                <link rel="stylesheet" href="../View/css/student_prof.css"/>
                <link rel="stylesheet" href="../View/css/instructor_prof.css"/>
            </head>
            <table  class="table div2 " id="r_data" style="margin-top: 10px">
                <tr>
                    <th>Assignment title</th>
                    <th>Download</th>
                </tr>
                <?php
                foreach ($_SESSION['assignments'] as $value) {
                    $question_name = explode("../uploads/", $value['question']);
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
                                        $i = 1;
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
        </html>
        <?php
    } else {
        ?>
        <div id="r_data" style="margin-top: 50px">
            <h2 class="capitalize">No assignments posted yet , check later :D !</h2>
        </div>
        <?php
    }
}
?>



