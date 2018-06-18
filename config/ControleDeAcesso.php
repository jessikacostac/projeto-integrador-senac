<?php
class ControleDeAcesso {
    public function __construct(){
        session_start();
    }
    public function login($id, $nome, $email){
        $_SESSION['id'] = $id;
        $_SESSION['nome'] = $nome;
        $_SESSION['email'] = $email;
    }
    public function logout(){
        session_start();
        session_destroy();
        header("location:../login.php?logout");
        exit;
    }
    public function verificaPermissao(){
        if(!isset($_SESSION['id']) ){
            session_destroy();
            header("location:../login.php?acesso_proibido");
            exit;
        } else{
            return true;
        }
    }
}