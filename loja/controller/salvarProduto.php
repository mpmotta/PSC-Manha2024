<?php

include_once("../dao/clsConexao.php");

include_once("../dao/clsProdutoDAO.php");
include_once("../model/clsProduto.php");

//INSERIR PRODUTO

if(isset($_REQUEST["inserir"])){
    $nome = $_POST["txtNomeProduto"];
    $valor = $_POST["txtValorProduto"];
    if(strlen($nome) == 0 ){
        header("Location: ../produtos.php?nomeVazio");
    }elseif(strlen($valor) == 0 ){
        header("Location: ../produtos.php?valorVazio");    
    }else{
      
        $produto = new Produto();
        $produto->nome = $nome;
        $produto->valor = $valor;

        ProdutoDAO:: inserir($produto);
        header("Location: ../produtos.php?nome=$nome");
    }
}

// EXCLUIR PRODUTO

if(isset($_REQUEST["excluir"]) && isset($_REQUEST["id"])){
    $id = $_REQUEST["id"];
    ProdutoDAO:: excluir($id);
    header("Location: ../produtos.php?produtoExcluido");
}

// EDITAR PRODUTO

if( isset( $_REQUEST["editar"] ) &&  isset( $_REQUEST["id"] ) ){
    $id = $_REQUEST["id"] ;
    $nome = $_POST["txtNomeProduto"];
    $valor = $_POST["txtValorProduto"];
  
    ProdutoDAO::editar($nome, $valor, $id );
    header( "Location: ../produtos.php?produtoEditado");
}