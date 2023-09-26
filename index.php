<?php
session_start();
unset($_SESSION['index']);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Linkat</title>

        <!--
          css links
        -->
        <link rel="stylesheet" href="css/animate.min.css">
        <link rel="stylesheet" href="css/et-line-font.css">
        <link rel="stylesheet" href="css/HomeCss.css">
        <link href='https://fonts.googleapis.com/css?family=Roboto:400,300,500' rel='stylesheet' type='text/css'>

    </head>
    <?php
    include_once './Header.php';
    include_once './preloader.php';
    ?>    
    <body>

        <!-- home section -->
      
        <section id="home">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <h3>Find your links easily.</h3>
                        <h1>Linkat</h1>
                        <hr>
                        <a href="#users" class="smoothScroll btn btn-danger">1000</a>
                        <a href="#viewers" class="smoothScroll btn btn-default">1500</a>
                        <a href="#" class="smoothScroll btn btn-default">2000</a>
                    </div>
                </div>
            </div>
        </section> 

        <?php
        include_once './footer.php';
        ?>
    </body>
</html>

