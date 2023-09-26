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
        <link rel="stylesheet" href="css/aboutus.css">
        <link href='https://fonts.googleapis.com/css?family=Roboto:400,300,500' rel='stylesheet' type='text/css'>
    </head>
    <body>
        <?php
        include_once './Header.php';
        include_once './preloader.php';
        ?>

        <!-- about section -->
        <section id="about">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 text-center">
                        <div class="section-title">
                            <h1 class="heading bold">Linkat</h1>
                            <hr>
                        </div>
                    </div>

                    <div class="col-md-6 col-sm-12">
                        <h3 class="bold">Linkat </h3>
                        <h1 class="heading bold">Designed to help you learn easily</h1>
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="active"><a href="#design" aria-controls="design" role="tab" data-toggle="tab">Design</a></li>

                            <li><a href="#social" aria-controls="social" role="tab" data-toggle="tab">Social</a></li>
                        </ul>
                        <!-- tab panes -->
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="design">
                                <p>Linkat was basically designed to help students find online courses/references to learn.</p>
                                <p>It's also supported with some quizzes for practice</p>
                            </div>

                            <div role="tabpanel" class="tab-pane" id="social">
                                <p>Linkat aims to raise the social connection between students and instructors through questions and answers</p>
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
