<?php require "../inc/cabecalho-admin.php"; ?>
    <section class="conteudo">
        <h1 class="titulo">Bem-vindo(a) <?= $_SESSION['nome'] ?> </h1>
        <p class="titulo">Você está no painel de controle e administração do site Meu Amigo Pet.</p>
        <p class="titulo">Escolha o que deseja gerenciar:</p>
        <a href="cadastro-adm.php" class="area-adm">Cadastro Administradores</a>
        <a href="cadastro-evento.php" class="area-adm">Cadastro Eventos</a>
        <a href="exibir-voluntario.php" class="area-adm">Lista Voluntários</a>
    </section>
<?php require "../inc/rodape-admin.php"; ?>