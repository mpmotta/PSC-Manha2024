<a href="index.php">
    <button>Início</button></a><br><br>

<?php

if ( session_status() != PHP_SESSION_ACTIVE){
    session_start();
}

if (isset($_SESSION["logado"]) && $_SESSION["logado"] == TRUE){

?>
<a href="cidades.php">
    <button>Cidades</button></a>

<a href="clientes.php">
    <button>Clientes</button></a>

<a href="produtos.php">
    <button>Produtos</button></a>

<a href="controller/sair.php">
    <button>Sair</button></a>
| Olá <?php echo $_SESSION["nome"]; ?>



<?php

}else{
?>
<form action="controller/logar.php" method="POST">
    <input type="email" name="txtEmail" placeholder="E-mail: " required />
    <input type="password" name="txtSenha" placeholder="Senha: " required />
    <input type="submit" value="Entrar" />

</form>

<?php

}