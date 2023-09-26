<?php
include_once '../Classes/Person.php';
include_once '../Database/User_Queries.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Guest
 *
 * @author marya
 */
class Guest extends Person{
    //put your code here
     public function __construct() {
         parent::__construct();
        $this->user = new User_Queries();
    }
        public function Register($fname, $lname, $email, $password) {
            $this->set_username($email);
            $result = $this->user->register($fname, $lname, $this->getUsername(), $email, $password);
        
            if ($result) {            
            $login = $this->Login($email, $password);
           if($login){
               header("Location:edit_profile.php?edit=1?");
           }
            return TRUE;
        } else {
            return FALSE;
        }
    }
       public function beInstructor($fname, $lname, $email, $pl, $CV_path) {
        $this->set_username($email);
        $result = $this->user->beInstructor($fname, $lname, $this->getUsername(), $email, $pl, $CV_path);
        if ($result) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
}
