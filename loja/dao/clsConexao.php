<?php
class Conexao {

//ABRIR
    private static function abrir(){
        $banco = "market_2024_1";
        $local = "localhost";
        $user = "root";
        $senha = "usbw";
        $conn = mysqli_connect ($local, $user, $senha, $banco);
        if ($conn){
            return $conn;
        }else{
            return NULL;
        }
    }

//FECHAR
    private static function fechar($conn){
        if ($conn) mysqli_close($conn);
    }

//CONSULTAR
    public static function consultar($sql){
        $conn = self::abrir();
        if ($conn){
            $result = mysqli_query($conn, $sql);
            self::fechar($conn);
            return $result;
        }else{
            return NULL;
        }
    }

//EXECUTAR
    public static function executar($sql){
        $conn = self::abrir();
        if ($conn){
            mysqli_query($conn, $sql);
            self::fechar($conn);
            }
    }
    
//CONSULTAR COM RETORNO ID
    public static function executarComRetornoId($sql){
        $conn = self::abrir();
        $id = 0;
        if ($conn){
            mysqli_query($conn, $sql);
            $id = mysqli_insert_id($conn);
            self::fechar($conn);
            }
        return $id;
    }
}