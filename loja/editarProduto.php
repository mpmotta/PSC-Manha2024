<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EDITAR PRODUTO</title>
</head>

<body>
    <br>

    <?php 
    $id= $_GET['id'];
    
    require_once('menu.php');

    include_once ("dao/clsConexao.php");
  
    include_once ("model/clsProduto.php");
    include_once ("dao/clsProdutoDAO.php");


    $produto = ProdutoDAO::getProdutoById($id);
    
    ?>

    <h1>Editar Produto:</h1>
    <form method="POST" action="controller/salvarProduto.php?editar&id=<?=$id ?>">
        <label>Nome: </label>
        <input type="text" value="<?=$produto->nome ?>" name="txtNomeProduto" />
        <br><br>
        <label>Valor: </label>
        <input type="number" value="<?=$produto->valor ?>" step="0.01" name="txtValorProduto" />
        <br><br>
        <input type="submit" value="Salvar alterações" />
    </form>
    <br>
    <hr>

</body>

</html>