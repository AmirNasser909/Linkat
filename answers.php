<?php
session_start();
include_once '../Classes/Student.php';
include_once '../Classes/assigment.php';
include_once '../Classes/answer.php';
include_once '../Classes/Helper.php';

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
        
            <h1><?=$question?></h1><br>

            <h1><?=$right?></h1><br>
            
            <form method="post" action="Quiz.php">
                <input type="submit" value="Next" name="submit1" class="quizbtn btn" /> 
            </form>
        </form>
    <?php
    include_once './footer.php';
    ?>
  </body>
</html>
