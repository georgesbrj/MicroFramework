<div class="container py-5">
  <?=Sessao::mensagem('post') ?> 
   <div class="card">
      <div class="card-header bg-info text-white">
         POSTAGENS
         <div class="float-right">
             <a href="<?= URL?>/posts/cadastrar" class="btn btn-light">Escrever</a>
         </div>
      </div>  
  
    

       
            <div class="card-body">
            <?php foreach($dados['posts'] as $post) :
               ?>
                
               <div class="card my-5">
                  <div class="card-header">
                    <p>Titulo: <?= $post->titulo ?></p>
                  </div>
                  <div class="card-body">
                    <p><?= $post->texto?></p>
                    <a href="<?= URL.'/posts/ver/'.$post->postID ?>" class="btn btn-primary float-right">Ler mais</a>
                  </div>
                  <div class="card-footer text-muted">
                       <p>Escrito por <?= $post->nome ?> em 
                       <?= Chek::formDate($post->postDataCadastro) ?></p>
                  </div>
               </div>

           <?php endforeach ?>
            </div>
    
  </div>
</div>

