<?php
class CidadeDAO{

// METODOS ESCREVER BANCO

//INSERIR
    public static function inserir($cidade){
        $nome = $cidade->nome;
        $sql = "INSERT INTO cidade (nome) VALUES ('$nome');";
        $id = Conexao::executarComRetornoId($sql);
        return $id;
    }

//EDITAR
public static function editar( $cidade, $id ){
    $id_cidade = $id;
    $nome = $cidade;
    $sql = "UPDATE cidade SET nome = '$nome' WHERE id = $id_cidade ;" ;
    Conexao::executar( $sql );
}

//EXCLUIR
    public static function excluir($idCidade){
            $sql = "DELETE FROM cidade WHERE id = $idCidade;";
            Conexao::executar($sql);
            }

// METODO CONSULTAR BANCO

    public static function getCidades(){
        //retorna todas as cidades
        $sql = "SELECT id, nome FROM cidade ORDER BY nome;";
        $result = Conexao::consultar($sql);
        $lista = new ArrayObject();
        if($result != NULL){
            while(list($_id, $_nome) = mysqli_fetch_row($result)){
                $cid=new Cidade();
                $cid->id = $_id;
                $cid->nome = $_nome;
                $lista->append($cid);
                }
         }
         return $lista;
    }

    public static function getCidadesById($id){
        $sql = "SELECT id , nome FROM cidade WHERE id = $id";
        $result = Conexao::consultar( $sql );
        if( $result != NULL ){
            $row = mysqli_fetch_assoc($result);
            if($row){
                $cidade = new Cidade();
                $cidade->nome = $row['nome'];
                return $cidade;
            }
        }
        return null;
    }
}