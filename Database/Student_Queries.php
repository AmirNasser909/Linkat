<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Student_queries
 *
 * @author marya
 */
include_once '../Database/DataBase_Class.php';
class Student_queries {
    //put your code here
    private $db;
    private static $instance;
    public function __construct() {
        $this->db= DataBase_Class::getInstance();
    }
     public static function getInstance() {// create only one object for databse 
        if (!self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function isRegistered($st_ID,$pl_ID) {
        $Query = "SELECT * FROM `st_pl` WHERE `student` = '$st_ID' AND `pl` = '$pl_ID'";
        $result = $this->db->get_row($Query); 
        return $result;
    }
    public function register_course($st_ID,$pl_ID) {
       // $Query = "INSERT INTO `st_pl` ( `student`, `pl`) VALUES ('$st_ID', '$pl_ID')";
        $data=array();
        $data['student']=$st_ID;
        $data['pl']=$pl_ID;
        $result = $this->db->insert("st_pl",$data);
        return $result;        
    }
    public function getRegisteredCourses($st_ID) {
        $Query = "SELECT `pl_ID` ,`pl_name`,`pl_description`,`points`,`no_competitions`,`no_quiz` FROM `programming_language` LEFT JOIN `st_pl` ON `programming_language`.`pl_ID` = `st_pl`.`pl` WHERE `st_pl`.`student`='$st_ID'";
       $result = $this->db->database_query($Query);
        $assoc = $this->db->database_all_assoc($result);
        return $assoc;
    }
    public function Upload_Assignment($assignment,$st,$question){
      //  echo $st." ". $assignment." ".$question;
        // $Query = "INSERT INTO `assignment_upload_answers` (`student`, `question`, `answer`) VALUES('$st', '$question', '$assignment');";
        $data=array();
         $data['student']=$st;
         $data['question']=$question;
         $data['answer']=$assignment;
         $database_query = $this->db->insert("assignment_upload_answers",$data);
         var_dump($database_query);
    return $database_query;
     }
     
      public function set_ask(ask $as){
        			

        $data=array();
        $data['ask_ID']=$as->ask_id;
        $data['ask_time']= date("Y-m-d H:i:s");
        $data['ask']=$as->ask;
        $data['user_ID']=$as->user_id;
        $result= $this->db->insert('ask', $data);
        if($result){
            $qu="SELECT `ask_ID` FROM `ask` WHERE `ask`='$as->ask';";
            $result= $this->db->database_query($qu);
            $result= $this->db->database_all_assoc($result);
            return $result[0]['ask_ID'];
        }
       else {
            return FALSE;
 }
        
    }
     
     
     
     
     
     
     
     
}
