<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Student
 *
 * @author marya
 */include_once './../Classes/programming_language.php';
include_once '../Database/Student_Queries.php';
include_once '../Classes/Registered_person.php';
include_once '../Classes/Notification.php';
include_once '../Classes/feedback.php';

class Student extends Registered_person {

    //put your code here
    public $pl;
    private $ID;
    private $student;
    private $type = array("pdf", "docx", "doc", "img", "png", "jpeg", "jpg");

    public function __construct($ID) {
        parent::__construct();
        $this->pl = new programming_language();
        $this->student = new Student_queries();
        $this->ID = $ID;

        //print_r($_SESSION);
    }

    public function isRegistered($st_ID, $pl_ID) {
        $result = $this->student->isRegistered($st_ID, $pl_ID);
        if ($result) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function register_course($st_ID, $pl_ID) {
        $result = $this->student->register_course($st_ID, $pl_ID);
        return $result;
    }

    public function getRegisteredCourses($st_ID) {
        $result = $this->student->getRegisteredCourses($st_ID);
        return $result;
    }

    public function Upload_File($filename, $size, $actualfile_name) {

        $path = "../uploads/" . $actualfile_name;

        if (file_exists($path)) {
            /*
             * unlink de htdelete l file 3shan nrf3 wa7ed gdeed
             * flw hwa rf3 assignment l tany mara 
             * hyms7 l adeem 
             * w yrf3 l gdeed
             */
            unlink($path);
            $path = "../uploads/" . $actualfile_name;
            move_uploaded_file($filename, $path);
            return FALSE;
        }
        move_uploaded_file($filename, $path);
        return $path;
    }

    public function Upload_Assignment($filename, $size, $actualfile_name, $question) {
        $assignment = $this->Upload_File($filename, $size, $actualfile_name);
        //echo "$question";
        if ($assignment) {
            //echo "$this->ID";
            if ($assignment != "error") {

                $result = $this->student->Upload_Assignment($assignment, $this->ID, $question);
                return $result;
            } else {
                return $assignment;
            }
        } else {
            //  echo 'blaaaa';
            return $assignment;
        }
    }
    public function ask(ask $as) {
        $result= $this->student->set_ask($as);
         if($result){
            return $result;
        }
        else {
            return FALSE;
        }
    }
    public function Delete_account($id){
        $user = new User_Queries();
        // Delete data in mysql from row that has this id 
        $result = $user->DeleteAccount($id);

        // if successfully deleted
        if($result){
            echo "Deleted Successfully";
            echo "<BR>";
            return TRUE;
        }

        else {
            echo "ERROR";
            return FALSE;
        } 
    }
    function Take_competition(){
        $u = new User_Queries();
        $data=array();
        $data = $u->TakeAssynments($this->ID,$pl);
        if($data)
        {
            return $data;
        }
        else{
            header("Location: sorry.php");
        }
    }
    /*function Ask(){
        
    }*/
    function Rank($st_id,$as_id,$rate_num,$Type){
        $u = new User_Queries();
        $u->Rank_Questions($st_id, $as_id, $rate_num);
    }
    function Take_assynments($pl){
        $u = new User_Queries();
        $data=array();
        $data = $u->TakeAssynments($this->ID,$pl);
        if($data)
        {
            return $data;
        }
        else{
            header("Location: sorry.php");
        }
    }
    function Download_certificate(){
//        $path = BASE_URL."/pdf/";
//        $fullPath = $path.basename($_GET['download_file']);
//
//        header("Cache-Control: public");
//        header("Content-Description: File Transfer");
//        header('Content-disposition: attachment; 
//        filename='.basename($fullPath));
//        header("Content-Type: application/pdf");
//        header("Content-Transfer-Encoding: binary");
//        header('Content-Length: '. filesize($fullPath));
//        readfile($fullPath);
//        exit;
    }
    function Send_feedback($name,$email,$message,$id){
        $date = new DateTime();
        $s = new User_Queries();
        
        $qu = new feedback();
        $qu->time= date("Y-m-d H:i:s");;
        $qu->message=$message;
        $qu->user_id=$id;
        $s->send_feedback($qu);
        if($qu)
            echo "succ";
        else 
            echo"faild";
    }
}
