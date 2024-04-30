<?php
    $id = $_GET['id'];
    require_once('../controller/clienteController.php');
    $controller = new clienteController();
    $cliente = $controller->consultaID($id);
    $nome = $cliente->getNome();
    $nascimento = $cliente->getNascimento();
    $salario = $cliente->getSalario();
    $codCidade = $cliente->getCodCidade();
    

?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loja - Editar Cliente</title>
</head>

<body>
    <h1>Editar Cliente</h1>

    <form method="POST" action="../controller/clienteController.php?action=editarCliente">
        <input type="hidden" value="<?=$id?>" name="id" />
        <label>Nome: </label>
        <input type="text" value="<?=$nome?>" name="txtNome" />
        <br>
        <label>Nascimento: </label>
        <input type="date" value="<?=$nascimento?>" name="txtNascimento" />
        <br>
        <label>Salario: </label>
        <input type="text" value="<?=$salario?>" name="txtSalario" />
        <br>
        <label>Código Cidade: </label>
        <input type="text" value="<?=$codCidade?>" name="txtCodCidade" />
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