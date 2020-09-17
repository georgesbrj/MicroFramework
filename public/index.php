<?php  
session_start();
include './../app/phperror.php';
include './../app/config/config.php';
include './../app/autoload.php';
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >

    <link rel="stylesheet" href="<?= URL ?>/public/css/estilos.css">
     <title>MVC com PHP</title>
</head>
<body>



<div>
<?php

 include '../app/Views/header.php';
   $rotas = new Rota(); 
 include '../app/Views/footer.php';  

?>
</div>




<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" ></script>
<script src="<?= URL ?>/public/js/main.js"></script>
</body>

</html>