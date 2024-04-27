<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loja - Cidades</title>
</head>

<body>
    <h1>Cidades</h1>

    <form method="POST" action="../controller/cidadeController.php?action=inserirCidade">
        <label>Nome: </label>
        <input type="text" placeholder="Digite o nome da cidade..." name="txtNome" />
        <br>
        <input type="submit" value="Salvar" />
        <input type="reset" value="Limpar" />
    </form>
    <hr>

    <?php
        require_once('consultaCidades.php');

        if( isset($_REQUEST["nomeVazio"])){
            echo "<script> alert('O campo nome não pode ser vazio!'); </script>";
        }

        if( isset($_REQUEST["nome"])){
            $nome = $_REQUEST["nome"];
            echo "<script> alert('Cidade $nome cadastrada com sucesso!'); </script>";
        }

        if( isset($_REQUEST["novoNome"])){
            $novoNome = $_REQUEST["novoNome"];
            echo "<script> alert('Cidade $novoNome foi atualizada com sucesso!'); </script>";
        }

        if( isset($_REQUEST["excluido"])){
            echo "<script> alert('Cidade excluida com sucesso!'); </script>";
        }

        if( isset($_REQUEST["erro"])){
            echo "<script> alert('Erro! Não foi possível cadastrar!'); </script>";
        }
    ?>

</body>

</html>