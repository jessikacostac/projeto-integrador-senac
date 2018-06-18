<?php require"inc/cabecalho.php"; ?>

<section id="slider">
    <div class="slider">
        <div>
            <img src="img/slider-dog.png" alt="gatos brincando" />
        </div>
        <div>
            <img src="img/slider-dog2.png" alt="carinha fofa do cachorro" />
        </div>
        <div>
            <img src="img/slider-gatinhos.png" alt="gato em cima do carro" />
        </div>
        <div>
            <img src="img/slider-gatinhos3.png" alt="gato em cima do carro" />
        </div>
    </div>
</section>


<aside class="barra-cadastro">
    <h3>Quer ser um voluntario?</h3>
    <h3><a href="cadastre-se.php">Cadastre-se</a></h3>
</aside>

<section id="quem-somos">
    <h1 class="titulo">Quem Somos</h1>

    <p>
        Somos um grupo de pessoas voluntárias apaixonadas por animais, e que trabalham por eles, gerindo o Instituto de maneira profissional. De acordo com o nosso Estatuto, nenhum associado do Instituto pode receber salário ou qualquer tipo de remuneração pelo trabalho realizado, exceto médicos(as) veterinários(as) quando ao exercer da profissão. Todas as nossas contas e despesas são auditadas por um contador independente. Em 1998, um grupo de pessoas, unido pelo sentimento de solidariedade aos animais, resolveu criar uma entidade com estatuto e diretoria. Era um tempo em que a proteção animal estava engatinhando, e quem falava em proteger cães e gatos não era considerada pessoa “normal”. Este espírito de preocupação com os bichos e a dedicação em protegê-los levou ao nascimento da associação <strong> Meu Amigo Pet.</strong>
    </p>

    <div class="icones">
        <img src="img/avatar-1.png" alt="Rafael"/>
        <img src="img/avatar-2.png" alt="Jesica"/>
        <img src="img/avatar-3.png" alt="Filipe"/>
    </div>
</section>

<section id="adocao">
    <h1 class="titulo">Nossos bichinhos</h1>

    <div>

        <article class="galeria">
            <img src="img/galeria-img01.png" alt="Cachorro">
            <img src="img/galeria-img02.png" alt="Gato">
            <img src="img/galeria-img03.png" alt="Cachorro">
            <img src="img/galeria-img04.png" alt="Gato">
        </article>

        <article class="galeria">

            <img src="img/galeria-img05.png" alt="Cachorro">
            <img src="img/galeria-img06.png" alt="Gato">
            <img src="img/galeria-img07.png" alt="Cachorro">
            <img src="img/galeria-img08.png" alt="Gato">
        </article>

        <article class="galeria">

            <img src="img/galeria-img09.png" alt="Cachorro">
            <img src="img/galeria-img10.png" alt="Gato">
            <img src="img/galeria-img11.png" alt="Cachorro">
            <img src="img/galeria-img12.png" alt="Cachorro">
        </article>
    </div>
</section>

<section id="eventos">
    <h1 class="titulo">Eventos</h1>

        <?php
            require_once"config/Evento.php";
            $evento = new Evento();
            $resultados = $evento->lerTodosEventos();
            while( $dados = mysqli_fetch_assoc($resultados) ){
        ?>

        <article class="caixa-evento">
            <h2 class="titulo"> <?=$dados['titulo']?></h2> 
            
            <p class="texto-evento"><?=$dados['informacoes']?></p>
            
            <p class="local"><?=$dados['local']?></p>
            
            <p class="centraliza"><time class="data"> Data: <?=$evento->formataData($dados['data']) ?> </time></p>
            
            <?php if( !empty($dados['imagem']) ){ ?>
                <img class="evento-img" src="img/<?=$dados['imagem']?>" alt="Imagem do evento">
            <?php } ?>
        </article>
            <?php } ?>
        
        <!--<article class="caixa-evento">
            <h2 class="titulo">Cachorro</h2>
            <p class="texto-evento">
                Somos um grupo de pessoas voluntárias apaixonadas por animais, e que trabalham por eles, gerindo o Instituto de maneira profissional. De acordo com o nosso Estatuto, nenhum associado do Instituto pode receber salário ou qualquer tipo de remuneração pelo trabalho realizado, exceto médicos(as) veterinários(as) quando ao exercer da profissão. Todas as nossas contas e despesas são auditadas por um contador independente. Em 1998, um grupo de pessoas, unido pelo sentimento de solidariedade aos animais, resolveu criar uma entidade com estatuto e diretoria. Era um tempo em que a proteção animal estava engatinhando, e quem falava em proteger cães e gatos não era considerada pessoa “normal”. Este espírito de preocupação com os bichos e a dedicação em protegê-los levou ao nascimento da associação Meu Amigo Pet.
            </p>
            <p class="local"> Local: Minha Casa </p>
            <p class="data">Data: 08/12/2017 </p>
            <img src="img/galeria-img05.png" class="evento-img">
        </article>-->
                
</section>

<section id="contato">
    <h1 class="titulo">Contato</h1>
    
       <div class="div-contato">
        <p>
            Telefone: (11) 2135-0300<br/>
            E-mail: <a href="meuamigopet@gmail.com">meuamigopet@gmail.com</a>
        </p>
    </div>
    
    <div class="contato-logo">
        <a href="#"><img src="img/logo-facebook.gif" alt="Facebbok"></a>
        <a href="#"><img src="img/logo-twitter.gif" alt="Twitter"></a>
        <a href="#"><img src="img/logo-youtube.gif" alt="Youtube"></a>
    </div>
</section>

<section>
    <h1 class="titulo">Localização</h1>

    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3658.1759065861906!2d-46.54243608588156!3d-23.52617478470034!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94ce5e45de28bb23%3A0x1d2ed3122aae28a7!2sSenac+Penha!5e0!3m2!1spt-BR!2sbr!4v1508152629447" width="1200" height="400" style="border:0" allowfullscreen></iframe>
</section>

<?php require"inc/rodape.php"; ?>