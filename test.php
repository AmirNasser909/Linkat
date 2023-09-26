<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
unset($_SESSION);
?>

<html>
    <form action="#" method="post" enctype="multipart/form-data">
        <input type="file" name="test" >
        <?php
        if(isset($_POST['test'])){
            print_r($_FILES);
        }
        ?>
    </form>
</html>