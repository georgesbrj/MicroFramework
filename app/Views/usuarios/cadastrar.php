<div  class="col-xl-6 col-md-6 mx-auto p-5 " >
    <div class="card">
        <div class="card-header bg-secondary text-white">
            <h2>Vamos fazer seu cadastro!</h2>
            </div>    
         <div class="card-body">      
            <small>Preencha o formulario abaixo para fazer seu cadastro</small>
            <form name="cadastrar"  method="POST" action="<?= URL ?>/usuarios/cadastrar">
                <div class="form-group p-2">
                    <label for="nome" >Nome: <sup class="text-danger">*</sup></label>
                      <input type="text" name="nome" class="form-control" id="nome"  value="<?= $dados['nome'] ?>" class="form-control <?= $dados['nome_erro']?'is-invalid':'' ?>">
                        <div class="invalid-feedback">
                            <?= $dados['nome_erro'] ?>
                        </div>
                </div>
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
                <div class="form-group p-2">
                    <label for="confirmar_senha" >Confirme a senha: <sup class="text-danger">*</sup></label>
                      <input type="password" name="confirmar_senha" class="form-control <?= $dados['confirmar_senha_erro']?'is-invalid':'' ?>" id="confirmar_senha"  value="<?= $dados['confirmar_senha'] ?>">
                        <div class="invalid-feedback">
                            <?= $dados['confirmar_senha_erro'] ?>
                        </div>
                </div>
                <div class="row p-2">
                    <div class="col-md-6">
                        <input type="submit" value="Cadastrar" class="btn btn-info btn-block">
                    </div>
                    <div class="col-md-6">
                        <a href="<?= URL ?>/usuarios/login">Você tem uma conta? faça login</a>
                    </div>

                </div>

            </form>
        </div>
    </div>
</div>