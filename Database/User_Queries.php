<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of User_Queries
 *
 * @author marya
 */
include_once '../Database/DataBase_Class.php';
include_once '../Classes/assigment.php';
include_once '../Classes/answer.php';

class User_Queries {

    //put your code here
    private $DB;

    function __construct() {
        $this->DB = DataBase_Class::getInstance();
    }

    public function get_user_by_username_password($username, $password) {
//        $username=$this->DB->clean($username);
//        $password=$this->DB->clean($password);
        $password_hash = sha1($password);
        $Query = "SELECT * FROM `users` WHERE `username` LIKE '$username' AND `password` LIKE '$password_hash'";
        $user_data = $this->DB->get_row($Query);
        if ($user_data) {
            $this->update_online_status($user_data['user_ID']);
        } else {
            $Query = "SELECT * FROM `users` WHERE `username` LIKE '$username' AND `password` LIKE '$password'";
            $user_data = $this->DB->get_row($Query);
            if ($user_data) {
                $this->update_online_status($user_data['user_ID']);
            }
        }
        return $user_data;
    }
    
    public function get_user_by_email_password($email, $password) {
        $email = $this->DB->clean($email);
       $password=$this->DB->clean($password);
        $password_hash = sha1($password);
        $Query = "SELECT * FROM `users` WHERE `email` LIKE '$email' AND `password` LIKE '$password_hash'";
        $user_data = $this->DB->get_row($Query);
        if ($user_data) {
            $this->update_online_status($user_data['user_ID']);
        } else {
            $Query = "SELECT * FROM `users` WHERE `email` LIKE '$email' AND `password` LIKE '$password'";
            $user_data = $this->DB->get_row($Query);
            if ($user_data) {
                $this->update_online_status($user_data['user_ID']);
            }
        }
        return $user_data;
    }
    
    public function beInstructor($fname, $lname, $username, $email, $pl, $CV_path) {
        $rand = rand(10, 100);
        $password = $username.$rand;        
        //print_r($password);
        //$password_hash = hash("sha1", $password);
        $Query = "INSERT INTO `users` ( `type`, `fname`, `lname`, `username`, `email`, `password`, `status`) VALUES ( '3', '$fname', '$lname', '$username', '$email', '$password', '0')";
        $this->DB->database_query($Query);
        $select_pl_ID = "SELECT `pl_ID` FROM `programming_language` WHERE `pl_name` LIKE '$pl'";
        $pl_ID_1 = $this->DB->get_row($select_pl_ID);
        $select_user_id = "SELECT `user_ID` FROM `users` WHERE `email` LIKE '$email'";
        $user_ID_1 = $this->DB->get_row($select_user_id);
        $user_ID = $user_ID_1['user_ID'];
        //echo $user_ID;
        $pl_ID = $pl_ID_1['pl_ID'];
        echo "$pl_ID";
        $insert_inst = "INSERT INTO `instructor` (`user_ID`, `PL`, `CV`, `accepted`) VALUES ('$user_ID', '$pl_ID', '$CV_path', '0')";
        $result = $this->DB->database_query($insert_inst);
        print_r($result);
        return $result;
    }

    public function get_user_by_id($id) {
        $id = $this->DB->clean($id);
        $Query = "SELECT * FROM `users` where user_ID='$id'";
        $user_data = $this->DB->get_row($Query);

        return $user_data;
    }

    private function update_online_status($id) {
        $Query = "UPDATE `users` SET `status` = '1' WHERE `users`.`user_ID` = $id";
        $this->DB->database_query($Query);
    }

    public function logout($id) {
        $Query = "UPDATE `users` SET `status` = '0' WHERE `users`.`user_ID` = $id";
        $this->DB->database_query($Query);
    }

    public function register($fname, $lname, $username, $email, $password) {
        $password_hash = hash("sha1", $password);
        $Query = "INSERT INTO `users` ( `type`, `fname`, `lname`, `username`, `email`, `password`, `status`) VALUES ( '2', '$fname', '$lname', '$username', '$email', '$password_hash', '1')";
        $result =  $this->DB->database_query($Query);
        return $result;
    }
    public function send_feedback($feed) {
        $data=array();
        $data['feedbacktime']=$feed->time;
        $data['feedback']=$feed->message;
        $data['user_ID']=$feed->user_id;
        $result= $this->DB->insert('feedback', $data);
        if($result){
            return TRUE;
        }
        else {
            return FALSE;
        }
    }
    public function getQuestions()
    {
	
    }
    public function DeleteAccount($user_Id)
    {
        $s="DELETE FROM `users` WHERE `users`.`user_ID` = $user_Id;";
        $result = $this->DB->database_query($s);
        if ($result) {
            return TRUE;
        } else{
            return false;
        }
    }

    public function TakeAssynments($user_Id,$pl)
    {
        //$id=$_SESSION['user_ID'];
        $qu = "SELECT `assignment_ID` , `question` FROM `assignment` where `assignment_type` = 1 AND `pl` = '$pl' ORDER BY RAND() LIMIT 1";
        $result= $this->DB->database_all_array($this->DB->database_query($qu));
        $an= new answer();
        $an1= new answer();
        $an2= new answer();
        $an3= new answer();
        $sa=new assigment($an, $an1, $an2, $an3);
        
        if($result)
        {
            $sa->question_id = $result[0]['assignment_ID'];
            $sa->question = $result[0]['question'];
            $qu = "SELECT `student_answers_ID` FROM `student_answers` WHERE `student` = '$user_Id' AND `question`= '$sa->question_id'";
            $result2= $this->DB->database_all_array($this->DB->database_query($qu));
            
            if(!$result2){
                $qu = "SELECT `assignment_answers` , `assignment_answers_ID` , `right_answer` FROM `assignment_answers` where `assignment` = '$sa->question_id' LIMIT 4";
                $result3= $this->DB->database_all_array($this->DB->database_query($qu));
                $an->answer= $result3[0]['assignment_answers'];
                $an1->answer= $result3[1]['assignment_answers'];
                $an2->answer= $result3[2]['assignment_answers'];
                $an3->answer= $result3[3]['assignment_answers'];
                if($result3[0]['right_answer']==1){
                    $an->right=$result3[0]['assignment_answers'];
                    $an->answer_id= $result3[0]['assignment_answers_ID'];
                }
                else if($result3[1]['right_answer']==1){
                    $an->right=$result3[1]['assignment_answers'];
                    $an->answer_id= $result3[1]['assignment_answers_ID'];
                }
                else if($result3[2]['right_answer']==1){
                    $an->right=$result3[2]['assignment_answers'];
                    $an->answer_id= $result3[2]['assignment_answers_ID'];
                } 
                else if($result3[3]['right_answer']==1){
                    $an->right=$result3[3]['assignment_answers'];
                    $an->answer_id= $result3[3]['assignment_answers_ID'];
                }
                $data=array();
                $data['student']=$user_Id;
                $data['question']=$sa->question_id;
                $data['answers']=$an->answer_id;
                echo "$an->answer_id";
                $this->DB->insert('student_answers', $data);
                $data2=array();
                $data2['question']=$sa->question;
                $data2['answer1']=$an->answer;
                $data2['answer2']=$an1->answer;
                $data2['answer3']=$an2->answer;
                $data2['answer4']=$an3->answer;
                $data2['right']=$an->right;
                return $data2;
            }
            else{
                $i=ini_get('max_execution_time');
                if($i = 300)
                {
                    return FALSE;
                }
                else{
                    $this->TakeAssynments($user_Id, $pl);
                }
            }
        }
        else{
            return FALSE;
        }
    }
    
    public function TakeCompetition($user_Id,$pl)
    {
        //$id=$_SESSION['user_ID'];
        $qu = "SELECT `assignment_ID` , `question` FROM `assignment` where `assignment_type` = 2 AND `pl` = '$pl' ORDER BY RAND() LIMIT 1";
        $result= $this->DB->database_all_array($this->DB->database_query($qu));
        $an= new answer();
        $an1= new answer();
        $an2= new answer();
        $an3= new answer();
        $sa=new assigment($an, $an1, $an2, $an3);
        
        if($result)
        {
            $sa->question_id = $result[0]['assignment_ID'];
            $sa->question = $result[0]['question'];
            $qu = "SELECT `student_answers_ID` FROM `student_answers` WHERE `student` = '$user_Id' AND `question`= '$sa->question_id'";
            $result2= $this->DB->database_all_array($this->DB->database_query($qu));
            
            if(!$result2){
                $qu = "SELECT `assignment_answers` , `assignment_answers_ID` , `right_answer` FROM `assignment_answers` where `assignment` = '$sa->question_id' LIMIT 4";
                $result3= $this->DB->database_all_array($this->DB->database_query($qu));
                $an->answer= $result3[0]['assignment_answers'];
                $an1->answer= $result3[1]['assignment_answers'];
                $an2->answer= $result3[2]['assignment_answers'];
                $an3->answer= $result3[3]['assignment_answers'];
                if($result3[0]['right_answer']==1){
                    $an->right=$result3[0]['assignment_answers'];
                    $an->answer_id= $result3[0]['assignment_answers_ID'];
                }
                else if($result3[1]['right_answer']==1){
                    $an->right=$result3[1]['assignment_answers'];
                    $an->answer_id= $result3[1]['assignment_answers_ID'];
                }
                else if($result3[2]['right_answer']==1){
                    $an->right=$result3[2]['assignment_answers'];
                    $an->answer_id= $result3[2]['assignment_answers_ID'];
                } 
                else if($result3[3]['right_answer']==1){
                    $an->right=$result3[3]['assignment_answers'];
                    $an->answer_id= $result3[3]['assignment_answers_ID'];
                }
                $data=array();
                $data['student']=$user_Id;
                $data['question']=$sa->question_id;
                $data['answers']=$an->answer_id;
                $this->DB->insert('student_answers', $data);
                $data2=array();
                $data2['question']=$sa->question;
                $data2['answer1']=$an->answer;
                $data2['answer2']=$an1->answer;
                $data2['answer3']=$an2->answer;
                $data2['answer4']=$an3->answer;
                $data2['right']=$an->right;
                return $data2;
            }
            else{
                $i=ini_get('max_execution_time');
                if($i = 300)
                {
                    return FALSE;
                }
                else{
                    $this->TakeAssynments($user_Id, $pl);
                }
            }
        }
        else{
            return FALSE;
        }
    }
    
    function Rank_Questions($st_id,$as_id,$rate_num){
        $data=array();
        $data['student']=$st_id;
        $data['assignment']=$as_id;
        $data['rank']=$rate_num;
        $this->DB->insert('assignment_type_rank', $data);
        
        $qu = "SELECT `assignment_type_rank_ID` FROM `assignment_type_rank` WHERE `student` = '$st_id' AND `$as_id` = '$as_id'";
        $result=$this->DB->database_all_array($this->DB->database_query($qu));
        if($result){
            $rate = $result[0]['assignment_type_rank_ID'];
            $data=array();
            $data2['type_rank']=$rate;
            $data2['questions']=$as_id;
            $this->DB->insert('type_rank_questions', $data2);
        }
        else {
            return FALSE;
        }
    }
    
    function Rank_instructor($st_id,$as_id,$rate_num){
        $data=array();
        $data['student']=$st_id;
        $data['assignment']=$as_id;
        $data['rank']=$rate_num;
        $this->DB->insert('assignment_type_rank', $data);
    }
    
      public function get_ask(){
        $qu="SELECT * FROM `ask` ORDER BY `ask_time` DESC;";
        $result=$this->DB->database_all_array($this->DB->database_query($qu));
        return $result;
    }
    
    public function set_reply(reply $re){
        $data=array();
        $data['ask_ID']=$re->ask_ID;
        $data['reply']=$re->reply;
        $data['reply_ID']=$re->reply_ID;
        $data['reply_time']=date("Y-m-d H-i-s");
        $data['user_ID']=$re->user_ID;
        $result= $this->DB->insert('reply',$data);
        if($result){
            return TRUE;
        }
       else {
            return FALSE;
 }
        
    }
    public function get_img($user_id) {
        $qu="SELECT `profile_pic` FROM `user_profile_pic` WHERE `user_profile_pic`.`user_ID` =$user_id ";
        $result=$this->DB->database_query($qu);
           if($result){     
             return   $this->DB->database_all_array()[0]['profile_pic'];
           }
 else {
           return FALSE;    
           }
        
    }
    public function get_username($id){
      $qu="SELECT `username` FROM `users` WHERE `users`.`user_ID` =$id ";
        $result= $this->DB->database_all_array($this->DB->database_query($qu));
        $result['username']=$result[0][0];
        return $result['username'] ;
    }
     public function get_reply($q_id){
         $all_rp=array();
         $i=0;
        $qu="SELECT * FROM `reply` WHERE `reply`.`ask_ID` = $q_id ";
        $result=$this->DB->database_all_array($this->DB->database_query($qu));
        foreach ($result as $value) {
              
              $value['username']= $this->get_username($value['user_ID']);
              $value['img']= $this->get_img($value['user_ID']);
              $all_rp[$i]=$value;
              $i++;
          }
          
        return $all_rp;
    }
}

//$user=new User_Queries();
//$c=$user->get_user_by_id(1);
//var_dump($c);

