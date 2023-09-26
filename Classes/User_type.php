<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of User_type
 *
 * @author Wael
 */
include_once '../Database/User_Type_Queries.php';
class User_type {
    public $id;
    public $name;
    private $User_Type_Queries;
    public function __construct($id) {
        $this->User_Type_Queries=new User_Type_Queries(); 
        if($id !=""){
            $user_type_data=$this->User_Type_Queries->get_user_type_by_id($id);
            $this->name=$user_type_data['name'];
            $this->id=$id;
        }
    }
//    public function get_user_type_urls(){
//        
//    }
}
