<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function checksql($to_check) {
    $check_sql = ["select", "drop", "truncate", "insert", "delete"];
    $check = TRUE;

        foreach ($check_sql as $sql) {
            if (strstr( strtolower($to_check),$sql)) {
                $check = FALSE;
                if(!$check){
                    break;
                }
            }
        }
    return $check;
}
