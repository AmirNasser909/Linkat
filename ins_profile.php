<?php
session_start();
include_once '../Classes/instructor.php';
include_once '../Classes/Person.php';
$person = new Person();
$instructor = new instructor();
$cv = $instructor->getCV($_SESSION['user_ID']);
$instructor->setvalues($_SESSION['user_ID']);

// print_r($_SESSION);
//print_r($cv);
$rate = 50;
?>

<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>

        <meta charset="UTF-8">
        <link rel="stylesheet" href="css/style.css"/>
        <link rel="stylesheet" href="css/instructor_prof.css">
        <link href='https://fonts.googleapis.com/css?family=Roboto:400,300,500' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="../bootstrap-3.3.7-dist/css/bootstrap.min.css">
        <script src="../View/JS/jquery-3.2.0.min.js"></script>
        <meta name="viewport" content="width=device-width"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?php echo $_SESSION['fname'] . ' ' . $_SESSION['lname']; ?></title>

        <script>
            function resizeIframe(obj) {
                obj.style.height = obj.contentWindow.document.body.scrollHeight + 'px';
            }
        </script>
    </head>
    <body >

        <?php
        include_once './Header.php';
        include_once './preloader.php';
        ?>
        <section id="instructorprofile">
            <div class="container " >

                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6">                   
                        <div class="col-lg-12 col-sm-12 col-md-12" id="p_data">
                            <table id="t_data" >                      
                                <tr>
                                    <td > <img src="images/student profilhhe.jpg"  width="70px" id="p_img"/></td>
                                    <td id="r_data">
                                        welcome back,<br> <?php echo $_SESSION['fname']; ?>                                               
                                    </td>
                                </tr>
                            </table>
                            <div class="row" id="rate">
                                <div class="col-lg-6 col-md-5 col-sm-5">
                                    <h4> Rate </h4>
                                    <progress value=<?php echo $rate ?> max="100"></progress> 
                                </div>
                            </div>
                            <div class="row">  
                                <div class="col-lg-12 col-sm-12 col-md-12">
                                    <ul  class="nav navbar-nav navbar-collapse" id="instructor_nav">
                                        <li><button 
                                            type="button" 
                                            class="btn btn-primary" 
                                            data-toggle="modal" 
                                            data-target="#mymodeler"
                                            id="instructor_navv">Delete account </button>  
                                        </li>
                                        <!-- [ Modal #1 delete request ] -->
                                        <div class="modal fade"
                                             id="mymodeler" 
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
                                                            aria-label="Close"
                                                            >
                                                            <span aria-hidden="true" id="word">&times;</span>
                                                        </button>
                                                        <h4 
                                                            class="modal-title caps" 
                                                            id="word">
                                                            <strong>Enter the reason to delete the account</strong>
                                                        </h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="#" method="post">
                                                            <div class="form-group">
                                                                <div class="input-group">
                                                                    <input 
                                                                        type="text box"
                                                                        class="form-control"
                                                                        placeholder="Enter reason..."  
                                                                        id="input" 
                                                                        required
                                                                        />
                                                                </div>
                                                                <input  
                                                                    type="submit" 
                                                                    name="reasonbtn" 
                                                                    class="close" 
                                                                    class="btn btn-default" 
                                                                    class="btn btn-info" 
                                                                    data-toggle="modal" 
                                                                    data-target="#mymodeler2" 
                                                                    data-dismiss="modal" 
                                                                    id="word" 
                                                                    value="submit"/>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>  
                                            </div>
                                        </div>

                                        <!-- [ Modal #2 ] -->
                                        <div class="modal fade" id="mymodeler2" tabindex="-1">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <button 
                                                        type="button" 
                                                        class="close" 
                                                        data-dismiss="modal" 
                                                        id="word">
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
                                                        <h4 class="modal-title caps" >
                                                            <strong id="word">Information message</strong>
                                                        </h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <pr id="word">
                                                            Your request has sent to the admin please wait for a mail
                                                        </pr>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <li><button 
                                            type="button"
                                            class="btn btn-primary" 
                                            data-toggle="modal" 
                                            data-target="#mymodelerupload1" 
                                            id="instructor_navv">
                                            Upload assignment 
                                            </button>          
                                        </li>                     


                                        <!-- [ Modal #1 assignment uploaded ] -->
                                        <div class="modal fade" 
                                             id="mymodelerupload1" 
                                             tabindex="-1"                                             >
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
                                                            <div class="form-group">
                                                                <input
                                                                    type="file" 
                                                                    name="assignment"
                                                                    class="form-control"  
                                                                    id="inputfile"
                                                                    required />
                                                                <input 
                                                                    type="submit"
                                                                    name="uploadass" 
                                                                    class="btn btn-default" 
                                                                    class="btn btn-info" 
                                                                    data-toggle="modal"  
                                                                    id="word" 
                                                                    value="Upload assignment"/> 
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>  
                                            </div>
                                        </div>

                                        <!-- [ Modal #2 ] -->
                                        <div class="modal fade" id="mymodelerupload" tabindex="-1">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <button type="button" class="close" data-dismiss="modal" id="word"><i class="icon-xs-o-md"></i></button>
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" id="word">&times;</span></button>
                                                        <h4 class="modal-title caps" ><strong id="word">Upload success</strong></h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <pr id="word">The assignment is successfully uploaded!</pr>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>  
                                        <li><a href=" "  id="instructor_nav"> Edit course </a></li> 
                                        <li><a href=" " id="instructor_nav"> view quiz QA </a></li>
                                        <li><a href="ins_assignments.php" id="instructor_nav" >View assignments</a></li>
                                    </ul>
                                </div>
                            </div> 
                            <?php
                            if (isset($_POST['uploadass'])) {
                                $filename = $_FILES['assignment']['tmp_name'];
                                $actualfile_name = $_FILES['assignment']['name'];
                                $size = $_FILES['assignment']['size'];
                                $type = $_FILES['assignment']['type'];
                                $error = $_FILES['assignment']['error'];
                                if ($error === 0) {
                                    $filepath = $instructor->Upload_Assignment($filename, $size, $actualfile_name);
                                    if ($filepath) {
                                        ?>   
                                        <div id="r_data" style="margin-top: 50px">
                                            <h2 class="capitalize">Success uploading <?php echo "$actualfile_name"; ?>!</h2>
                                        </div>

                                        <?php
                                    } else {
                                       ?>   
                                        <div id="r_data" style="margin-top: 50px">
                                            <h2 class="capitalize">Success updating <?php echo "$actualfile_name"; ?>!</h2>
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
                            }
                            ?>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-5 col-sm-5" id="qualification">
                        <div class="row">
                            <div class="login-box animated fadeInUp" style="position: inherit;max-width: inherit">
                                <div class="box-header">
                                    <h2 >CV
                                        <a href="<?php echo "$cv"; ?> " download="">
                                            <span class="glyphicon glyphicon-download">                                                
                                            </span>
                                        </a>
                                    </h2>
                                </div>
                                <iframe src=<?php echo "$cv"; ?> frameborder="0" scrolling="no" style="text-align: -webkit-center" onload="resizeIframe(this)"></iframe>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>

        <?php
        include_once './footer.php';
        ?>
    </body>
</html>
