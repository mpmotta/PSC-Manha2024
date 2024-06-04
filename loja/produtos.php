<?php
    session_start();

    if(!isset($_SESSION["logado"]) || $_SESSION["logado"] == false){
        header("Location: index.php");
    }else{

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CADASTRO PRODUTOS</title>
</head>

<body>
    <br>
    <?php require_once('menu.php'); ?>

    <h1>Cadastrar Produtos:</h1>

    <form method="POST" action="controller/salvarProduto.php?inserir">
        <label>Nome:</label>
        <input type="text" placeholder="Nome do produto..." name="txtNomeProduto" />
        <br><br>
        <label>Valor:</label>
        <input type="number" step="0.01" name="txtValorProduto" />
        <br><br>
        <input type="submit" value="Salvar" />
        <input type="reset" value="Limpar" />
    </form>
    <br>
    <hr>

    <?php
            include_once ("model/clsProduto.php");
            include_once ("dao/clsProdutoDAO.php");
            include_once ("dao/clsConexao.php");

            $produtos = ProdutoDAO::getProdutos();

                if(count($produtos) == 0){
                    echo "<h1>Nenhum produto cadastrado!</h1>";
                }else{
        ?>
    <table border="2">
        <caption>produtos cadastrados</caption>
        <tr>
            <th>Código</th>
            <th>Nome</th>
            <th>Valor</th>
            <th>Editar</th>
            <th>Excluir</th>
        </tr>

        <?php
            foreach($produtos as $produto){
                $id = $produto->id;
                $nome=$produto->nome;
                $valor=$produto->valor;
                echo "  <tr>
                            <td>$id</td>
                            <td>$nome</td>
                            <td>$valor</td>
                            <td><a href='editarProduto.php?id=$id'><button>Editar</button></a></td>
                        
                        <td><a onclick='return confirm(\"Você tem certeza que deseja apagar?\")'
                        href='controller/salvarProduto.php?excluir&id=$id'>
                                <button>Excluir</button></a></td>
                    </tr>";


            }
        ?>
    </table>
    <tr>
        <h3>Foram cadastrados <?php echo count($produtos)?> produtos até
            <?php date_default_timezone_set("America/Sao_Paulo"); 
                         echo date("d/m/Y")?></h3>
    </tr>

    <?php
    }
        if(isset($_REQUEST["nomeVazio"])){
            echo "<script> alert('O campo nome não pode ser vazio!');</script>";
        }
        if(isset($_REQUEST["valorVazio"])){
            echo "<script> alert('O campo valor não pode ser vazio!');</script>";
        }
        if(isset($_REQUEST["nome"])){
            $nome= $_REQUEST["nome"];
            echo "<script>alert('Produto $nome cadastrado com sucesso!');</script>";
        }
        if(isset($_REQUEST["produtoExcluido"])){
            echo "<script>alert('Produto excluído com sucesso!');</script>";
        }
        if(isset($_REQUEST["produtoEditado"])){
            echo "<script>alert('Produto editado com sucesso!');</script>";
        }
    ?>

</body>

</html>

<?php

    }

    