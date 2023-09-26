<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Admin
 *
 * @author ibrahem allam
 */
include_once '../Database/Admin_Queries.php';
include_once '../Classes/programming_language.php';
include_once '../Classes/instructor.php';
include_once '../Classes/Registered_person.php';
include_once '../Classes/search.php';
include_once '../Classes/report.php';

class Admin extends Registered_person implements search, report{
    //put your code here
    public $query;
    public function __construct() {
        $this->query = new Admin_Queries();
    }
    public function Add_course($name,$dis){
        $pl = new programming_language();
        $pl->name=$name;
        $pl->description=$dis;
        $this->query->Add_course($pl);
        
    }
    
    public function AcceptORreject_ins($ac,$id){
        $user = new Admin_Queries();
        if($ac==1)
        {
            $user->Accept_ins($id);
        }
        else if ($ac==0)
        {
            $user->reject_ins($id);
        }
    }
    
    public function View_ins_Requests(){
        $ins = new instructor();
        $user = new Admin_Queries();
        $ins = $user->view_ins_Requests();
        if($ins)
        {
            return $ins;
        }
        else {
            header("Location: sorry.php");
        }
    }
    
    public function Delete_ins($id){
        
       $result= $this->query->delete_ins($id);
        
        if($result){
            echo "Deleted Successfully";
            echo "<BR>";
            echo "<a href='delete.php'>Back to main page</a>";
        }

        else {
            echo "ERROR";
        }
    }
    
    public function Delete_ask_ana_replies($id){
       return $this->query->delete_ask_ana_replies($id);
    }
    
    public function Add_ins($fname, $lname, $email, $pl, $cv_path){
        $ins=new instructor();
        $ins->fname=$fname;
        $ins->lname=$lname;
        $ins->email=$email;
        $ins->pl=$pl;
        $ins->cv=$cv_path;
       $this->query->add_ins($ins);
    }
    
    
    
    
    public function get_report($type) {
        $report=array();
        if($type=="o"){
        $report=$this->query->overall();
        }
       
        elseif($type=="s"){
         
        $i=0;
        $st_report= $this->query->student_table();
        foreach ($st_report as $value){
            $report[$i]=array();
            $report[$i]['username']=$value['username'];
            $report[$i]['user_id']=$value['user_ID'];
            $RESULT= $this->query->student_pl($value['user_ID']);
            $c=0;
            $report[$i]['pl']=array();
            foreach ($RESULT as $value2){
                 $report[$i]['pl'][$c]['points']=$value2['points'];
                  $report[$i]['pl'][$c]['pl_name']= $this->query->pl_table($value2['pl']);
                  $c++;
            }
           $i++;  
        }
        }
        elseif ($type=="i"){
        $i=0;
        $report=array();
        $pls= $this->query->get_pls();
        foreach ($pls as $value3){
            $report[$i]=array();
            $report[$i]['pl_name']=$value3['pl_name'];
            
            $RESULT= $this->query->instructor_pl($value3['pl_ID']);
            $c=0;
            $report[$i]['instructor']=array();
            foreach ($RESULT as $value4){
                $report[$i]['instructor'][$c]['inst_name']= $this->query->getusername($value4['user_ID']);
                $report[$i]['instructor'][$c]['inst_id']=$value4['user_ID'];
           $c++;
                }
            $i++;
        }
        }
        
        elseif ($type=="f") {
            
            $result=$this->query->getfeedback();
            $i=0;
            foreach ($result as $value){
                $report[$i]['feedback']=$value['feedback'];
                $report[$i]['feedback_time']=$value['feedbacktime'];
                $report[$i]['username']= $this->query->getusername($value['user_ID']);
                $i++;
            }
            
        
    }
return $report; 
    
    }
    public function search($search_for) {
        
    }

    
    
    
    
}
