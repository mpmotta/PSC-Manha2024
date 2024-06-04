<?php
class ProdutoDAO{

// METODOS ESCREVER BANCO

//INSERIR
    public static function inserir($produto){
        $nome = $produto->nome;
        $valor = $produto->valor;

        $sql = "INSERT INTO produto (nome, valor) VALUES ('$nome', '$valor');";
        $id = Conexao::executarComRetornoId($sql);
        return $id;
    }

//EDITAR
    public static function editar($produto, $val, $idProduto){
        
        $nome = $produto;
        $valor = $val;
        $id = $idProduto;

        $sql = "UPDATE produto SET 
                nome = '$nome',
                valor = '$valor'
                WHERE id = $id;" ;
        Conexao::executar( $sql );
    }


//EXCLUIR
    public static function excluir($idProduto){
            $sql = "DELETE FROM produto WHERE id = $idProduto;";
            Conexao::executar($sql);
            }

// METODO CONSULTAR BANCO
    public static function getProdutos(){
        //retorna todas os produtos
        $sql = "SELECT p.id, p.nome, p.valor
            FROM produto p 
            ORDER BY p.nome";
        
        $result = Conexao::consultar($sql);
        $lista = new ArrayObject();
        if($result != NULL){
            while(list($_id, $_nome, $_valor) = mysqli_fetch_row($result)){
                $produto=new Produto();
                $produto->id = $_id;
                $produto->nome = $_nome;
                $produto->valor = $_valor;

                $lista->append($produto);
            }
        }
        return $lista;
    }

    public static function getProdutoById($id){
        $sql = "SELECT p.nome, p.valor
        from produto p WHERE p.id = $id";
        
        $result = Conexao::consultar( $sql );
        if( $result != NULL ){
            $row = mysqli_fetch_assoc($result);
            if($row){
                $produto = new Produto();
                $produto->nome = $row['nome'];
                $produto->valor = $row['valor'];

                return $produto;
    }
}
return null;
    }

}