<div  class="col-xl-6 col-md-6 mx-auto p-5 " >
    <div class="card">
        <div class="card-header bg-secondary text-white">
            <h2>Login</h2>
            </div>    
         <div class="card-body">    
             
            <?=Sessao::mensagem('usuario') ?>
            <small>Iforme seu email e sua senha!</small>
            <form name="login"  method="POST" action="<?= URL ?>/usuarios/login">
               
                <div class="form-group p-2">
                    <label for="email" >E-mail: <sup class="text-danger">*</sup></label>
                      <input type="email" name="email" class="form-control <?= $dados['email_erro']?'is-invalid':'' ?>" id="email" value="<?= $dados['email'] ?> ">
                        <div class="invalid-feedback">
                            <?= $dados['email_erro'] ?>
                        </div>
                </div>
                <div class="form-group p-2">
                    <label for="senha" >Senha: <sup class="text-danger">*</sup></label>
                      <input type="password" name="senha" class="form-control <?= $dados['senha_erro']?'is-invalid':'' ?>" id="senha" value="<?= $dados['senha'] ?>">
                        <div class="invalid-feedback">
                            <?= $dados['senha_erro'] ?>
                        </div>
                </div>
                
                <div class="row p-2">
                    <div class="col-md-6">
                        <input type="submit" value="Login" class="btn btn-info btn-block">
                    </div>
                    <div class="col-md-6">
                        <a href="<?= URL ?>/usuarios/cadastrar">Não tem uma conta? faça cadastre-se</a>
                    </div>

                </div>

            </form>
        </div>
    </div>
</div>