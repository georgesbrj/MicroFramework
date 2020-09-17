<?php




 
spl_autoload_register(function($classe){

   // lista os diretorios para buscar as classes 
    $diretorios = [
    'Libraries',
    'Helpers'
  ];

  // percorre os diretorios em busca das classes 
  foreach($diretorios as $diretorio):
    //a constante DIR retornar o diretorio absuloto do arquivo 
    //DIRECTORY_SEPARATOR  e o separador utilizado para percorrer diretorios 
    $arquivo = (__DIR__.DIRECTORY_SEPARATOR.$diretorio.DIRECTORY_SEPARATOR.$classe.'.php');
    //verifica se o arquivo da classe existe 
   if(file_exists($arquivo)):
    // inclui o arquivo da classe 
    require_once($arquivo);
   endif;
  endforeach;
  

  

});