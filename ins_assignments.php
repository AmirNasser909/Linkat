<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();
unset($_SESSION['assignments']);
include_once './Header.php';
include_once './preloader.php';
include_once '../Classes/instructor.php';
$ins = new instructor();
//echo $_SESSION['user_ID'];
$ins->setvalues($_SESSION['user_ID']);
$_SESSION['assignments'] = $ins->select_assignments();
//print_r($_SESSION['assignments']);
?>
<html>
    <head>
        <title>View assignments</title>
        <script src="../View/JS/jquery-3.2.0.min.js"></script>
        <link rel="stylesheet" href="../bootstrap-3.3.7-dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="../View/css/student_prof.css"/>
        <script type="text/javascript">
            function onclickassignment(e) {
//                alert(e);
                var ass = $("#"+e).val();
//                /alert(ass);
                $.post('../View/Ajax_ins_assignment.php', {
                    ass :ass
                }, function (html) {
                    //alert(html);
                    $("#frame").empty();
                    $('#frame').append(html);
                });

            }


        </script>
    </head>
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6">
                <table  class="table div2 " id="r_data" style="margin-top: 10px">
                    <tr>    
                        <th>Assignment title</th>
                        <th>Student name</th>
                        <th>View assignment</th>
                    </tr>
                    <?php
                    foreach ($_SESSION['assignments'] as $assignment) {
                        $assignment_name = explode("../uploads/", $assignment['question']);
                        ?>
                        <tr>
                            <td><?php echo $assignment_name[1] ?></td>
                            <td><?php echo $assignment['fname'] . " " . $assignment['lname'] ?></td>
                            <td>
                                <button id="<?php echo $assignment['assignment_ID']; ?>" 
                                        onclick="onclickassignment(this.id)" 
                                        value="<?php echo $assignment['answer'] ?>">View assignment</button></td>
                        </tr>
                        <?php
                    }
                    ?>
                </table>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6" id="frame">

            </div>
        </div>
    </div>  
</html>
<?php
include_once './footer.php';
?>