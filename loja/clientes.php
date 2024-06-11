<?php

    session_start();

    if(!isset($_SESSION["logado"]) || $_SESSION["logado"] == false){
        header("Location: index.php");
    }else{


   include_once ("dao/clsConexao.php");

   include_once ("model/clsCidade.php");
   include_once ("dao/clsCidadeDAO.php");
 
   include_once ("model/clsCliente.php");
   include_once ("dao/clsClienteDAO.php");
   
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CADASTRO CLIENTES</title>
</head>

<body>
    <br>
    <?php require_once('menu.php'); ?>

    <h1>Cadastrar clientes:</h1>
    <form method="POST" action="controller/salvarCliente.php?inserir">
        <label>Nome:</label>
        <input type="text" placeholder="Insira o nome do cliente..." name="txtNome" />
        <br><br>
        <label>Data de Nascimento:</label>
        <input type="date" name="txtNascimento" />
        <br><br>
        <label>Salário:</label>
        <input type="numer" step="0.01" name="txtSalario" />
        <br><br>

        <label>Cidade:</label>
        <select name="txtCidade">
            <option value="0"> Selecione...</option>


            <?php
                $cidades = CidadeDAO::getCidades();
                foreach($cidades as $lista){
                    echo '<option value="'.$lista->id.'">'. $lista->nome.'</option>';
                }
            ?>

        </select>
        <br><br>
        <input type="submit" value="Salvar" />
        <input type="reset" value="Limpar" />

    </form>
    <br>
    <hr>


    <?php

         // LISTAR CLIENTES

            $clientes = ClienteDAO::getClientes();
                if(count($clientes) == 0){
                    echo "<h2>Nenhum cliente cadastrado!</h2>";
                }else{
        ?>
    <table border="2">
        <caption>Clientes cadastrados</caption>
        <tr>
            <th>Código</th>
            <th>Nome</th>
            <th>Salário</th>
            <th>Nascimento</th>
            <th>Cidade</th>
            <th>Editar</th>
            <th>Excluir</th>
        </tr>
        <?php
            foreach($clientes as $cli){
                $id = $cli->id;
                $salario = "R$ " . number_format($cli->salario,2,",",".");
            echo "  <tr>
                            <td>$id</td>
                            <td>".$cli->nome."</td>
                            
                            <td>".$salario."</td>
                            <td>".$cli->nascimento."</td>
                            <td>".$cli->cidade->nome."</td>
                            <td><a href='editarCliente.php?id=$id'><button>Editar</button></a></td>
                           
                            <td><a onclick='return confirm(\"Você tem certeza que deseja apagar?\")' 
                            href='controller/salvarCliente.php?excluir&id=$id'>
                                <button>Excluir</button></a></td>
                        </tr>";

            }
        ?>

        <tr>
            <h3>Foram cadastrados <?php echo count($clientes)?> clientes até
                <?php date_default_timezone_set("America/Sao_Paulo"); 
                         echo date("d/m/Y")?></h3>
        </tr>

    </table>
    <hr>
    <a href="relatorioClientes.php" target="_blank">Gerar Relatório</a>
    <?php
    }
        if(isset($_REQUEST["nomeVazio"])){
            echo "<script> alert('O campo nome não pode ser vazio!');</script>";
        }
        if(isset($_REQUEST["nome"])){
            $nome= $_REQUEST["nome"];
            echo "<script>alert('Cliente $nome cadastrado(a) com sucesso!');</script>";
        }
        if(isset($_REQUEST["clienteExcluido"])){
            echo "<script>alert('Cliente excluído com sucesso!');</script>";
        }

        if(isset($_REQUEST["clienteEditado"])){
            echo "<script>alert('Cliente editado com sucesso!');</script>";
        }


    ?>

</body>

</html>

<?php
    }