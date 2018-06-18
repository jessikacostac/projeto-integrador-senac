<?php
require_once "Database.php";

class Evento extends Database{
    //Propriedades 
    private $id;
    private $data;
    private $titulo;
    private $informacoes;
    private $local;
    private $imagem;
    
    
    
    
    /*Getters*/    
    public function getId(){ return $this->id; }
    public function getData(){ return $this->data; }
    public function getTitulo(){ return $this->titulo; }
    public function getInformacoes(){ return $this->informacoes; }
    public function getLocal(){ return $this->local; }
    public function getImagem(){ return $this->imagem; }
    
    /*Setters*/
    
    public function setId($valorId){$this->id = $valorId; }
    public function setData($valorData){$this->data = $valorData; }
    public function setTitulo($valorTitulo){$this->titulo = $valorTitulo; }
    public function setInformacoes($valorInformacoes){$this->informacoes = $valorInformacoes; }
    public function setLocal($valorLocal){$this->local = $valorLocal; }
    public function setImagem($valorImagem){$this->imagem = $valorImagem; }
    
    
    /*Métodos para o CRUD referente à tabela de usuários*/
    
    public function inserirEvento(){
    $sql = "INSERT INTO eventos (data, titulo, informacoes, local, imagem)"; 
    $sql.= " VALUES('{$this->data}','{$this->titulo}', '{$this->informacoes}', ";
    $sql.= " '{$this->local}', '{$this->imagem}')";
    return parent::executaQuery($sql);
    }//Fim InserirEvento
    
    public function lerTodosEventos(){
    $sql = "SELECT * FROM eventos ORDER BY data DESC";
    return parent::executaQuery($sql);
    }//Fim lerTodosEventos
    
    public function excluirEvento(){
        $sql= "DELETE FROM eventos WHERE id = {$this->id}";
        return parent::executaQuery($sql);
    }//Fim do excluirEvento
    
    public function formataData( $data ){
        return date("d/m/Y", strtotime($data));    
    } // fim método formataData


    public function formataDataBanco( $data ){
        return date("Y-m-d", strtotime($data));    
    } // fim método formataData	

    
    
    
    public function upload($dadosImagem) {
        /* Se o nome da imagem (vindo do array FILES) for diferente de vazio... */
        if($dadosImagem["name"] != ""){
            /* Então faça: */
            
            // Configurações para o upload da imagem
            $this->imagem = $dadosImagem["name"]; // pega o nome e a extensão da imagem
            $nomeTemporario = $dadosImagem['tmp_name'];	// pega o nome temporário 
            
            // Obtendo SOMENTE a extensão
            $tipoDeArquivo = strtolower( pathinfo($this->imagem,PATHINFO_EXTENSION) ); 
            
            // Definição do diretório/pasta de destino já com o caminho para o nome/extensão      
            $pasta = "../img/{$this->imagem}"; 
        
            // Avaliando se é uma extensão de imagem válida
            switch($tipoDeArquivo){
                // Caso seja qualquer uma dessas abaixo...
                case 'jpg':
                case 'jpeg':
                case 'gif':
                case 'png':
                case 'svg':
                    // ... então mova o arquivo do diretorio temp do servidor para o destino
                    move_uploaded_file($nomeTemporario, $pasta); 
                    
                    // e retorne a operação como true (houve upload e deu tudo certo)
                    return true;
                break;

                // Caso seja qualquer outra extensão...
                default:
                    // ...então atribua uma string vazia para a propriedade imagem
                    $this->imagem = "";
                    
                    // e retorne false (não houve upload e vai gerar um erro)
                    return false;
                break;
            }           
        /* Senão... */
        } else {
            // ... atribua uma string vazia para a propriedade imagem
            $this->imagem = "";
            
            // e retorne a operação como true (não houve upload, mas deu tudo certo!)
            return true;
        }
    } // fim método upload
    
}