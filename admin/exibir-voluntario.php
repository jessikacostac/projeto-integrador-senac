<?php require "../inc/cabecalho-admin.php"; ?>
    <section class="conteudo">
        <h2 class="titulo">Voluntários</h2>
        <p class="inseri-volun"><a href="../cadastre-se.php">Inserir novo Voluntário</a></p>
        <table class="tabela-pequena">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>E-mail</th>
                </tr>
            </thead>
            <tbody>
                <?php
                require_once "../config/Voluntario.php";
                $voluntario = new Voluntario();
                $voluntario->lerVoluntario();
                $resultado = $voluntario->lerVoluntario();
                while( $dados = mysqli_fetch_assoc($resultado) ){
                ?>
                <tr>
                    <td><?=$dados['nome']?></td>
                    <td><?= $dados['email'] ?></td>
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </section>
<?php require "../inc/rodape-admin.php"; ?>