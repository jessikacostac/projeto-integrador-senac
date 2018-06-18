<?php require "../inc/cabecalho-admin.php"; ?>
    <section class="conteudo">
        <h2 class="titulo">Cadastrar novo evento:</h2>
        <form action="" method="post" id="form-inserir" name="form-inserir" enctype="multipart/form-data">
            <p>
                <label for="titulo">Título...</label>
                <input type="text" id="titulo" name="titulo" required >
            </p>
            <p>
                <label for="local">Local:</label>
                <input type="text" id="local" name="local" required>
            </p>
            <p>
                <label for="data">Data:</label>
                <input type="text" id="data" name="data" required>
            </p>
         
            <p>
                <textarea for="informacoes" id="informacoes" name="informacoes" required>Informações do evento:</textarea>
                <!--<input type="text" id="informacoes" name="informacoes" required>-->
            </p>
            
           <p>
                <label for="imagem">Selecionar uma imagem para este evento:</label>
                <input type="file" id="imagem" name="imagem">
            </p>
            <button name="inserir">Inserir evento</button>
        </form>
        <?php
            if( isset($_POST["inserir"]) ){
                if( empty($_POST["data"]) || empty($_POST["titulo"]) || empty($_POST["local"]) ){
                    echo "<p class='titulo'>Você deve preencher todos os campos!</p>";
                } else {
                    require_once "../config/Evento.php";
                    $evento = new Evento();
                    $evento->setData($evento->formataDataBanco($_POST['data']));
                    $evento->setTitulo($_POST['titulo']);
                    $evento->setInformacoes($_POST['informacoes']);
                    $evento->setLocal($_POST['local']);
                    $processoDeUpload = $evento->upload($_FILES['imagem']);
                    $processoDeInserirEvento = $evento->inserirEvento();
                    if ( $processoDeUpload && $processoDeInserirEvento ){
                        echo "<p class='titulo'>Enviado</p>";
                    } else {
                        echo "<p class='titulo'>Ops! Algo deu errado! Tente de novo</p>";
                    }
                }
            }
        ?>
        <hr>
        <h2 class="titulo">Lista de eventos cadastrados</h2>
        <table>
            <thead>
                <tr>
                    <th>Data</th>
                    <th>Evento</th>
                    <th>Operações</th>
                </tr>
            </thead>
            <tbody>
                <?php
                require_once "../config/Evento.php";
                $eventos = new Evento();
                $resultado = $eventos->lerTodosEventos();
                while( $dados = mysqli_fetch_assoc($resultado) ){
                ?>
                <tr>
                    <td style="text-align: center;"> <?=$eventos->formataData($dados['data']) ?> </td>
                    <td style="text-align: center;"> <?=$dados['titulo']?> </td>
                    <td style="text-align: center;">
                    <a href="excluir-evento.php?id=<?=$dados['id']?>" class="excluir">Excluir</a></td>
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </section>
<?php require "../inc/rodape-admin.php"; ?>