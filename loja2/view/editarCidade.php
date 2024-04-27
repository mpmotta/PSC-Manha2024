<?php
    $id = $_GET['id'];
    require_once('../controller/cidadeController.php');
    $controller = new cidadeController();
    $cidade = $controller->consultaID($id);
    $nome = $cidade->getNome();

?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loja - Editar Cidade</title>
</head>

<body>
    <h1>Editar Cidade</h1>

    <form method="POST" action="../controller/cidadeController.php?action=editarCidade">
        <label>Nome: </label>
        <input type="hidden" value="<?=$id?>" name="id" />
        <input type="text" value="<?=$nome?>" name="txtNome" />
        <br>
        <input type="submit" value="Salvar" />
        <input type="reset" value="Limpar" />
    </form>
    <hr>

    <?php

        if( isset($_REQUEST["nomeVazio"])){
            echo "<script> alert('O campo nome não pode ser vazio!'); </script>";
        }

        if( isset($_REQUEST["nome"])){
            $nome = $_REQUEST["nome"];
            echo "<script> alert('Cidade $nome cadastrada com sucesso!'); </script>";
        }

        if( isset($_REQUEST["erro"])){
            echo "<script> alert('Erro! Não foi possível cadastrar!'); </script>";
        }
    ?>

</body>

</html>