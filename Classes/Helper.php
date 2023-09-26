<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Helper
 *
 * @author marya
 */
include_once '../Database/Helper_Queries_DB.php';
class Helper {

    //put your code here
    private $Helper_Queries_DB;

    function __construct() {
        $this->Helper_Queries_DB = new Helper_Queries_DB();
    }

    public function get_user_type_urls($type_id) {
        $URLS = $this->Helper_Queries_DB->get_user_type_urls($type_id);
        return $URLS;
    }
    
    public function Add_poins($ID,$pl){
        $this->Helper_Queries_DB->add_poins($ID,$pl);
    }
        
    public function Send_mail($to,$subject,$body) {
        $this->Helper_Queries_DB->send_mail($to,$subject,$body);
    }
    
    public function Notify() {
        
    }
    
    public function Create_Certificate() {
        
    }
    
    public function Calculate_percentage() {
        
    }
    
    public function Get_Rate() {
        
    }
    
    public function Show_Right_Answers($id,$pl) {
        $data=array();
        $data = $this->Helper_Queries_DB->show_Right_Answers($id, $pl);
        if($data){
            return $data;
        }
        else{
            return FALSE;
        }
    }
}
