<?php
    require_once('../controller/cidadeController.php');
    $controller = new cidadeController();
    $result = $controller->consultar();
?>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Editar</th>
        <th>Excluir</th>
    </tr>

    <?php
            foreach ($result as $linha){
                    $id = $linha['id'];
                    $nome = $linha['nome'];
                    
                echo"<tr>
                        <td>" . $id . "</td>
                        <td>" . $nome . "</td>
                        <td><a href='editarCidade.php?id=$id'>editar</a></td>
                        <td><a href='../controller/cidadeController.php?action=excluirCidade&id=$id'
                        onclick='return confirm(\"Tem Certeza?\")'>excluir</a></td>
                     </tr>";   
            }
        ?>
</table>