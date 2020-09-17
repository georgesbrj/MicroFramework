<?php

/**
 * classe rota 
 * cria Urls,carrega constroladores metodos e parametros
 * formato URl - /controlador/metodo/parametros
 */

class Rota {
 // atributos da classe
    private $controlador = 'Paginas';
    private $metodo = 'index';
    private $parametros = [];
   


    public function __construct()
    {

      //se a url existir joga a funcao url na variavel $url
       $url = $this->url() ? $url = $this->url(): [0] ;   
      // checa se o controlador existe 
      // ucwords - Converte para maiuscula o primeiro caracter de cada palavra
       if(file_exists('../app/Controllers/'.ucwords($url[0]).'.php')):
      // se existir seta como controlador 
            $this->controlador = ucwords($url[0]);
      //unset - destroi a variavel especificada      
            unset($url[0]);
       endif;
      //requerer o controlador 
       require_once '../app/Controllers/'.$this->controlador.'.php';
      // instancia o controlador  
       $this->controlador = new $this->controlador;
      //checa se o metodo existe ,segunda parte da url   
       if(isset($url[1])):
      //method exists - checa se o metodo da classe existe    
         if(method_exists($this->controlador,$url[1])):
            $this->metodo = $url[1];
            unset($url[1]);
         endif;
       endif;

      // se existir retorna um array com os valores se nao retorna um array vazio
      //array values - retorna todos dos valores de um array 
       $this->parametros = $url ? array_values($url): [];
       call_user_func_array([$this->controlador,$this->metodo],$this->parametros);
      //call_user_func_array - chama uma dada funcao de usuarios como um array de parametros   
      // var_dump($this); sai na pagina home
    }

      //retorna a url em um array 
    private function url()
    {
     //o filtro FILTER_SANITIZE_URL remove todos os caracteres ilegais de uma url 
     $url = filter_input(INPUT_GET,'url',FILTER_SANITIZE_URL);
     //verifica se a url existe 
     if(isset($url)){
     //trim retira os espaco do inicio e final e uma string 
     //rtrim retira espaco em branco ou outros caracteres do final de uma string   
         $url = trim(rtrim($url,'/'));
     //explode - divide u a string em strings , retorna um array     
        $url = explode('/',$url);
        return $url; 
     }
    }
    

}


