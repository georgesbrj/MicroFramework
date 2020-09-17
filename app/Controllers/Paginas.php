<?php

/**
 * crie suas views 
 */



class Paginas extends Controller {

   // pagina index
    public function index()
    {
      if(Sessao::usuarioLogado()):
      endif;
      $dados = [
        'tituloPagina'=>'Pagina incial',
      ];

       $this->view('paginas/home',$dados); 
    }

 //pagina contato    
    public function contato()
    {
       $dados = ['tituloPagina'=>'Pagina contato'];
      $this->view('paginas/contato',$dados);
    }

  // pagina sobre 
    public function sobre()
    {
      $dados = [
        'tituloPagina'=>'Pagina sobre',
        
      ];

    $this->view('paginas/sobre',$dados);
        
    }

//pagina quem somos
  public function somos()
  {
    $dados = ['tituloPagina'=>'Pagina quem somos'];    
    $this->view('paginas/somos',$dados);
  }    

//pagina posts  
  public function posts()
  {
    $dados = ['tituloPagina'=>'Post'];    
    $this->view('posts/index',$dados);
  }    
}