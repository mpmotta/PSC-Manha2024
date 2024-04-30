<?php
    require_once('../model/clienteModel.php');

    class ClienteController{

        public function consultar(){
            $cliente = new Cliente();
            $result = $cliente->consulta();
            return $result;
        }

        public function consultaID($id){
            $cliente = new Cliente();
            $result = $cliente->consultaID($id);
            return $cliente;
        }

        public function inserir(){

            $nome = $_POST["txtNome"]; 
            $nascimento = $_POST["txtNascimento"]; 
            $salario = $_POST["txtSalario"]; 
            $codCidade = $_POST["txtCodCidade"]; 

            if(strlen($nome) == 0 || strlen($nascimento) == 0  
            || strlen($salario) == 0 || strlen($codCidade) == 0 ){
                header( "Location: ../view/clientes.php?campoVazio");
            }elseif($_SERVER['REQUEST_METHOD'] === 'POST') {

                $novoCliente = new Cliente();
                $novoCliente->inserir($nome,$nascimento,$salario,$codCidade);
                header('Location: ../view/clientes.php?nome='.$nome);
            }else{
                header( "Location: ../view/clientes.php?erro");
            }
            
        }
        
        public function editar(){
            $id = $_POST["id"]; 
            $nome = $_POST["txtNome"]; 
            $nascimento = $_POST["txtNascimento"]; 
            $salario = $_POST["txtSalario"]; 
            $codCidade = $_POST["txtCodCidade"]; 

            if(strlen($nome) == 0 || strlen($nascimento) == 0  
            || strlen($salario) == 0 || strlen($codCidade) == 0 ){
                header( "Location: ../view/editarCliente.php?campoVazio&id=$id");
            }elseif($_SERVER['REQUEST_METHOD'] === 'POST') {

                $cliente = new Cliente();
                $cliente->editar($nome,$nascimento,$salario,$codCidade, $id);
                header('Location: ../view/clientes.php?novoNome='.$nome);
            }else{
                header( "Location: ../view/clientes.php?erro");
            }
        }


        public function excluir(){
            $id = $_GET['id'];
            $excluiCliente = new Cliente();
            $excluiCliente->apagar($id);
            
        }
        

        public function handleRequest() {
            if (isset($_GET['action']) && $_GET['action'] == 'inserirCliente'){
                $this->inserir();
            } 

            if (isset($_GET['action']) && $_GET['action'] == 'editarCliente'){
                $this->editar();
            } 
            
            if (isset($_GET['action']) && $_GET['action'] == 'excluirCliente'){
                $this->excluir();
            } 

        }
        
    }
    $ClienteController = new ClienteController();
    $ClienteController->handleRequest();
    

    