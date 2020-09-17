<div class="container my-5">
    <div class="card">
        <div class="card-header">
            <?= $dados['post']->titulo ?>
            </div>
            <div class="card-body">
                <p class="card-text"><?= $dados['post']->texto ?></p>
        </div>
        <div class="card-footer text-muted">
           Escrito por <?= $dados['usuario']->nome ?> em <?= Chek::formDate($dados['post']->criado_em) ?>
        </div>

        <?php if($dados['post']->usuario_id == $_SESSION['usuario_id']): ?>
            <ul class="list-inline text-center">
                <li class="list-inline-item">
                     <a href="<?= URL.'/posts/editar/'.$dados['post']->id ?>" class="btn btn-sm btn-primary">Editar</a>
                </li>
                <li class="list-inline-item">
                    <form action="<?= URL.'/posts/deletar/'.$dados['post']->id ?>" method="POST">
                       <input type="submit" class="btn btn-sm btn-danger" value="Deletar">
                    </form>
                </li>
            </ul>
             
         <?php endif ?>   
    </div>
</div>