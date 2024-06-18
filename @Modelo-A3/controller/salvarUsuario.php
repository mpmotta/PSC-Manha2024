<?php

include_once("../dao/clsConexao.php");
include_once("../dao/clsUsuarioDAO.php");
include_once("../model/clsUsuario.php");

//INSERIR USUARIO

if(isset($_REQUEST["inserir"])){
    $nome = $_POST["txtNome"];
    $email = $_POST["txtEmail"];
    $login = $_POST["txtLogin"];
    $senha = $_POST["txtSenha"];
    $senha = md5($senha);
    $celular = $_POST["txtCelular"];
    
    if(strlen($nome) == 0 ){
        header("Location: ../cadastra.php?nomeVazio");
    }else{
        $usuario = new Usuario();
        $usuario->nomeUsuario = $nome;
        $usuario->emailUsuario = $email;
        $usuario->loginUsuario = $login;
        $usuario->senhaUsuario = $senha;
        $usuario->telefoneCelular = $celular;
        UsuarioDAO:: inserir($usuario);
        header("Location: ../cadastra.php?nome=$nome");
    }
}

// EXCLUIR USUARIO

if(isset($_REQUEST["excluir"]) && isset($_REQUEST["id"])){
    $id = $_REQUEST["id"];
    UsuarioDAO:: excluir($id);
    header("Location: ../cadastra.php?usuarioExcluido");
}


// EDITAR USUARIO

if( isset( $_REQUEST["editar"] ) &&  isset( $_REQUEST["id"] ) ){
    $nome = $_POST["txtNome"];
    $id = $_REQUEST["id"];
    UsuarioDAO::editar( $nome, $id );
    header( "Location: ../cadastra.php?usuarioEditado");
}