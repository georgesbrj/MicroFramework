<?php


class Chek {

    public static function checarNome($nome)
    {
        if(!preg_match_all('/[a-zA-Z]+/',$nome)):
           return true;
        else:
            return false;
        endif;   
    }

    public static function checarEmail($email)
    {
        if(!filter_var($email,FILTER_VALIDATE_EMAIL)):
            return true;
         else:
             return false;
         endif;   
    }

   public static function formDate($data){
       if(isset($data)):
        return date('d/m/y H:i',strtotime($data));
       else:
        return false;
       endif;

   }

}