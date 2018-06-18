<?php require "../inc/cabecalho-admin.php"; ?>
    <section class="conteudo">
        <h2 class="titulo">Cadastrar novo administrador:</h2>
        <form action="" method="post" id="form-inserir" name="form-inserir">
            <p>
                <label for="nome">Nome:</label>
                <input type="text" id="nome" name="nome">
            </p>
            <p>
                <label for="email">E-mail:</label>
                <input type="email" id="email" name="email">
            </p>
            <p>
                <label for="senha">Senha:</label>
                <input type="password" id="senha" name="senha">
            </p>
            <button name="inserir">Inserir administrador</button>
        </form>       
        <?php
        if( isset($_POST['inserir']) ){

            /* Verificando se os campos estão vazios...*/
            if( empty($_POST['nome']) || empty($_POST['email']) ||
                empty($_POST['senha']) ){   
                echo "<p class='titulo'><b>Você deve preencher os campos</b></p>";
            } else { // Caso os campos não estejam vazios, faça:
                // Importação da classe 
                require_once "../config/Administrador.php";

                // Criação do objeto
                $administrador = new Administrador();

                // Setar/Colocar no objeto os valores dos campos do formulário
                $administrador->setNome($_POST['nome']);
                $administrador->setEmail($_POST['email']);

                // 1º) Criptografa a senha usando o método codificaSenha
                // 2º) Depois, seta a senha (já codificada) no objeto
                $administrador->setSenha( $administrador->codificaSenha($_POST['senha']) );

                // Invocar/Chamar o método responsável por inserir
                $administrador->inserirAdmin();

                // Redirecionar para a lista de usuários
                echo "<p class='titulo'><b>Administrador inserido com sucesso!</b></p>";       
            }
        }           
        ?>
        <hr>
        <h2 class="titulo">Lista de administradores cadastrados</h2>
        <table>
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>E-mail</th>
                    <th colspan="2">Operações</th>
                </tr>
            </thead>
            <tbody>
                <?php
                require_once "../config/Administrador.php";        
                $administradores = new Administrador();
                $resultado = $administradores->lerAdmin();             
                while( $dados = mysqli_fetch_assoc($resultado) ){
                ?>
                <tr>
                    <td> <?=$dados['nome']?> </td>
                    <td> <?=$dados['email']?> </td>
                    <td><a href="excluir-adm.php?id=<?=$dados['id']?>" class="excluir">Excluir</a></td>
                </tr>
                <?php
                }
                ?>                    
            </tbody>
        </table>        
    </section>            
<?php require "../inc/rodape-admin.php"; ?>