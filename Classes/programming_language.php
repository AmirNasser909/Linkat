<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of programming_language
 *
 * @author esraamedhat
 */
include_once '../Database/Helper_Queries_DB.php';

class programming_language {

    //put your code here    
    private $id;
    private $name;
    private $description;
    private $user;
private static $instance;
    public function __construct() {
        $this->user = new Helper_Queries_DB();
    }
     public static function getInstance() {// create only one object for databse 
        if (!self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }

  public function setvalues($id,$name,$description=""){
        $this->user = new Helper_Queries_DB();
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        //echo $this->id . " " . $this->name." ".$this->description;
        
  }
  public function getID() {
      return $this->id;
  }
    public function get_all_courses() {
        $pl = $this->user->get_all_courses();
        return $pl;
    }
 public function getassignments(){
     $assignments = $this->user->getassignments($this->id);
     return $assignments;
 }
}
