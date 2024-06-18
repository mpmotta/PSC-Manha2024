<?php

class UsuarioDAO{


    public static function inserir($usuario){
        $nome = $usuario->nomeUsuario;
        $email = $usuario->emailUsuario;
        $login = $usuario->loginUsuario;
        $senha =  $usuario->senhaUsuario;
        $celular = $usuario->telefoneCelular;
        
        $sql = "INSERT INTO usuario (nomeUsuario, emailUsuario, loginUsuario,
        senhaUsuario, telefoneCelular, ativo) VALUES ('$nome', '$email', '$login',
        '$senha','$celular', 'S');";
        $id = Conexao::executarComRetornoId($sql);
        return $id;
    }
    
    
    public static function getUsuarioByLoginSenha($login, $senha){
        $sql = "SELECT idUsuario, nomeUsuario, emailUsuario 
                FROM usuario 
                WHERE loginUsuario = '$login' AND senhaUsuario = '$senha' ";
              
        $result = Conexao::consultar($sql);
            if (mysqli_num_rows($result) == 0){
                return null;
            }else{
                list($_id, $_nome, $_email) = mysqli_fetch_row($result);
                $user = new Usuario($_id, $_nome, $_email);
                return $user;
            }
    }

    //EDITAR
public static function editar( $usuario, $id ){
    $idUsuario = $id;
    $nome = $usuario;
    $sql = "UPDATE usuario SET nome = '$nome' WHERE id = $idUsuario ;" ;
    Conexao::executar( $sql );
}

//EXCLUIR
    public static function excluir($idUsuario){
            $sql = "DELETE FROM usuario WHERE id = $idUsuario;";
            Conexao::executar($sql);
            }

    

}



?>