<?php
class ClienteDAO{

    public static function inserir( $cliente ){
        $nome = $cliente->nome;
        $nascimento = $cliente->nascimento;
        $salario = $cliente->salario;
        $idCidade = $cliente->cidade->id;
        
        $sql = "INSERT INTO cliente (nome, nascimento, salario, codCidade) VALUES 
                ('$nome' , '$nascimento' , $salario , $idCidade );" ;
        $id = Conexao::executarComRetornoId( $sql );
        return $id;
    }


    public static function editar($cliente, $nasc, $sal, $cidade, $idCliente ){
        
        $nome = $cliente;
        $nascimento = $nasc;
        $salario = $sal;
        $codCidade = $cidade;
        $id = $idCliente;

        $sql = "UPDATE cliente SET 
                nome = '$nome',
                nascimento = '$nascimento',
                salario = '$salario',
                codCidade = '$codCidade'
                WHERE id = $id;" ;
        Conexao::executar( $sql );
    }


    
    public static function excluir( $idCliente ){
        $sql = "DELETE FROM cliente WHERE id = $idCliente;" ;
        Conexao::executar( $sql );
    }

    public static function getClientes(){
        $sql = "SELECT p.id , p.nome, p.salario, DATE_FORMAT( p.nascimento , '%d/%m/%Y') AS nascimento ,
                        c.id AS codCid , c.nome AS nomeCid
                FROM cliente p 
                LEFT JOIN cidade c ON c.id = p.codCidade
                ORDER BY p.nome";
        
        $result = Conexao::consultar( $sql );
        $lista = new ArrayObject();
        if( $result != NULL ){
            while( list($_id , $_nome, $_salario , $_nascimento, $_codCid , $_nomeCid) = mysqli_fetch_row($result) ){

                $cid = new Cidade();
                $cid->id = $_codCid;
                $cid->nome = $_nomeCid;

                $cli = new Cliente();
                $cli->id = $_id;
                $cli->nome = $_nome;
                $cli->salario = $_salario;
                $cli->nascimento = $_nascimento;
                $cli->cidade = $cid;

                $lista->append( $cli );
            }
        }
        return $lista;
    }

    public static function getClienteById($id){
        $sql = "SELECT p.nome, p.salario, p.nascimento, p.codCidade
                from cliente p WHERE p.id = $id";
                
        $result = Conexao::consultar( $sql );
        if( $result != NULL ){
            $row = mysqli_fetch_assoc($result);
            if($row){
                $cliente = new Cliente();
                $cliente->nome = $row['nome'];
                $cliente->nascimento = $row['nascimento'];
                $cliente->salario = $row['salario'];
                $cliente->cidade = $row['codCidade'];
                return $cliente;
            }
        }
        return null;
    }  

}