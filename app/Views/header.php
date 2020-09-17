<header class="bg-dark" >
<nav class="navbar navbar-expand-sm navbar-dark">
      <a class="navbar-brand" href="<?= URL?>"></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="<?= URL?>">Home </a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="<?= URL?>/pagina/contato/">Contato</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="<?= URL?>/pagina/sobre/">Sobre</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="<?= URL?>/pagina/somos/">Quem somos</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="<?= URL?>/posts/index/">Posts</a>
          </li>
        </ul>
       <?php if(isset($_SESSION['usuario_id'])):  ?>
        <span class="navbar-text p-2">
         <p class="text-white my-2">Ola ,<?=$_SESSION['usuario_nome'] ?></p>
         </span>
         <a class="btn btn-sm btn-danger" href="<?= URL?>/usuarios/sair">Sair</a>
        

       <?php else: ?>
        
         <span class="navbar-text">
                <a class="btn btn-info" href="<?= URL?>/usuarios/cadastrar" data-tooltip="tooltip" title="Nao tem uma conta cadastre-se">Cadastrar-se</a>
                <a class="btn btn-info" href="<?= URL ?>/usuarios/login" data-tooltip="tooltip" title="Tem uma conta cadastre-se">Entrar</a>
            </span>
       <?php endif; ?>
    </div>
</nav>
</header>
