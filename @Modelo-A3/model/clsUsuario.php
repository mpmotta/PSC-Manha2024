<?php

    class Usuario{

        public $idUsuario, $nomeUsuario, $emailUsuario, 
        $loginUsuario, $senhaUsuario, $telefoneCelular, $ativo;

        public function __construct($idUsuario = NULL, $nomeUsuario = NULL, $emailUsuario = NULL, 
        $loginUsuario = NULL, $senhaUsuario = NULL, $telefoneCelular = NULL, $ativo = NULL){

            $this->idUsuario = $idUsuario;
            $this->nomeUsuario = $nomeUsuario;
            $this->emailUsuario = $emailUsuario;
            $this->loginUsuario = $loginUsuario; 
            $this->senhaUsuario = $senhaUsuario;
            $this->telefoneCelular = $telefoneCelular; 
            $this->ativo = $ativo;             
        }

    }