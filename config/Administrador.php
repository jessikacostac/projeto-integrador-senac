<?php
require_once "Database.php";
    class Administrador extends Database {
    private $id;
    private $nome;
    private $email;
    private $senha;  
        
    public function getId(){ return$this->id; }
    public function getNome(){ return$this->nome; }
    public function getEmail(){ return$this->email; }
    public function getSenha(){ return$this->senha; }
        
    public function setId($valorId){$this->id = $valorId; }
    public function setNome($valorNome){$this->nome = $valorNome; }
    public function setEmail($valorEmail){$this->email = $valorEmail; }
    public function setSenha($valorSenha){$this->senha = $valorSenha; }
    public function lerAdmin(){
        $sql = "SELECT * FROM administrador ORDER BY nome";
        return parent::executaQuery($sql);
    }
    public function inserirAdmin(){
        $sql = "INSERT INTO administrador (nome, email, senha)";
        $sql.=" VALUES('{$this->nome}', '{$this->email}', '{$this->senha}')";
        return parent::executaQuery($sql);
    }
   public function excluirAdm(){
        $sql = "DELETE FROM administrador WHERE id = {$this->id}";
        return parent::executaQuery($sql);
    }
    public function buscarUsuario(){
        $sql = "SELECT * FROM administrador WHERE email = '{$this->email}' AND senha = '{$this->senha}' ";
        return parent::executaQuery($sql);
    }
    public function codificaSenha($valorSenha){
        return hash("sha256", $valorSenha);
    }
    public function verificaSenha($senhaNoFormulario, $senhaNoBanco){

        if( $senhaNoFormulario == $senhaNoBanco ){
            return $senhaNoBanco;
        }else {
            return $this->codificaSenha($senhaNoFormulario);
        }
    }      
}