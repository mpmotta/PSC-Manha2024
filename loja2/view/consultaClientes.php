<?php
    require_once('../controller/clienteController.php');
    $controller = new clienteController();
    $result = $controller->consultar();
?>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Nascimento</th>
        <th>Salário</th>
        <th>Código Cidade</th>
        <th>Editar</th>
        <th>Excluir</th>
    </tr>

    <?php
            foreach ($result as $linha){
                    $id = $linha['id'];
                    $nome = $linha['nome'];
                    $nascimento = $linha['nascimento'];
                    $nascimento = date('d/m/Y', strtotime($nascimento));
                    $salario = $linha['salario'];
                    $salario = "R$ " . number_format($salario, 2, ',', '.');
                    $codCidade = $linha['codCidade'];
                    
                echo"<tr>
                        <td>" . $id . "</td>
                        <td>" . $nome . "</td>
                        <td>" . $nascimento . "</td>
                        <td>" . $salario . "</td>
                        <td>" . $codCidade . "</td>
                        <td><a href='editarCliente.php?id=$id'>editar</a></td>
                        <td><a href='../controller/clienteController.php?action=excluirCliente&id=$id'
                        onclick='return confirm(\"Tem Certeza?\")'>excluir</a></td>
                     </tr>";   
            }
        ?>
</table>