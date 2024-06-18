<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Usuário</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <h1>Cadastro de Usuário</h1>
        <form method="post" action="controller/salvarUsuario.php?inserir">
            <label for="nome" class="form-label">Nome Completo:</label>
            <input class="form-control" type="text" name="txtNome" id="nome" required>

            <label for="email" class="form-label">E-mail:</label>
            <input class="form-control" type="email" name="txtEmail" id="email" required>

            <label for="login" class="form-label">Login de Usuário:</label>
            <input class="form-control" type="text" name="txtLogin" id="login" required>

            <label for="senha" class="form-label">Senha:</label>
            <input class="form-control" type="password" name="txtSenha" id="senha" required>

            <label for="senha2" class="form-label">Confirma Senha:</label>
            <input class="form-control" type="password" name="txtSenha2" id="senha2" oninput="validaSenha(this)"
                required>

            <label for="celular" class="form-label">Telefone Celular:</label>
            <input class="form-control" type="tel" name="txtCelular" id="celular" required>

            <input type="submit" value="Cadastrar Usuário" class="btn btn-success mt-2">

        </form>

        <?php

            if( isset($_REQUEST["nomeVazio"])){
                echo "<script> alert('O campo nome não pode ser vazio!'); </script>";
            }

            if( isset($_REQUEST["usuarioExcluido"])){
                echo "<script> alert('Usuário excluído com sucesso!'); </script>";
            }

            if( isset($_REQUEST["nome"])){
                $nome = $_REQUEST["nome"];
                echo "<script> alert('Usuário(a) $nome cadastrado(a) com sucesso!'); </script>";
            }
    ?>


    </div>

    <script>
    function validaSenha(input) {
        if (input.value != document.getElementById('senha').value) {
            input.setCustomValidity('As senhas devem ser iguais!');
        } else {
            input.setCustomValidity('');
        }
    }
    </script>
</body>

</html>