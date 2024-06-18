<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projeto A3</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <h1 class="text-center bg-secondary-subtle p-3">Projeto A3 - Página Inicial</h1>
        <h2>Login de Usuário</h2>
        <form method="post" action="controller/logar.php">
            <label for="login" class="form-label">Login de Usuário:</label>
            <input class="form-control" type="text" name="txtLogin" id="login" required>

            <label for="senha" class="form-label">Senha:</label>
            <input class="form-control" type="password" name="txtSenha" id="senha" required>

            <input type="submit" value="Logar no Sistema" class="btn btn-primary mt-2">
        </form>

    </div>
    <?php
    if(isset($_GET["deslogado"])){
        echo "<script>
                alert('Usuário deslogado com sucesso!');
            </script>";
    }

    if( isset($_REQUEST["usuarioInvalido"])){
        echo "<script> alert('Usuário/Senha inválidos!'); </script>";
    }
    ?>

</body>

</html>