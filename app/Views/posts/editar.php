<div  class="col-xl-6 col-md-6 mx-auto p-5 " >

  <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
       <li class="breadcrumb-item"><a href="<?= URL ?>/posts">Posts</a></li>
       
      </ol>
  </nav>
    <div class="card">
        <div class="card-header bg-secondary text-white">
            <h2>Editar Post</h2>
            </div>    
         <div class="card-body">    
             
            <form name="login"  method="POST" action="<?= URL ?>/posts/editar/<?= $dados['id'] ?>">
               
                <div class="form-group p-2">
                    <label for="titulo" >Titulo: </label>
                      <input type="text" 
                             name="titulo" 
                             class="form-control <?= $dados['titulo_erro']?'is-invalid':'' ?>" id="titulo" 
                             value="<?= $dados['titulo'] ?> ">
                             
                        <div class="invalid-feedback">
                            <?= $dados['titulo_erro'] ?>
                        </div>
                </div>
                <div class="form-group p-2">
                    <label for="texto" >Texto: </label>
                      <textarea name="texto" class="form-control <?= $dados['senha_erro']?'is-invalid':'' ?>" id="texto" ><?= $dados['texto']?></textarea>
                        <div class="invalid-feedback">
                            <?= $dados['texto_erro'] ?>
                        </div>
                </div>
                
            
                        <input type="submit" value="Atualizar Post" class="btn btn-info btn-block">
               
            </form>
        </div>
    </div>
</div>