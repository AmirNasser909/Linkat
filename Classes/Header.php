<?php
session_start();
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Header
 *
 * @author marya
 */
include_once '../Classes/Observer.php';
include_once '../Classes/Notification.php';



class Header implements Observer{
    //put your code here
    private $n;  
    public  $notifarr;
    public function __construct() {
        $this->n = new Notification($this);
        $this->update($this->n);
    }

    public function update(\Notification $n) {
        $this->notifarr= $n->getNotification($_SESSION['user_ID']);

       // print_r($this->notifarr);

    }
}
