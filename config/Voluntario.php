<?php
require_once "Database.php";
    class Voluntario extends Database{
    private $id;
    private $nome;
    private $endereco;
    private $cep;
    private $email;
    private $telefone;
        
    public function getId(){ return $this->id; }
    public function getNome(){ return $this->nome; }
    public function getEndereco(){ return $this->endereco; }
    public function getCep(){ return $this->cep; }
    public function getEmail(){ return $this->email; }
    public function getTelefone(){ return $this->telefone; }
        
    public function setId($valorId){$this->id = $valorId; }
    public function setNome($valorNome){$this->nome = $valorNome; }
    public function setEndereco($valorEndereco){$this->endereco = $valorEndereco; }
    public function setCep($valorCep){$this->cep = $valorCep; }
    public function setEmail($valorEmail){$this->email = $valorEmail; }
    public function setTelefone($valorTelefone){$this->telefone = $valorTelefone; }
    public function cadastrarVoluntario(){
    $sql = "INSERT INTO voluntarios (nome, endereco, cep, email, telefone)";
    $sql.= " VALUES('{$this->nome}', '{$this->endereco}', '{$this->cep}', ";
    $sql.= " '{$this->email}', '{$this->telefone}')";
    return parent::executaQuery($sql);
    }
    public function lerVoluntario(){
    $sql = "SELECT * FROM voluntarios WHERE id ";
    $sql.= " ORDER BY nome";
    return parent::executaQuery($sql);
    } 
}