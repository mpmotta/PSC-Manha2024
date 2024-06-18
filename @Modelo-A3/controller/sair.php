<?php
session_start();

/* Para elimirar parametro na sessao
if (isset ($_SESSION["logado"]) ){
    unset ($_SESSION["logado"]);
    }
*/

session_destroy();
header ("Location: ../index.php");



?>