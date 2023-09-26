<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author marya
 */
include_once '../Classes/Observer.php';
interface Subject {
    //put your code here
    function add(Header $observer);
    function remove(Header $observer);
    function notify();
}
