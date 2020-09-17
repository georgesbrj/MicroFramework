<?php 
/**
 * controler usuario
 */




class Usuarios extends Controller 
{
   public function __construct()
   {
       $this->usuarioModel  = $this->model('Usuario');
   }


   public function cadastrar()
   {

    
      $formulario = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
      if(isset($formulario)):
        $dados = [
            'nome' => trim($formulario['nome']),
            'email' => trim($formulario['email']),
            'senha' => trim($formulario['senha']),
            'confirmar_senha' => trim($formulario['confirmar_senha']),
        ];

        if(in_array(" ",$formulario)):
         if(empty($formulario['nome'])):
            $dados['nome_erro'] =  'Preencha o campo nome';
         endif;

         if(empty($formulario['email'])):
            $dados['email_erro'] =  'Preencha o campo email';
         endif;

         if(empty($formulario['senha'])):
            $dados['senha_erro'] =  'Preencha o campo senha';
            
         endif;

         if(empty($formulario['confirmar_senha'])):
            $dados['confirmar_senha_erro'] =  'Preencha o campo confirmar senha';

         endif;
        else:
            if(Chek::checarNome($formulario['nome'])):
                $dados['nome_erro'] =  'Este formato de nome e invalido';

             elseif(Chek::checarEmail($formulario['email'])):   
                $dados['email_erro'] =  'Este formato de email e invalido';
                elseif($this->usuarioModel->chekEmail($formulario['email'])):
                    $dados['email_erro'] =  'O email informado já esta cadastrado';


            elseif(strlen($formulario['senha']) < 8 ):
                $dados['senha_erro'] =  'A senha deve ter no minimo 8 caracteres';
           
               elseif($formulario['senha'] != $formulario['confirmar_senha']):
                    $dados['confirmar_senha_erro'] =  'As senhas sao diferentes !';
               else:
                $dados['senha'] = password_hash($formulario['senha'],PASSWORD_DEFAULT);

               
                if($this->usuarioModel->salvar($dados)):
                    
                   Sessao::mensagem('usuario','Cadastro realizado com sucesso');
                   Url::redirecionar('usuarios/login');
                else:
                    die("Erro ao armazenar usuario");
                endif;   
                
            endif;
        endif;

      else:
        $dados = [
            'nome' => '',
            'email' => '',
            'senha' => '',
            'confirmar_senha' => '',
            'nome_erro'=>'',
            'email_erro'=>'',
            'senha_erro'=>'',
            'confirmar_senha_erro'=>'' 
        ];
      endif;

       $this->view('usuarios/cadastrar',$dados);
   }// fim da funcao 


   public function login()
   {

    
      $formulario = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
      if(isset($formulario)):
        $dados = [
           
            'email' => trim($formulario['email']),
            'senha' => trim($formulario['senha']),
          
        ];

        if(in_array(" ",$formulario)):
       

         if(empty($formulario['email'])):
            $dados['email_erro'] =  'Preencha o campo email';
         endif;

         if(empty($formulario['senha'])):
            $dados['senha_erro'] =  'Preencha o campo senha';
         endif;

        

      
        else:
             if(Chek::checarEmail($formulario['email'])):   
                $dados['email_erro'] =  'Este formato de email e invalido';
               else:
                
                $usuario = $this->usuarioModel->chekLogin($formulario['email'],$formulario['senha']);

                if($usuario):
                   $this->criarSessaoUsuario($usuario);
                else:
                   Sessao::mensagem('usuario','Usuario ou senha invalidos','alert alert-danger');
                endif;
              
               
            endif;
        endif;

    else:
        $dados = [
            'email' => '',
            'senha' => '',
            'email_erro'=>'',
            'senha_erro'=>'',
             
        ];
    endif;

       $this->view('usuarios/login',$dados);
   }


   public function criarSessaoUsuario($usuario)
   {
      $_SESSION['usuario_id'] = $usuario->id;
      $_SESSION['usuario_nome'] = $usuario->nome;
      $_SESSION['usuario_email'] = $usuario->email;

      Url::redirecionar('pagina/home');
   }

   public function sair()
   {
       unset($_SESSION['usuario_id']);
       unset($_SESSION['usuario_nome']);
       unset($_SESSION['usuario_email']);

       session_destroy();
       
       Url::redirecionar('usuarios/login');
   }

}