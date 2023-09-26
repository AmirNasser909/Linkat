<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

if (isset($_POST['ass'])) {
    //print_r($_POST);
    ?>
    <head>

    </head>

    <a href="<?php echo $_POST['ass']; ?> " download="">
        <span class="glyphicon glyphicon-download">                                                
        </span>
    </a>

    <iframe src="<?php echo $_POST['ass']; ?>" frameborder="0" scrolling="no" style="text-align: -webkit-center" onload="resizeIframe(this)"></iframe>


    <?php
}