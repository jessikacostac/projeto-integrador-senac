<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="stylesheet" href="css/normalize.css" />
        <link rel="stylesheet" href="slick/slick.css" />
        <link rel="stylesheet" href="slick/slick-theme.css" />
        <link rel="stylesheet" href="css/estilos.css"/>
        <link rel="stylesheet" href="css/cadastre-se.css">
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
            
            <div>
                <article class="texto-form">
                    <h2 class="titulo">Nos ajude nessa luta</h2>
                    <h3 class="titulo">Sem ajuda nosso trabalho é inviável</h3>
                    <p>
                       Todo o trabalho no Instituto Meu Amigo Pet é voluntário. De acordo com o nosso Estatuto, nenhum associado do Instituto pode receber salário ou qualquer tipo de remuneração pelo trabalho realizado, exceto médicos(as) veterinários(as).
                    </p>
                    <p>
                        <strong>
                            100% do que recebemos como doação é destinado aos animais e auditado por um contador independente.
                        </strong>
                    </p>
                </article>
                
                <form method="post" id="form" action="" name="form">
                    <fieldset class="caixa-form">
                        <legend class="titulo-form">Seja um voluntario</legend>
                        
                        <p>
                            <label class="font_label" for="nome">nome</label>
                            <input class="campo" type="text" name="nome" id="nome" size="" maxlength="40"  placeholder="Digite seu nome"/>
                        </p>
                        <p>
                            <label class="font_label" for="email">Email</label>
                            <input class="campo" type="email" name="email" id="email" size="" maxlength="40"  placeholder="Digite o endereço de email"/>
                        </p>
                        
                    </fieldset>
                    <button name="cadastrar" class="enviar">Enviar</button>
                </form>
                
                <?php
                    if(isset($_POST['cadastrar'])  ){
                        if(empty($_POST['nome']) || empty($_POST['email']) ){
                            echo "<p class='titulo'><b>Você deve preencher todos os campos!</b></p>" ;
                    } else {
                            require_once "config/Voluntario.php";

                            $voluntario = new Voluntario();
                            $voluntario->setNome($_POST['nome']);
                            $voluntario->setEmail($_POST['email']);

                            $voluntario->cadastrarVoluntario();

                            echo "<p class='titulo'><b>Cadastro efetuado com sucesso!</b></p>" ;

                            /*header("location:index.html");*/
                        }
                    }

                ?>
            </div>
        </div>
    </body>
    
    <footer id="rodape">
        <h5>
            Meu Amigo Pet<br/>
            Meu Amigo Pet é um site fictício para fins didáticos<br/>
            Meu Amigo Pet &copy; 2017 - Direitos Reservados
        </h5>
    </footer>
</html>