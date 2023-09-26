<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of link
 *
 * @author esraamedhat
 */
include_once '../Database/Helper_Queries_DB.php';
class link {

    //put your code here

    private $link;
    private $type;
    private $descreption;
    private $language;
    private $pl;
    private $link_id;
    private $helper;
    public function __construct() {
        $this->helper=new Helper_Queries_DB();
    }
    public function get_all_links() {
        $links = $this->helper->get_all_links();
        return $links;
    }

}
