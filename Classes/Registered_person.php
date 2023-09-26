<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Registered_person
 *
 * @author marya
 */
include_once '../Classes/Person.php';
include_once '../Database/User_Queries.php';
class Registered_person extends Person {
    public $query;
    function __construct() {
        parent::__construct();
        $this->query=new User_Queries();
    }

    public function logout(){
          
            if(isset($_SESSION['user_ID'])){              
                $user = new User_Queries();
                $user->logout($_SESSION['user_ID']);
                unset($_SESSION['fname']);
                unset( $_SESSION['type']);
                header("location: ../View/index.php");
            }
        }
  public function reply(reply $re){
         $result=$this->query->set_reply($re);
           if($result){
               return TRUE;
           }
            else {
                return FALSE;
            }
       }
       public function viw_ask_reply() {
          
          $question=array();
         $one_qa=array();
         $i=0;
          $asks= $this->query->get_ask();
         
          foreach ($asks as $value) {
              $value['username']= $this->query->get_username($value['user_ID']);
              $value['img']= $this->query->get_img($value['user_ID']);
              $value['replis']=$this->query->get_reply($value['ask_ID']);
              $one_qa[$i]=$value;
              $i++;
          }
          
          return $one_qa;
           
       }
}

