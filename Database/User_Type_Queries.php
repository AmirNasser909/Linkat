<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of User_Type_Queries
 *
 * @author Wael
 */
include_once '../Database/DataBase_Class.php';
class User_Type_Queries {
    private $DB;
    public function __construct() {
        $this->DB= DataBase_Class::getInstance();
    }
    public function get_user_type_by_id($id){
        $Query="SELECT * FROM `user_type`  where id=$id";
        $type_data=$this->DB->get_row($Query);
        return $type_data;
        
    }
}
