<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of instructor_queries
 *
 * @author esraamedhat
 */
include_once '../Database/DataBase_Class.php';

class instructor_queries {

    //put your code here
    private $DB;

    function __construct() {
        $this->DB = DataBase_Class::getInstance();
    }

    public function selectInstructor($user_ID) {
        $Query = "SELECT * FROM `instructor` WHERE `user_ID` = '$user_ID'";
        $result = $this->DB->database_query($Query);
        $assoc = $this->DB->database_all_assoc($result);
        //print_r($assoc);
        return $assoc;
    }

    public function getCV($USER_id) {
        $CV_QUERY = "SELECT `CV` FROM `instructor` WHERE `user_ID` = '$USER_id'";
        $database_query = $this->DB->get_row($CV_QUERY);
        return $database_query['CV'];
    }

    public function add_new_link(link $link){
      
        $data=array();
        $data['link_ID']=$link->link_id;
        $data['link_URL']=$link->link;
        $data['link_description']=$link->discreption;
        $data['pl']=$link->pl;
        $data['link_type']=$link->type;
        $data['link_language']=$link->language;
        $result= $this->DB->insert('links', $data);
        if($result){
            return TRUE;
        }
       else {
            return FALSE;
 }
    }
    public function delet_link($link_id) {
        $Qu="DELETE FROM `links` WHERE `links`.`link_ID` = $link_id;";
        
        if ($this->DB->database_query($Qu)) {
            return TRUE;
        } else
            return false;
        
    }
    public function remove_question($question_id) {
        
         $Qu="DELETE FROM `assignment` WHERE `assignment`.`assignment_ID` = $question_id;";
         $Qu2="DELETE FROM `assignment_answers` WHERE `assignment_answers`.`assignment` = $question_id;";
     
        if ($this->DB->database_query($Qu2) and $this->DB->database_query($Qu) ) {
            return TRUE;
        } else
            return false;
        
       
    }                
   public function add_q_a(assigment $qa,$instructor_id){
       $data=array();
     $data['instructor_id']=$instructor_id;
     $data['assignment_ID']=$qa->question_id;
        $data['question']=$qa->question;
        $data['allowed_time']=$qa->time;
        $data['pl']=$qa->pl;
        $data['assignment_type']=$qa->assigment_type;
       
        $result= $this->DB->insert('assignment', $data);
        
        if($result){
           $qu= "SELECT * FROM `assignment` WHERE `question` LIKE '$qa->question'";
      //  $qu="SELECT 'assignment_answers' FROM 'assignment' WHERE assignment.assignment_ID='$qa->question';";
        $id=$this->DB->get_row($qu);
        $idd=$id['assignment_ID'];
        
            foreach ($qa->answers as $value){
                    $data2=array();
                    $data2['assignment_answers_ID']=$value->answer_id;
                    $data2['assignment_answers']=$value->answer;
                    $data2['right_answer']=$value->right;
                    $data2['assignment']=$idd;
                  $result2= $this->DB->insert('assignment_answers', $data2);
            }
            if($result2){
       return TRUE;
            }
          else {
                return FALSE;    
            }

        }
          else {
                     return FALSE;
            }

    }
    
    public function add_delete_request($request,$instructor_id){
        

                    $data2['request']=$request;
                    $data2['user_ID']=$instructor_id;
                     $data2['delete_request_ID']=NULL;
                  $result2= $this->DB->insert('delete_request', $data2);
        if($result2){
       return TRUE;
            }
          else {
                return FALSE;    
            }
    }
    
    
   public function edite_q_a(assigment $qa){
       
       $data=array();
     $where=array();
     $where['assignment_ID']=$qa->question_id;
        $data['question']=$qa->question;
        $data['allowed_time']=$qa->time;
        
       
        $result1= $this->DB->update('assignment', $data,$where);
        
            foreach ($qa->answers as $value){
                    $data2=array();
                    $where2['assignment_answers_ID']=$value->answer_id;
                    $data2['assignment_answers']=$value->answer;
                    $data2['right_answer']=$value->right;
                  $result1= $this->DB->update('assignment_assigment', $data,$where2);
            }
            if($result2 and $result1){
       return TRUE;
            }
          else {
                return FALSE;    
            }

        }
        
        public function get_questions($instructor_id){
            $qu= "SELECT * FROM `assignment` WHERE `instructor_id` LIKE $instructor_id";
            $result1=$this->DB->database_query($qu);
            if($result1){
                $result=$this->DB->database_all_array($result1);

                $i=0;
                foreach ($result as $value2){

                 $qu= "SELECT * FROM `assignment_answers` WHERE `assignment` LIKE $value2[0] ";

                $result2=$this->DB->database_all_array($this->DB->database_query($qu));
                array_push($value2, $result2);
                $result[$i]=$value2;
                $i++;
                }
                return$result;
            }
            return $result1;
        }
        public function get_report(){
            $qu= "SELECT * FROM `feedback` ";
            $result1= $this->DB->database_query($qu);
           if($result1){
         $result=$this->DB->database_all_array($result1);
          return $result;
         }
                       return $result1;
            
        }
        
        
        
    public function getregistered($plId) {
        $query = "SELECT `student` FROM `st_pl` WHERE `pl` = '$plId'";
        $dbquery = $this->DB->database_query($query);
        $result = $this->DB->database_all_assoc($dbquery);
       // print_r($result);
        return $result;
    }
    public function Upload_Assignment($ID, $assignment, $pl_ID ) {
        $date = date("Y-m-d H:i:s");
        $Query = "INSERT INTO `assignment` (`instructor`,`question`, `pl`, `allowed_time`,`assignment_type`) VALUES ('$ID','$assignment', '$pl_ID','$date', '3')";
        $database_query = $this->DB->database_query($Query);
        if ($database_query) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
    public function getQuestionID($question) {
        $Query = "SELECT * FROM `assignment` WHERE `question` LIKE '$question'";
         $database_query = $this->DB->database_query($Query);
         $database_all_array = $this->DB->database_all_assoc($database_query);
        // print_r($database_all_array);
         return $database_all_array;
    }
/*3shan lw esm
 * l file d5l marteen by3mlo update
 * msh by7to tany
 */
    public function updateAssignment($question,$assID){
        $Query = "UPDATE `assignment` SET `question` = '$question' WHERE `assignment`.`assignment_ID` = '$assID'";
        $database_query = $this->DB->database_query($Query);
        if ($database_query) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
    public function select_assignments($inst_ID){
        $Query ="SELECT `users`.`fname` , `users`.`lname` , `assignment_upload_answers`.`answer`,`assignment`.`question`,`assignment`.`assignment_ID` FROM `users` , `assignment_upload_answers` , `assignment`WHERE `users`.`user_ID`=`assignment_upload_answers`.`student`AND `assignment`.`assignment_ID`=`assignment_upload_answers`.`question`AND`assignment`.`instructor`='$inst_ID'"; 
         $database_query = $this->DB->database_query($Query);
         //print_r($database_query);
         $database_all_array = $this->DB->database_all_assoc($database_query);
//         /var_dump($database_all_array);
         return $database_all_array;
    }
    public function selectPLname($plID) {
        $query = "SELECT `pl_name` FROM `programming_language` WHERE `pl_ID` = '$plID'";
        $dbquery=$this->DB->database_query($query);
        $result = $this->DB->database_all_assoc($dbquery);
        return $result;
    }
}
