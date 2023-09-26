<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of question
 *
 * @author esraamedhat
 */
include_once '../classes/answer.php';
class assigment {
    //put your code here
    

     public $question;
    public $question_id;
    public $time;
    public $pl;
    public $assigment_type;
    public $answers;
    function __construct(answer $answer1,answer $answer2,answer $answer3,answer $answer4) {
    $this->answers=array($answer1,$answer2,$answer3,$answer4);}
   
   
}
