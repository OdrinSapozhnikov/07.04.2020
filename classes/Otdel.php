<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Otdel
 *
 * @author Demon
 */
class Otdel  extends Table{
    //put your code here
    var $otdel_id ='';
    var $name ='';
        public function validate(){
        return false;
    }
}
