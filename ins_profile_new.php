<?php
session_start();
$username = "esraa";
$rate = 50;
$age = 50;
$name = "esraa";
$Qualifications = "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx";
$Experience = "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx";
$languages = "xxxxxx, xxxxxxxxx, xxxxxxxxxx, xxxxxxxxxx";
$programming_language = "php";
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>

        <meta charset="UTF-8">
        <link rel="stylesheet" href="css/instructor_prof.css">
        <link rel="stylesheet" href="css/animate.min.css">
        <link rel="stylesheet" href="css/et-line-font.css">
        <link href='https://fonts.googleapis.com/css?family=Roboto:400,300,500' rel='stylesheet' type='text/css'>

        <meta name="viewport" content="width=device-width"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
          <title><?php echo $_SESSION['fname'].' '.$_SESSION['lname']; ?></title>



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
                                        welcome back,<br> <?php echo  $_SESSION['fname']; ?>                                               
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
                                        <li><a href="#" id="instructor_nav"> Edit information </a></li>                                    
                                        <li> 


                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#mymodeler" id="instructor_navv">Delete account </button>                               


                                            <!-- [ Modal #1 ] -->
                                            <div class="modal fade" id="mymodeler" tabindex="-1">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <button type="button" class="close" data-dismiss="modal"><i class="icon-xs-o-md"></i></button>
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" id="word">&times;</span></button>
                                                            <h4 class="modal-title caps" id="word"><strong>Enter the reason to delete the account</strong></h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="">
                                                                <div class="form-group">
                                                                    <div class="input-group">
                                                                        <input type="text box" class="form-control" placeholder="inter reason..."  id="input" />
                                                                    </div>
                                                                    <button  type="button" class="close" class="btn btn-default" class="btn btn-info" data-toggle="modal" data-target="#mymodeler2" data-dismiss="modal" id="word">submit </button>
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
                                                        <button type="button" class="close" data-dismiss="modal" id="word"><i class="icon-xs-o-md"></i></button>
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" id="word">&times;</span></button>
                                                            <h4 class="modal-title caps" ><strong id="word">information massage</strong></h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <pr id="word">your request has sent to the admin pleas wait a mail</pr>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>




                                            <!-- end .container -->


                                        </li>
                                        <li><a href=" "  id="instructor_nav"> Edit course </a></li> 
                                        <li><a href=" " id="instructor_nav"> view quiz QA </a></li>
                                    </ul>
                                </div>
                            </div> 
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-5 col-sm-5" id="qualification">
                        <div row>
                            <h3>Qualifications:</h3>
                            <?php echo $Qualifications ?> </div>
                        <hr lang="15px" >
                        <div row>
                            <h4>Experience:</h4>
                            <?php echo $Experience ?>
                        </div>
                        <hr>
                        <div row>
                            <h4>languages:</h4>
                            <?php echo $languages ?> 
                        </div>
                        <hr>
                        <div row>
                            <h4>programming language:</h4> 
                            <?php echo $programming_language ?>
                        </div>
                        <hr>
                    </div>
                </div>
            </div>
        </section>







        <!-- Modal -->
        <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Modal Header</h4>
                    </div>
                    <div class="modal-body">
                        <p>Some text in the modal.</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">sent</button>
                    </div>
                </div>

            </div>
        </div>







        <?php
        include_once './footer.php';
        ?>
    </body>
</html>
