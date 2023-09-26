<?php
session_start();
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
        <link rel="stylesheet" href="css/Admin_prof.css">
        <link href='https://fonts.googleapis.com/css?family=Roboto:400,300,500' rel='stylesheet' type='text/css'>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
        <script src="../View/JS/jquery-3.2.0.min.js"></script> 

        <meta name="viewport" content="width=device-width"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?php echo $_SESSION['fname'] . " " . $_SESSION['lname']; ?></title>
    </head>
    <body >
        <?php
        include_once './Header.php';
        include_once './preloader.php';
        ?>
        <section id="adminprofile">
            <div class="container">
                <div class="row" >
                    <div class="col-lg-12 col-sm-12 col-md-12">
                        <div class="col-lg-12 col-sm-12 col-md-12" id="p_data">
                            <table id="t_data" >
                                <tr>
                                    <td > <img src="images/student profilhhe.jpg"  width="70px" id="p_img"/></td>
                                    <td id="r_data">
                                        welcome back,<br> <?php echo $_SESSION['fname']; ?>
                                    </td>
                                </tr>
                            </table>
                            <div class="row">
                                <div class="col-lg-12 col-sm-12 col-md-12" >
                                            <table class="nav navbar-nav navbar-collapse" id="admin_na"> <tr>
                                                    
                                                    <td><button id="admin_nav" onclick="report_nav();"> Get Report </button>   </td>
                                                    <td><a href="#"  id="admin_nav"> Show courses </a>   </td>
                                                    <td><a href="#"  id="admin_nav"> Show Instructor requests </a>   </td>
                                                    <td><a href="addInstructor.php" id="admin_nav">Add instructor</a>   </td>
                                        </tr>   </table>
                                    
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-lg-12 col-sm-12 col-md-12" id="report_nav"></div>
                        
                        
                        
                    </div>
                </div>
                <div></div>
                <div class="row" style="background: white; color: #2dc291;">
                    <fieldset>
                        <legend id="nav" > </legend>
                        <div class="col-lg-12 col-md-12 col-sm-12" id="report" >
                            
                            
                        </div>
                        
                        
                    </fieldset>
                    
                    
                </div>
            </div>
        </section>
        
        <script LANGUAGE="JavaScript">
function get_report(re){
     //   alert('welcome');'
     var report=re;
 $.post('ajax_admin_profile.php', {
   report:report
}, function(html) {
//alert(html);
$("#report").empty();
$('#report').append(html);
});
       


}


function del(id){
      
var del=id;


 $.post('ajax_admin_profile.php', {
    del  : del
   
}, function(html) {

//alert(html);
$("#"+id).empty();
$("#"+id).append(html);
});
       

}



function report_nav(){
 var report_nav="report";


 $.post('ajax_admin_profile.php', {
    report_nav  : report_nav
   
}, function(html) {

//alert(html);
$("#nav").empty();
$("#nav").append(html);
});
       

}


  </script>      
        
        
        
        
        
        <?php
        include_once './footer.php';
        ?>
    </body>
</html>
