<?php
class Cidade{
    public $id;
    public $nome;

    public function __construct($id_cidade=NULL, $nome_cidade=NULL){
        $this->id= $id_cidade;
        $this->nome=$nome_cidade;
    }

}