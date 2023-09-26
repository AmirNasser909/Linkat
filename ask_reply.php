<?php



/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include_once '../classes/Registered_person.php';
include_once './Header.php';
        include_once './preloader.php';
        session_start();
        $_SESSION['new_questions']=array();
        $_SESSION['newreply']=array();
        $person=new Registered_person();
        $questions = $person->viw_ask_reply();
        
                ?>
<html>
    <head>
        <meta charset="utf-8">
        <title>ask&reply</title>

        <!--
          css links
        -->
         <meta charset="UTF-8">
        
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <link rel="stylesheet" href="css/animate.min.css">
        <link rel="stylesheet" href="css/et-line-font.css">
        <link rel="stylesheet" href="css/ask_reply.css">
        <link href='https://fonts.googleapis.com/css?family=Roboto:400,300,500' rel='stylesheet' type='text/css'>

        <meta name="viewport" content="width=device-width"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
    </head>
    <body>
        
        <div class="container" id="qa">
            
            <h1 id="header"> Public Questions </h1>
            <hr id="hr">
            
            <div class="row">
               
                
                
                
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#mymodeler" id="addquetion">Add Question </button>                               
                                        
                                                                                            
                                                <!-- [ Modal #1 ] -->
                                                <div class="modal fade" id="mymodeler" tabindex="-1">
                                                  <div class="modal-dialog">
                                                   <div class="modal-content">
                                                    <button type="button" class="close" data-dismiss="modal"><i class="icon-xs-o-md"></i></button>
                                                    <div class="modal-header">
                                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" id="word">&times;</span></button>
                                                      <h4 class="modal-title caps" id="word"><strong>Add Question</strong></h4>
                                                    </div>
                                                    <div class="modal-body">
                                                      <div class="form-group">
                                                        <div class="input-group">
                                                           
                                                            <input type="text box" class="form-control" placeholder="inter question..." id="question" />

                                                   </div>

                                                          <button  type="button" class="close" class="btn btn-default" class="btn btn-info" data-toggle="modal" data-dismiss="modal" id="word" onclick="onclickq();">Add</button>

                                                       
                                                        </div>
                                                             
                                                      </div>
                                                   
                                                    </div>

                                                  </div>
                                                </div>

                                             



                                               <!-- end .container -->

                
            </div>
            
            <div id="new_question"></div>
          
            <?php 
    foreach ($questions as $value)
    {
        
    
?>
            <div class="row" id="onequestion">
            
                <table id="table">
                   
                    <tr> 
                        <td><img src="<?php echo  $value['img']; ?>" id="onequestion_img">      </td>
                        <td > <b id="ask_word"><?php echo $value['username']; ?>:=></b>  </td>
                        <td> <b id="ask_word"><?php echo $value['ask'] ?></b> </td>
                        <td > <b id="time"> posted at<?php echo $value['ask_time']; ?></b>  </td>
                    </tr>
                </table>
          
         </div>
        <div class="row" class="replye" >
            <table id="table">
                <?php foreach ($value['replis'] as $value1) {
                      ?>
                    <tr> 
                        <td><img src="<?php echo $value1[0]; ?>" id="replye_img">      </td>
                        <td id="reply_word"> <?php echo $value1['username']; ?>:=> </td>
                        <td id="reply_word"> <?php echo $value1['reply']; ?> </td>
                         <td > <b id="time">posted at <?php echo $value1['reply_time']; ?></b>  </td>
                    </tr>
                    
                <?php } ?>
                    <div id="<?php echo $value['ask_ID']; ?>"></div>
                </table>
            
        </div>
        <div id="$value['ask_ID']" class="replye"></div>
            <div class="row" id="re">
               
               
                         <div class="col-lg-10 col-sm-10 col-md-10">
                         <input type="text box" class="form-control" placeholder="inter reply..." id="addreply<?php echo $value['ask_ID']?>"   />
                         </div>
                        <div class="col-lg-2 col-sm-2 col-md-2">
                            <button type="submit" name="q_id"  id="<?php echo $value['ask_ID']?>" onclick="onclickr(this.id);" > add</button>
                         </div>
                    
             
                
            </div>
            <hr id="hr">
<?php }?>
            
            
        </div>
        
        
        
        
        
        

       <script LANGUAGE="JavaScript">
function onclickq(){
     //   alert('welcome');
var question = $("#question").val();



 $.post('ajax_ask_reply.php', {
    Question  : question
}, function(html) {
//alert(html);
$("#new_question").empty();
$('#new_question').append(html);
});
       


}
function onclickr(id){
      
var reply = $("#addreply"+id).val();
var ask_id=id;

alert(id);
 $.post('ajax_ask_reply.php', {
    reply  : reply,
    ask_id :ask_id
   
}, function(html) {

//alert(html);
$("#"+id).empty();
$('#'+id).append(html);
});
       

}

</script>
        
         <script src="js/jquery.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/smoothscroll.js"></script>
        <script src="js/isotope.js"></script>
        <script src="js/imagesloaded.min.js"></script>
        <script src="js/nivo-lightbox.min.js"></script>
        <script src="js/jquery.backstretch.min.js"></script>
        <script src="js/wow.min.js"></script>
        <script src="js/custom.js"></script>
        
        
        
        
        
        
        <?php
        include_once './footer.php';
        ?>
    </body>
</html>