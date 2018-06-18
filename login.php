<?php 
if( isset($_GET['acesso_proibido']) ){
    $feedback = "Você deve logar primeiro!";
} elseif( isset($_GET['logout']) ){
    $feedback = "Você saiu do sistema! Esperamos seu retorno em breve!";
} elseif( isset($_GET['nao_encontrado']) ) {
    $feedback = "Usuário/Senha não encontrado";
} elseif( isset($_GET['campos_obrigatorios']) ) {
    $feedback = "Você deve preencher todos os campos!";
} else {
    $feedback = "";
}
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <link rel="stylesheet" href="css/normalize.css"/>
        <link rel="stylesheet" href="slick/slick.css"/>
        <link rel="stylesheet" href="slick/slick-theme.css"/>
        <link rel="stylesheet" href="css/estilos.css"/>
        <link rel="stylesheet" href="css/cadastre-se.css"/>
        <link rel="stylesheet" href="css/area-adm.css"/>
        <link rel="icon" href="img/favicon.png">
        <title>Meu Amigo Pet</title>
    </head>
    <body>
        <div id="container">
            <header class="topo">
                <h1 class="logo">
                    <img src="img/logo5.gif" alt="Logo-site"/>
                </h1>
                <nav class="menu">
                    <a href="index.php">Home</a>
                    <a href="index.php#quem-somos">Quem Somos</a>
                    <a href="index.php#adocao">Adoção</a>
                    <a href="index.php#eventos">Eventos</a>
                    <a href="index.php#contato">Contato</a>
                    <a href="admin/index.php" class="superior">Login</a>
                </nav>
            </header>
           
            <div class="conteudo">
                <h2 class="titulo">Acesso ao Painel de Controle (Admin)</h2>
                <form action="" method="post" id="form-login" name="form-login">
                    <p>
                        <label for="email">E-mail:</label><br>
                        <input type="email" name="email" id="email" size="35">
                    </p>
                    <p>
                        <label for="senha">Senha: </label>
                        <input type="password" id="senha" name="senha" size="35">
                    </p>
                    <button name="entrar">Entrar</button>
                </form>
            
                <?php
                    if( isset($_POST['entrar']) ){
                        if( empty($_POST['email']) || empty($_POST['senha']) ){
                            header("location:login.php?campos_obrigatorios");
                        } else {
                            require_once "config/Administrador.php";
                            $administrador = new Administrador();
                            $administrador->setEmail($_POST['email']);
                            $administrador->setSenha( $administrador->codificaSenha($_POST['senha']) );
                            $resultado = $administrador->buscarUsuario();
                            $linhas = mysqli_num_rows($resultado);
                            if($linhas == 1){
                                $dados = mysqli_fetch_assoc($resultado);
                                require_once "config/ControleDeAcesso.php"; 
                                $sessao = new ControleDeAcesso();
                                $sessao->login($dados['id'], $dados['nome'], $dados['email']);
                                header("location:admin/index.php");
                            } else {
                                header("location:login.php?nao_encontrado");
                            }
                        }
                    }
                ?>
        </div>
<?php require "inc/rodape.php"; ?>
