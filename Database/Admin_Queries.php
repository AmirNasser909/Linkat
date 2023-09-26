<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Admin_Queries
 *
 * @author Wael
 */
include_once '../Database/DataBase_Class.php';
include_once '../Classes/programming_language.php';
include_once '../Classes/instructor.php';

class Admin_Queries {
    //put your code here
    private $DB;
    function __construct() {
        $this->DB=DataBase_Class::getInstance();
    }
    public function add_new_user($user){
        $data=array();
        $data['fname']=$user->get_fname();
        $data['lname']=$user->get_lname();
        $data['email']=$user->get_email();
        $data['username']=$user->get_username();
        $data['password']=$user->get_password();
        $data['user_type_id']=$user->get_user_type()->id;
        $result= $this->DB->insert('users', $data);
        if($result){
            return TRUE;
        }
        else {
            return FALSE;
        }
    }
    
    public function Add_course(programming_language $pl){
        $data=array();
        $data['pl_ID']=$pl->id;
        $data['pl_name']=$pl->name;
        $data['pl_description']=$pl->description;
        $this->DB->insert('programming_language', $data);
    }
    public function reject_ins($ins_id){
        $suc=FALSE;
        $qu="DELETE FROM `instructor` WHERE `user_ID` = $ins_id";
        $suc= $this->DB->database_query($qu);
        $qu="DELETE FROM `users` WHERE `user_ID` = $ins_id";
        $suc= $this->DB->database_query($qu);
        return $suc;
        
    }
    public function Accept_ins($ins_id){
        
        $qu="UPDATE `instructor` SET `accepted` = 1 WHERE `user_ID`=$ins_id;";
        return  $this->DB->database_query($qu);
        
    }
    
    public function view_ins_Requests(){
        $ins = new instructor();
        $endval=array();
        $qu="SELECT `user_ID`,`PL`,`CV` FROM `instructor` WHERE `instructor`.`accepted` = 0 LIMIT 1";
        $result= $this->DB->database_all_array($this->DB->database_query($qu));
        if($result)
        {
            $ins->id = $result[0]['user_ID'];
            $ins->cv = $result[0]['CV'];
            $id = $result[0]['PL'];
            $qu="SELECT `pl_name` FROM `programming_language` WHERE `pl_ID` = $id ";
            $result3= $this->DB->database_all_array($this->DB->database_query($qu));
            $ins->pl = $result3[0]['pl_name'];
            $v=$result[0]['user_ID'];
            $qu="SELECT `email`,`fname`,`lname` FROM `users` WHERE `user_ID`=$v";
            $result2= $this->DB->database_all_array($this->DB->database_query($qu));
            $ins->fname=$result2[0]['fname'];
            $ins->email=$result2[0]['email'];
            $ins->lname=$result2[0]['lname'];
            return $ins;
        }
        else {
            return false;
        }
    }
    
    public function delete_ins($ins_id){
        $qu="select `email` FROM `users` WHERE `user_ID` = $ins_id";
        $suc= $this->DB->database_all_array($this->DB->database_query($qu));
        
        $ins = $suc[0]['email'];
        $help = new Helper();
        $help->Send_mail($ins,"Linkat","We are sorry you are Deleted from linkat.");
        
        $qu="DELETE *FROM `instructor` WHERE `user_ID` = $ins_id";
        $this->DB->database_query($qu);
        $qu="DELETE *FROM `users` WHERE `user_ID` = $ins_id";
        return $this->DB->database_query($qu);
        
    }
    
    public function delete_ask_ana_replies($ask_id){
        $qu="DELETE *FROM `ask` WHERE `ask_ID` = $ask_id";
        $this->DB->database_query($qu);
    }
    
    public function add_ins(instructor $ins){
        $data=array();
        $data['fname']=$ins->fname;
        $data['email']=$ins->email;
        $data['lname']=$ins->lname;
        $data['password']="123456789";
        $data['type']=3;
        $username = explode("@", $ins->email);
        $data['username']=$username[0];
        $data['status']=0;
        $this->DB->insert('users', $data);
        
        $data2=array();
        
        
        $qu="SELECT `user_ID` FROM `users` WHERE `email`='$ins->email'";
        $data2['user_ID']=$this->DB->database_all_array($this->DB->database_query($qu))[0]['user_ID'];
        
        $qu="SELECT `pl_ID` FROM `programming_language` WHERE `pl_name`='$ins->pl' ";
        $data2['pl']=$this->DB->database_all_array($this->DB->database_query($qu))[0]['pl_ID'];
    
        $data2['accepted']=1;
        $data2['CV']=$ins->cv;
        $result =  $this->DB->insert('instructor', $data2);
        
    return $result;
        
    }
    
    
    
    
     public function overall (){
        $f_result=array('num_student'=>0,'num_instructor'=>0,'num_course'=>0,'num_feedback'=>0);
        
      $qu=" SELECT COUNT(*) FROM `users` WHERE `users`.`type` = 2";
       $f_result['num_student']=$this->DB->database_all_array($this->DB->database_query($qu))[0][0];
       
      $qu=" SELECT COUNT(*) FROM `users` WHERE `users`.`type` = 3";
       $f_result['num_instructor']=$this->DB->database_all_array($this->DB->database_query($qu))[0][0];
    
       $qu=" SELECT COUNT(*) FROM `programming_language`";
       $f_result['num_course']=$this->DB->database_all_array($this->DB->database_query($qu))[0][0];
    
       $qu=" SELECT COUNT(*) FROM `feedback`";
       $f_result['num_feedback']=$this->DB->database_all_array($this->DB->database_query($qu))[0][0];
    
      return $f_result ;
    }
     
    public function getusername($user_id){
        $qu= "SELECT `username`  FROM `users` WHERE `user_ID`= $user_id;";
         $result1=$this->DB->database_query($qu);
         if($result1){
         $result=$this->DB->database_all_array($result1);
          return $result[0][0];
         }
         
                       return $result1;
    }

        public function getfeedback(){

        $qu= "SELECT `feedbacktime`,`feedback`,`user_ID` FROM `feedback` ;";
             $result1=$this->DB->database_query($qu);
         if($result1){
         $result=$this->DB->database_all_array($result1);
          return $result;
         }
         
                       return $result1;
        
    }

        public function student_pl ($st_id){
       
     $qu= "SELECT `pl`,`points` FROM `st_pL`  WHERE `student`=$st_id ;";
             $result1=$this->DB->database_query($qu);
         if($result1){
         $result=$this->DB->database_all_array($result1);
          return $result;
         }
         
                       return $result1;
     }
      public function student_table (){
       
         $qu= "SELECT `username`,`user_ID` FROM `users` WHERE `type` =2;";
             $result1=$this->DB->database_query($qu);
         if($result1){
         $result=$this->DB->database_all_array($result1);
          return $result;
         }
         
                       return $result1;
     }
       public function pl_table ($pl_id){
       
         $qu= "SELECT `pl_name`  FROM `programming_language` WHERE `pl_ID`= $pl_id;";
         $result1=$this->DB->database_query($qu);
         if($result1){
         $result=$this->DB->database_all_array($result1);
          return $result[0][0];
         }
         
                       return $result1;
     }
         
                     
      public function instructor_pl ($pl_id){
          $qu= "SELECT `user_ID` FROM `instructor` WHERE `accepted` = 1 AND `pl`= $pl_id;";
             $result1=$this->DB->database_query($qu);
         if($result1){
         $result=$this->DB->database_all_array($result1);
          return $result;
         }
         
                       return $result1;
      }
      public function get_pls(){
           $qu= "SELECT `pl_name`,`pl_ID` FROM `programming_language`;";
             $result1=$this->DB->database_query($qu);
         if($result1){
         $result=$this->DB->database_all_array($result1);
          return $result;
         }
                return $result1;
      
      }
}
