<?php
session_start();

if( !isset($_SESSION["logado"]) || $_SESSION["logado"] == false ){
    header("Location: index.php");
}else{

?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Projeto A3 - Página Administrativa</title>
</head>

<body>
    <div class="container">
        <h1 class="text-center bg-secondary-subtle p-3">Projeto A3 - Página Administrativa</h1>
        <div class="row">
            <div class="col-sm-6"><?php echo "<h2> Olá " . $_SESSION["nome"] . "</h2>"; ?> </div>
            <div class="col-sm-5"></div>
            <div class="col text-right">
                <a href="sair.php" class="btn btn-danger">SAIR</a>

            </div>


        </div>
</body>

</html>

<?php
}
?>