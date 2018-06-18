<?php
class Database {
    private $servidor;
    private $usuario;
    private $senha;
    private $banco;
    private $conexao;
    public function __construct(){
        $this->servidor = "localhost";
        $this->usuario = "root";
        $this->senha = "";
        $this->banco = "meu-amigo-pet_voluntarios";
        $this->conexao = mysqli_connect($this->servidor, $this->usuario, $this->senha, $this->banco);
        if( $this->conexao ){
            mysqli_set_charset($this->conexao, "utf8");
        } else {
            die("Erro ao conectar: " .mysqli_connect_error());
        }  
    }
    protected function executaQuery($sql){
        $resultado = mysqli_query($this->conexao, $sql) or die(mysqli_error($this->conexao));
        return $resultado;
    }
    public function __destruct(){
        mysqli_close($this->conexao);
    }
}