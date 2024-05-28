<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loja - Clientes</title>
</head>

<body>

    <?php 
    $id = $_GET['id'];
    
    require_once('menu.php'); 
    
    include_once("model/clsCidade.php");
    include_once("model/clsCliente.php");
    include_once("dao/clsClienteDAO.php");
    include_once("dao/clsConexao.php");

    $cliente = ClienteDAO::getClienteById($id);
    
    ?>

    <h1>Editar Cidade</h1>

    <form method="POST" action="controller/salvarCliente.php?editar&id=<?=$id ?>">
        <label>Nome: </label>
        <input type="text" value="<?=$cliente->nome ?>" name="txtNome" />
        <br>
        <label>Data de Nascimento: </label>
        <input type="date" value="<?=$cliente->nascimento ?>" name="txtNascimento" />
        <br>
        <label>Salário: </label>
        <input type="number" value="<?=$cliente->salario ?>" step="0.01" name="txtSalario" />
        <br>
        <label>Codigo Cidade: </label>
        <input type="number" value="<?=$cliente->cidade ?>" step="0.01" name="txtCodCidade" />
        <br>
        <input type="submit" value="Salvar Alterações" />
    </form>
    <hr>


</body>

</html>