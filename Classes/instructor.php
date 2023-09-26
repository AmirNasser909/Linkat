<?php

include_once '../Database/instructor_queries.php';
include_once '../Classes/Person.php';
include_once '../Classes/Notification.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of instructor
 *
 * @author esraamedhat
 */
class instructor extends Person {

    private $query;
    public $pl;
    public $ID;
    public $plname;
    private $notification;
   
    //put your code here4
    public function __construct() {
        $this->query = new instructor_queries();
        $this->notification = Notification::getInstance();     
       
    }

   function edit_question_answer(assigment $qa){

        return  $this->query->edite_q_a($qa);
    }

    function add_link(link $link){
          return $this->add_link($link);
      }


      function view_questions($instructor_id){
         return  $this->query->get_questions($instructor_id);
      }

    function edit_quiz_time() {

    }
    function add_question_answer($qa,$instructor_id){
            return $this->query->add_q_a($qa, $instructor_id);


        }


        function remove_question($qu_id){
           return $this->query->remove_question($qu_id);
        }


        function request_delet_account($request,$instructor_id){
            return $this->query->add_delete_request($request, $instructor_id);
        }

    

    function setvalues($user_ID) {
        $result = $this->query->selectInstructor($user_ID);
        //print_r($result);
        $this->ID = $result[0]['user_ID'];
        $this->pl = $result[0]['PL'];
         $result = $this->query->selectPLname($this->pl);
        $this->plname = $result[0]['pl_name'];
       // var_dump($result);
    }

    function getCV($user_ID) {
        $cv = $this->query->getCV($user_ID);
        return $cv;
    }

    private function getPlname() {
    }

    public function Upload_File($filename, $size, $actualfile_name) {

        $path = "../uploads/" . $actualfile_name;

        if (file_exists($path)) {
            $result = $this->query->getQuestionID($path);
            unlink($path);
            $this->query->updateAssignment($path, $result[0]['assignment_ID']);
            move_uploaded_file($filename, $path);
            $this->notification->notification =  $_SESSION['fname']." ". $_SESSION['lname']." added new assignment";
                $this->notification->URL = "http://localhost/Linkat/View/Student_assignments.php?subject=" . $this->pl . "?pl_name?=" . $this->plname;
                 $registered = $this->query->getregistered($this->pl);
                //print_r($registered);
                $this->notification->setnotification($registered);
            return FALSE;
        } else {
            move_uploaded_file($filename, $path);
            return $path;
        }
    }

    public function Upload_Assignment($filename, $size, $actualfile_name) {
        $assignment = $this->Upload_File($filename, $size, $actualfile_name);
        if ($assignment) {
            $result = $this->query->Upload_Assignment($this->ID, $assignment, $this->pl);
            if ($result) {
                $this->notification->notification = $_SESSION['fname']." ". $_SESSION['lname']." added new assignment";
                $this->notification->URL = "http://localhost/Linkat/View/Student_assignments.php?subject = " . $this->pl . "?pl_name?= " . $this->plname;
                $registered = $this->query->getregistered($this->pl);
                //print_r($registered);
                $this->notification->setnotification($registered);
                return $result;
            }
        } else {
            return FALSE;
        }
    }

    public function select_assignments() {
        // echo $this->ID;
        $result = $this->query->select_assignments($this->ID);
        //var_dump($result);
        return $result;
    }

}
