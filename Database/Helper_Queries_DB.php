<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Helper_Queries_DB
 *
 * @author Wael
 */
include_once '../Database/DataBase_Class.php';
include_once '../Classes/student.php';
include_once '../Classes/programming_language.php';
include_once '../Classes/Email_Config.php';
class Helper_Queries_DB {
    //put your code here
    private $DB;
    function __construct() {
        $this->DB=DataBase_Class::getInstance();
    }
    public function get_user_type_urls($type_id){
        $Query="SELECT page_name,page_URL FROM `usertype_pages`,`pages` where usertype_pages.pages=pages.page_ID and usertype_pages.usertype=$type_id ";
        $result=$this->DB->database_query($Query);
        if($result){
        $URLS=$this->DB->database_all_array($result);
         return $URLS;
        }
    }

    public function get_all_courses() {
        $Query = "SELECT * FROM `programming_language`";
        $result = $this->DB->database_query($Query);
        $resultass = $this->DB->database_all_assoc($result);
        return $resultass;
    }
    public function get_all_links(){
        $Query = "SELECT * FROM `links`";
        $result = $this->DB->database_query($Query);
        $resultass = $this->DB->database_all_assoc($result);
        return $resultass;
    }
    public function add_poins($st_id,$pl_id) {
        
        $st =new Student($st_id);
        
        $qu="SELECT `points` FROM `st_pl` WHERE `student`='$st_id' AND `pl`='$pl_id'";
        $result = $this->DB->database_all_array($this->DB->database_query($qu));
        
        if($result){
            $st->poins = $result[0]['points'];
            $point=$st->poins+1;
            $qu="UPDATE `st_pl` SET `points` = $point WHERE `student`='$st_id' AND `pl`='$pl_id'";
            $result2 = $this->DB->database_query($qu);
            if($result2)
            {
                return TRUE;
            }
            else {
                return FALSE;
            }
        } else {
            return FALSE;
        }
    }
       
    public function send_mail($to,$subject,$body) {
        
        require_once('phpmailer.php');
        $from = "ibrahemallam18@gmail.com";
        ini_set("SMTP","ssl://smtp.gmail.com"); 
        ini_set("smtp_port","465");
        $fromName="XXXXX Adminstration";
        $mail = new PHPMailer(true); // the true param means it will throw exceptions on errors, which we need to catch

        $mail->IsSMTP(); // telling the class to use SMTP

        try {
          $mail->Host       = "smtp.gmail.com"; // SMTP server
          $mail->SMTPDebug  = 1;                     // enables SMTP debug information (for testing)
          $mail->SMTPAuth   = true;                  // enable SMTP authentication
          $mail->SMTPSecure = 'ssl';
          $mail->Port       = 465;                    // set the SMTP port for the GMAIL server
          $mail->Username   = "ibrahemallam18@gmail.com"; // SMTP account username
          $mail->Password   = "";        // SMTP account password

          $mail->AddAddress($to, $to);
          $mail->SetFrom($from, $from);
          //$mail->AddReplyTo($from, $fromName);
          $mail->Subject = $subject;
          //$mail->AltBody = $body; // optional - MsgHTML will create an alternate automatically
          $mail->MsgHTML($body);
          $mail->CharSet='utf-8';
          //$mail->AddAttachment('images/phpmailer.gif');      // attachment
          //$mail->AddAttachment('images/phpmailer_mini.gif'); // attachment
          $mail->Send();
                 echo "Message Sent OK</p>\n";
          //echo $e->getMessage(); //Boring error messages from anything else!
        }


         catch (phpmailerException $e) {
          echo $e->errorMessage(); //Pretty error messages from PHPMailer
        } 
        
    }
    
    public function notify() {
        
    }
    
    public function create_Certificate() {
        
    }
      
    public function get_Rate() {
        $qu="SELECT `rank` FROM `assignment_type_rank`";
        $result = $this->DB->database_query($qu);
        $resultass = $this->DB->database_all_assoc($result);
    }
    
    public function show_Right_Answers($user_Id, $pl) {
        
        $qu= "SELECT *FROM `student_answers` WHERE `student` LIKE $user_Id";
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
public function getassignments($pl_ID) {
$Query = "SELECT `assignment_ID`,`question`,`allowed_time` FROM `assignment` WHERE `pl` = '$pl_ID' AND `assignment_type` = 3";
$result = $this->DB->database_query($Query);
$resultass = $this->DB->database_all_assoc($result);
return $resultass;
}
public function addnotification($notification, $URL ,$usersID) {
$date = date("Y-m-d H:i:s");
//$query = "INSERT INTO `notifications` (`notification_time`,`notification`,`notification_URL`) VALUES('$date','$notification','$URL')";
$data['notification_time'] = $date;
$data['notification'] = $notification;
$data['notification_URL']=$URL;
$result=$this->DB->insert('notifications',$data);

$query = "SELECT `notification_ID` FROM `notifications` WHERE `notification` LIKE '$notification'";
$id = $this->DB->get_row($query);
if(!$result){
   // echo 'xxxxxxxxxxxx';
    $data2['notification_time'] = $date;
    $where = "`notification_ID`=".$id['notification_ID'];
    $this->DB->update('notifications',$data2,$where);
}
//print_r($id);
///print_r($usersID);
$this->addObserver($id['notification_ID'], $usersID);
}
 function addObserver($notificationID,$userID) {
     //print_r($notificationID);
    print_r($userID);
    foreach ($userID as $ID){
        print_r($ID);
         $data['notifications_ID']=$notificationID;    
    $data['seen'] = 0;
    if (isset($ID['student'])) {
                $data['user_ID'] = $ID['student'];
            } else {
                $data['user_ID'] = $ID;
            }
            print_r($data);
        echo '<br>';
    $result=$this->DB->insert('user_notifications',$data);
     //   var_dump($result);
        echo '<br>';
        if(! $result){
            unset($data);
            $data['seen']=0;
        $result=$this->DB->update('user_notifications',$data);
     //var_dump($result);
     echo '<br>';
        }
    }
    return $result;
}
public function getnotifications($user) {
    $query="SELECT `notification_ID`,`notification`,`notification_URL`, DATE_FORMAT(`notification_time`,'%Y-%m-%d %h:%i:%s')AS `time` FROM `notifications`,`user_notifications` WHERE`user_notifications`.`user_ID`='$user' AND `notifications`.`notification_ID`=`user_notifications`.`notifications_ID` ORDER BY `time` DESC";
    $result = $this->DB->database_query($query);
    //print_r($result);
    $assoc = $this->DB->database_all_assoc($result);
    //print_r($assoc);
    return $assoc;
}

}
