<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Notification
 *
 * @author marya
 */

include_once '../Classes/Subject.php';
include_once '../Database/Helper_Queries_DB.php';
class Notification implements Subject{
    //put your code here
    public $notification;
    private $notificationarr;
    public $URL;
    private  $observer = array();
    private $db;
    private static $instance;
    public function __construct(Header $h=NULL) {
        $this->db=new Helper_Queries_DB();
        if ($h) {
            $this->add($h);
        }
    }
    public function add(\Header $observer) {
        $this->observer[] = $observer;
        //print_r($this->observer);
        //$GLOBALS['observer'] = $this->observer ;
        //print_r($GLOBALS['observer']);
    }
  public static function getInstance() {// create only one object for databse 
        if (!self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }
    public function notify() {
     
        foreach ($this->observer as $observer) {
            //print_r($observer);
            $observer->update();
        }
    }

    public function remove(\Header $observer) {
        foreach ($this->observer as $o){
            if($o==$observer){
            
            }
        }
    }
    public function setnotification($usersID) {
//        /print_r($usersID);
        ?>
<script> alert("WELCOME"); </script>
<?php
        $this->db->addnotification($this->notification, $this->URL, $usersID);
        $this->notify();
        ?>
<?php
    }
    public function getnotification($user) {
        
        $this->notificationarr= $this->db->getnotifications($user);
             
        //print_r($this->notificationarr);
        return $this->notificationarr;
        
    }
}
