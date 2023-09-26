<?php
session_start();
include_once '../Classes/Student.php';
include_once '../Classes/assigment.php';
include_once '../Classes/answer.php';
include_once '../Classes/Helper.php';

    $ID=$_SESSION['user_ID'];
    $pl=$_SESSION['pl_ID'];
    // Query database
    $s=new Student($ID);
    $data2 = array();
    $an= new answer();
    $an1= new answer();
    $an2= new answer();
    $an3= new answer();
    $sa=new assigment($an, $an1, $an2, $an3);
        
    $data2=$s->Take_assynments($pl);
    
    $sa->question=$data2['question'];
    $an->answer=$data2['answer1'];
    $an1->answer=$data2['answer2'];
    $an2->answer=$data2['answer3'];
    $an3->answer=$data2['answer4'];
    $an->right=$data2['right'];
// Check user answer for previous question
if (isset($_POST['submit'])) {
    
    // Assign database response to variables
    $selected_radio = $_POST['response'];

    if ($selected_radio == $an->right){
        $help = new Helper();
        $help->Add_poins($ID,$pl);
    }
    else{
        
    }
    
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Quiz</title>
    <link rel="stylesheet" href="../bootstrap-3.3.7-dist/css/bootstrap-theme.min.css" type="text/css"/>
    <link rel="stylesheet" href="../bootstrap-3.3.7-dist/css/bootstrap.css" type="text/css">
    <link rel="stylesheet" href="CSS/font-awesome.min.css" type="text/css"/>
    <link rel="stylesheet" href="../bootstrap-3.3.7-dist/css/bootstrap-theme.css" type="text/css">
    <link rel="stylesheet" href="css/QuizCss.css">
  </head>
  <body>
    <?php
      include_once './Header.php';
      include_once './preloader.php';
    ?>
	<br>

  	<form method ="post" action ="#">
        
            <h1><?=$sa->question?></h1><br>

            <input type="radio" name="response" value="<?=$an->answer?>"><?=$an->answer?><br>

            <input type="radio" name="response" value="<?=$an2->answer?>"><?=$an2->answer?><br>

            <input type="radio" name="response" value="<?=$an3->answer?>"><?=$an3->answer?><br>

            <input type="radio" name="response" value="<?=$an4->answer?>"><?=$an4->answer?><br>

            <Input type = "submit" Name = "submit" Value = "Answer" class="quizbtn btn">
            
            <form method="post" action="Quiz.php">
                <input type="submit" value="Next" name="submit1" class="quizbtn btn" /> 
            </form>
        </form>
    <?php
    include_once './footer.php';
    ?>
  </body>
</html>
