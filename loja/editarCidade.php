<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loja - Cidades</title>
</head>

<body>

    <?php 
    $id = $_GET['id'];
    
    require_once('menu.php'); 
    
    include_once("model/clsCidade.php");
    include_once("dao/clsCidadeDAO.php");
    include_once("dao/clsConexao.php");

    $cidade = CidadeDAO::getCidadeById($id);
    
    ?>

    <h1>Editar Cidade</h1>

    <form method="POST" action="controller/salvarCidade.php?editar&id=<?=$id ?>">
        <label>Nome: </label>
        <input type="text" value="<?=$cidade->nome ?>" name="txtNome" />
        <br>
        <input type="submit" value="Salvar Alterações" />
    </form>
    <hr>


</body>

</html>