<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of aboutus
 *
 * @author marya
 */
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Linkat Team</title>

        <!--
          css links
        -->
        <link rel="stylesheet" href="css/rate.css">
        <link href='https://fonts.googleapis.com/css?family=Roboto:400,300,500' rel='stylesheet' type='text/css'>
    </head>
    <body>
        <?php
        include_once './Header.php';
        include_once './preloader.php';
        ?>
        <br><br><br><br><br>
        <h1 style="text-align: center">Sorry you don't have any Questions</h1>
        <br><br><br><br>
        <span class="rating">
        <span class="star filled"></span>
        <span class="star filled"></span>
        <span class="star"></span>
        <span class="star"></span>
        <span class="star"></span>
        </span>
        
        <?php
        include_once './footer.php';
        ?>
    </body>
</html>
