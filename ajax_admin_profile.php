<?php 
include_once '../Classes/Admin.php';



?>

<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php if(isset($_POST['nav'])){ ?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        // put your code here
        ?>
    </body>
</html>
<?php }  ?>
<?php if(isset($_POST['report'])){ 
    
    $admin =new Admin();
    $report=$admin->get_report($_POST['report']);
    
    ?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
                <body>
                    
                            <?php if($_POST['report']=="o"){
                                

                            ?>
                    
                            <legend class="l1"><strong>overall Report</strong></legend>

                            <table style="display: table;width: 100%;">
                                <tr>
                                    <th>number of student</th>
                                    <th>number of instructor</th>
                                    <th>number of course</th>
                                    <th>number of feedback</th>
                                </tr>
                                 <tr>
                                    <td><?php echo $report['num_student']; ?></td>
                                    <td><?php echo $report['num_instructor']; ?></td>
                                    <td><?php echo $report['num_course']; ?></td>
                                    <td><?php echo $report['num_feedback']; ?></td>
                                </tr>
                            </table>
                  


                    <?php }?>

                    
                    
                    
                    
                             <?php if($_POST['report']=="s"){

                                foreach ($report as $value){
                                 ?>
                    <div id="<?php echo $value['user_id'];?>"  style="margin-top: 20px;">
                    <table style="display: table;width: 100%;">
                        
                         <tr>
                             <th><?php echo $value['username'];?></th>
                             <th style="display: table-cell;  text-align:right;"><button id="<?php echo $value['user_id'];?>" onclick="del(this.id);">Delete</button></th>
                            
                        </tr>
                        <?php
                        foreach($value['pl'] as $pl){
                        ?>
                         <tr>
                            <td style="display: table-cell;  text-align:left;"><?php echo $pl['pl_name']; ?></td>
                            <td><?php echo $pl['points']; ?></td>
                        </tr> 
                        <?php
                        }
                        ?>
                    </table>
                    
                        </div>
                            <hr>

                                <?php }}?>

                    
                    
                    
                    
                    
                    


                            
                    <?php if($_POST['report']=="i"){
     
                           foreach($report as $value){
                            ?>
                    <div  style="margin-top: 20px;">
                        <table style="display: table;width: 100%;">
                        
                         <tr>
                             <th style="display: table-cell; column-span: 2; text-align:left;"><?php echo $value['pl_name'];?></th>
                             
                        </tr>
                        <?php
                        foreach($value['instructor'] as $ins){
                        ?>
                        <tr id="<?php echo $ins['inst_id'];?>">
                            <td><?php echo $ins['inst_name']; ?></td>
                            <td><button id="<?php echo $ins['inst_id']; ?>" onclick="del(this.id);">delete</button></td>
                        </tr> 
                        <?php
                        }
                        ?>
                    </table>
                    
                        </div>


                    <?php }}?>
                    
                    
                    
                    
                    <?php if ($_POST['report']=="f") {          ?>
                    <table>
                        
                        
                <?php
                    foreach ($report as $value){
                
                ?>
                        <tr>
                            <td><?php echo $value['username']; ?> </td>
                            <td><?php echo $value['feedbacktime']; ?> </td>
                            
                        </tr>
                        <tr> 
                            <td> <?php echo $value['feedback']; ?> </td>
                        </tr>
                        
                    </table>
                    
                    
                    
                    
                    <?php     }}?>
                    
                </body>
</html>
<?php }  ?>

<?php
if(isset($_POST['del'])){
    $admin=new Admin();
    $admin->Delete_ins($_POST['del']);
    
    
    
    
}

?>





<?php
if(isset($_POST['report_nav'])){
   
  ?>  
    
<html>
    
    <table>
        <tr>
        <td><button id="o" onclick="get_report(this.id);"> Over All</button></td>
        <td><button id="s" onclick="get_report(this.id);">Students</button></td>
        <td><button id="i" onclick="get_report(this.id);">instructors</button></td>
        <td><button id="f" onclick="get_report(this.id);">feedback</button></td>
        
        </tr>
    </table>
    
    
</html> 
    
<?php }

?>







