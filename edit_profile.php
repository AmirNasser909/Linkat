<?php
session_start();
include_once './preloader.php';
include_once './Header.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<head>
    <title>Edit profile</title>
    <meta charset="utf-8">
    <title>Register</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="JS/login.js"></script>
    <script src="JS/rejisterpasswordvalidate.js"></script>
</head>

<body>
    <?php
    if(isset($_SESSION['user_ID'])){
        if(isset($_GET['edit'])){
            ?>
            <section id="Edit">
        <div class="container">
            <div class="top">

            </div>
            <div class="login-box animated fadeInUp">
                <div class="box-header">
                    <h2>Edit profile</h2>  
                </div>
                <form action="#" method="post">
                
                    <label for="profilepicture">Choose new profile picture :</label>     
                    <input type="file" name="profilepic">
                    <br>
                    <input  type="submit" id="editbtn" name="editbtn" value="Done">
                </form>
            </div>
        </div>
    </section>
                    <?php
        }
        else{
    ?>
    <section id="Edit">
        <div class="container">
            <div class="top">

            </div>
            <div class="login-box animated fadeInUp">
                <div class="box-header">
                    <h2>Edit profile</h2>  
                </div>
                <form action="#" method="post">
                    <input type="text" id="firstname" name="firstname" placeholder="<?php echo $_SESSION['fname']; ?>" >
                    <br>
                    <input type="text" id="lastname" name="lastname" placeholder="<?php echo $_SESSION['lname']; ?>" >
                    <br>
                    <input type="password" id="password1" name="password" placeholder="Password" >                                       
                    <p id="validate-length" style="color: black ;display: none"></p>
                    <br>
                    <input type="password" id="password2" name="passwordcheck" placeholder="Retype password" >
                    <br/> 
                    <p id="validate-status" ></p>
                    <br>
                    <label for="profilepicture">Choose new profile picture :</label>     
                    <input type="file" name="profilepic">
                    <br>
                    <input  type="submit" id="editbtn" name="editbtn" value="Done">
                </form>
            </div>
        </div>
    </section>
    <?php
    }
        }
    include_once './footer.php';
    ?>
</body>