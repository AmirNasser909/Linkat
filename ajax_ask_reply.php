<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Ajax_Studen_assignment
 *
 */

include_once '../Classes/ask.php';
include_once '../Classes/Student.php';
include_once '../Classes/reply.php';
include_once '../Classes/Registered_person.php';

error_reporting(E_ERROR);
session_start();
$_SESSION['user_ID']=295;
$_SESSION['img']=NULL;
 if(isset($_POST['Question'])) {
$ask=new ask();
    $ask->ask=$_POST['Question'];
   $ask->user_id= $_SESSION['user_ID'];
   $student=new student();
   $result=$student->ask($ask);
if($result){
    $val=array();
$val['question']=$_POST['Question'];
$val['question_id']=$result;
 $_SESSION['new_questions'];
 array_push($_SESSION['new_questions'], $val);

 
//put your code here?>

<html>
    <head>
        <meta charset="UTF-8">
         <script src="../View/JS/jquery-3.2.0.min.js"></script>
                <link rel="stylesheet" href="../bootstrap-3.3.7-dist/css/bootstrap.min.css">
        <title></title>
    </head>
    <body>
        <?php
        // put your code here
        ?>
                   <?php 
       
    foreach ($_SESSION['new_questions'] as $value)
    {
        
    
?>
            <div class="row" id="onequestion">
            
                <table id="table">
                   
                    <tr> 
                        <td><img src="<?php echo  $_SESSION['img']; ?>" id="onequestion_img">      </td>
                        <td > <b id="ask_word"><?php echo $_SESSION['username']; ?>:=></b>  </td>
                        <td> <b id="ask_word"><?php echo $value['question'] ?></b> </td>
                        <td > <b id="time"> posted at<?php echo date("Y-m-d H-i-s"); ?></b>  </td>
                    </tr>
                </table>
          
         </div>
        <div id="<?php echo $value['question_id'];?>" class="row" class="replye" >
            <table id="table">
               <?php
                  foreach ($_SESSION['newreply'] as $value){
                      if ($value['question_id']==$result){
               ?>
                
                <tr>
             <td><img src="<?php echo $_SESSION['img']; ?>" id="replye_img">      </td>
                        <td id="reply_word"> <?php echo $_SESSION['username']; ?>:=> </td>
                        <td id="reply_word"> <?php echo $value['reply']; ?> </td>
                         <td > <b id="time">posted at <?php echo date("Y-m-d H-i-s"); ?></b>  </td>
                         </tr>
                         <?php
                  }}
                         ?>
                    
                    
                    
                    
                    
                </table>
            
        </div>
         <div id="<?php echo $value['question_id'];?>" class="replye"></div>
            <div class="row" id="re">
               
               
                         <div class="col-lg-10 col-sm-10 col-md-10">
                         <input type="text box" class="form-control" placeholder="inter reply..." id="addreply<?php echo $value['question_id'];?>"   />
                         </div>
                        <div class="col-lg-2 col-sm-2 col-md-2">
                            <button type="submit" name="q_id"  id="<?php echo $value['question_id'];?>" onclick="onclickr(this.id);" > add</button>
                         </div>
                    
             
                
            </div>
            <hr id="hr">
<?php }?>
            
    </body>
</html>
<?php }
 else {
     ?>
   
    <script LANGUAGE="JavaScript">
        
        alert('ther is another question like that');
        </script>
       
        
        
        <?php
 }}
if($_POST['reply']){
    $person =new Registered_person();
    $reply=new reply ();
    $reply->ask_ID=$_POST['ask_id'];
    $reply->reply=$_POST['reply'];
    $reply->user_ID=$_SESSION['user_ID'];
    
    $result=$person->reply( $reply);
    if($result){
    $val['ask_id']=$_POST['ask_id'];
    $val['reply']=$_POST['reply'];
    array_push($_SESSION['newreply'], $val);
   
   ?>
        <html>
            
            <table id="table">
               <?php
                  foreach ($_SESSION['newreply'] as $value){
                      if ($value['ask_id']==$_POST['ask_id']){
               ?>
                
                <tr>
             <td><img src="<?php echo $_SESSION['img']; ?>" id="replye_img">      </td>
                        <td id="reply_word"> <?php echo $_SESSION['username']; ?>:=> </td>
                        <td id="reply_word"> <?php echo $value['reply']; ?> </td>
                         <td > <b id="time">posted at <?php echo date("Y-m-d H-i-s"); ?></b>  </td>
                         </tr>
                         <?php
    }}}
    else{
    echo 'som thing went wrong';
    }
                         ?>
                         
                         
                         
                         
                         
            </table>
        </html>
        
        
        
        
        
        
        
<?php    
}

?>