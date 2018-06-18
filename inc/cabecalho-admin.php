<?php
    require_once"../config/ControleDeAcesso.php";
    $sessao = new ControleDeAcesso();
    $sessao->verificaPermissao();
    if( isset($_GET["logout"]) ){ $sessao->logout(); }
    $pagina = basename($_SERVER['PHP_SELF']);
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <link rel="stylesheet" href="../css/normalize.css"/>
        <link rel="stylesheet" href="../css/estilos.css"/>
        <link rel="stylesheet" href="../css/cadastre-se.css"/>
        <link rel="stylesheet" href="../css/area-adm.css"/>
        <link rel="icon" href="../img/favicon.png" sizes="64x64"/>
        <title>Meu Amigo Pet</title>
    </head>
    <body>
        <div id="container">
            <header class="topo">
                <h1 class="logo">
                    <img src="../img/logo5.gif" alt="logo-site"/>
                </h1>
                <nav class="menu">
                    <a href="../index.php">Home</a>
                    <a href="index.php">Area Adiministrativa</a>
                    <a href="?logout">Sair</a>
                </nav>
            </header>