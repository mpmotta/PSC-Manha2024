<?php
class Produto{
    public $id;
    public $nome;
    public $valor;

    public function __construct($id_produto=NULL, $nome_produto=NULL, $valor_produto=NULL){
        $this->id= $id_produto;
        $this->nome=$nome_produto;
        $this->valor=$valor_produto;
    }

}