<?php
/**
 * controlador base 
 * carrega os modelos e as views 
 */



class Controller {


//carrega os modelos 
    public function model($model)
    {
// requere o arquivo de modelo   
        require_once '../app/Models/'.$model.'.php';
// instacia o modelo        
        return new $model;
    }
// carrega as views     
    public function view($view,$dados = [])
    {
       $arquivo = ('../app/Views/'.$view.'.php');
       if(file_exists($arquivo)):
//requisita o arquivo da view         
         require_once $arquivo;
       else:
//a funcao die() termina a execucao do script         
        die('O arquivo de view nao existe!');
       endif;
    }

}