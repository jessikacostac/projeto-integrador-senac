        <div id="volta-topo">
            <p><a href="#container" class="smooth"> TOPO <img src="img/seta-voltar-vermelha.png" alt=""></a></p>
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

<script src="js/jquery-3.2.1.min.js"></script>
<script src="slick/slick.min.js"></script>
<script>
    $(document).ready(function() {
        $(".slider").slick({
            autoplay: true,
            autoplaySpeed: 3000,
            dots: false,
            arrows: false,
        });
    });
    $(document).ready(function() {
        $(".smooth").on("click", function(event) {
            event.preventDefault();
            var endereco = this.hash;
            $("html, body").animate({
                scrollTop: $(endereco).offset().top
            }, 1000, function() {
                location.hash = endereco;
            });
        });
    });
    $(document).ready(function() {
        $("#data").mask("00/00/0000");

    });
</script>