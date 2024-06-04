<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CADASTRO - Cidades / Clientes</title>
</head>
<body>
    <br>
    <?php require_once('menu.php'); ?>

    <center><img src="img/cesta.png" height="150px"/></center>
    <h1 align="center"> LOJA 2024/1 </h1>

    <?php
    if ( isset($_REQUEST["usuarioInvalido"]) ){
        echo "<script> alert('E-mail ou senha incorretos!'); </script>";
    }

    ?>
    
</body>
</html>


