<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Person
 *
 * @author marya
 */
include_once '../Database/User_Queries.php';

class Person {
    public $id;
    public $fname;
    public $lname;
    public $email;
    public $username;
    public $password;
    public $user_type;
    public $IP;
    public $User_type;
    public $notif;
    private $user;

    public function __construct() {
        $this->user = new User_Queries();
    }
    public function set_id($id) {
        $this->id = $id;
    }
    public function set_username($email) {
        $username_exp = explode("@", $email);
        $this->username = $username_exp[0];
        //print_r($username_exp);
    }
    public function getUsername() {
        return $this->username;
    }

    function Login($username, $password){
        print_r($username);
        if (strstr($username, "@")) {
            $user_data = ($this->user->get_user_by_email_password($username, $password));
        } else {
            //print_r($username);
            //print_r($password);
            $user_data = ( $this->user->get_user_by_username_password($username, $password));
        }
        if ($user_data) {
            $this->id = $user_data['user_ID'];
            $this->fname = $user_data['fname'];
            $this->lname = $user_data['lname'];
            $this->email = $user_data['email'];
            $this->password = $user_data['password'];
            $this->username = $user_data['username']; 
            session_start();
            $_SESSION['user_ID'] = $user_data['user_ID'];
            $_SESSION['fname'] = $user_data['fname'];
            $_SESSION['lname'] = $user_data['lname'];
            $_SESSION['type'] = $user_data['type'];
           // print_r($_SESSION);
           
            return TRUE;
        }
    }


   public function logout(){
            if(isset($_SESSION['user_ID'])){
                unset($_SESSION);
                header("location: index.php");
            }
        }
 

    public function Upload_File($filename,  $size, $actualfile_name) {
              
            $path = "../uploads/" . $actualfile_name;
            while (file_exists($path)) {
                $actualfile = explode(".", $actualfile_name);
               // print_r($actualfile);
                $actualfile_name = $actualfile[0] . "(1).".$actualfile[1];
                //print_r($actualfile_name);
                $path = "../uploads/" . $actualfile_name;
                            }
            move_uploaded_file($filename, $path);
            return $path;
        
    }
}
