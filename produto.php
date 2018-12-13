<?php require_once("header.php"); ?>
        <div class="container-fluid col-md-8 col-xs-12 centraliza">
            <div class="row">
                <section class="col-xs-12 col-sm-4 col-md-4 col-lg-4 margintop">
                    <!--imagem do livro-->
                    <img class="d-block w-100" src="img/placeholder2.jpg" alt="capa do livro">
                    <h4 class="text-center fontedezesseis paddingtexto"> Avalie este livro:</h4>
                    <!-- RATING STARS -->
                    <div class="rating fontevinteecinco">
                        <span>☆</span><span>☆</span><span>☆</span><span>☆</span><span>☆</span>
                    </div>
                    <br/>
                    <h4 class="fontedezesseis"><i class="far fa-bookmark"></i>&nbsp;Sinopse:</h4> <p class="fontedezesseis">Lorem ipsum dolor sit amet, consectetur adipiscing elit. vitae sodales diam. Etiam a ligula convallis, lobortis velit consectetur, varius ex. Nulla facilisi. Nunc congue, eros a accumsan volutpat, diam arcu tristique dui, eget vehicula metus ipsum vitae ligula.</p>
                </section>
                <!-- div para informações -->
                <section class="col-xs-12 col-sm-8 col-md-8 col-lg-8 margintop bordasb">
                    <div class="col-md-12 paddingtexto">
                        <h1 class="paddingtexto fontevinteecinco">Título</h1>
                        <h2 class="fontevinte">Autor: Nome sobrenome </h2>
                        <h2><span style="font-size: 20px;"><i class="fas fa-dollar-sign"></i></span>&nbsp;<span style="font-size: 24px;">00,00</span></h2>
                        <!--frete--><h4 class="paddingtexto fontedezesseis"><i class="fas fa-dollar-sign"></i></span>&nbsp;Frete:</h4>
                        <div class="input-group mb-4 input-sm col-xs-4 largurainput">
                            <input type="text" class="form-control cep" placeholder="Digite o CEP" aria-label="Digite o cep" aria-describedby="button-addon2">
                            <div class="input-group-append">
                              <button class="btn btn-outline-secondary" type="button" id="button-addon2">calcule</button>
                            </div>
                        </div>
                        <!-- /frete -->
                        <!-- BOTÃO -->
                        <a class="btn COLORE btn-outline-secondary" href="#">Adicione ao carrinho</a>
                    </div>
                    <div class="col-md-12 margintop">
                    <hr/>
                    <h4 class="fontedezoito">Detalhes do produto:</h4><br/>
                    <h4 class="fontedezesseis">ISBN:</h4>
                    <h4 class="fontedezesseis">Editora:</h4>
                    <h4 class="fontedezesseis">Idioma:</h4>
                    <h4 class="fontedezesseis">Dimensões:</h4>
                    <h4 class="fontedezesseis">Tipo de capa:</h4>
                    <h4 class="fontedezesseis">Ano de publicação:</h4>
                    <h4 class="fontedezesseis">Número de Páginas:</h4>
                    </div>
                </section>
                <!-- COMEÇO DOS CARDS-->
                <section class="d-none d-sm-block">
                    <h4 class="fontedezoito text-center margintop bg-light opacidade">Clientes que compraram este livro também aprovam:</h4><br/>

                    <!-- começo dos cards PRIMEIRA LINHA-->
                        <div class="card-deck mb-4 text-center ">
                          <?php
                          $livro = serviceListarLivro();
                          foreach ($livro as $i) {
                          ?>
                        <div class="card mb-4 shadow-sm">

                            <img class="card-img-top" src="img/placeholder1.jpg" alt="Card image cap">
                            <div class="card-header">
                                <h4 class="my-0 font-weight-normal fontedezoito"><?=$i['titulo']?></h4>
                            </div>
                            <div class="card-body">
                                <h4 class="fontedezesseis">Nome Sobrenome</h4>
                                <h3 class="fontevinte">R$ 00,00</h3>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-outline-secondary">&nbsp;&nbsp;&nbsp;<i class="fa fa-shopping-cart"></i>&nbsp;&nbsp;&nbsp;</button>
                                </div>
                            </div>
                        </div> <!--fim da coluna 1-->
                      <?php }?>
                       </div> <!-- fim dos cards primeira linha-->
                </section> <!-- fim da section dos cards -->
                </div><!-- fim da row -->
            </div><!-- fim do container -->
            <!-- COMEÇO DA SECTION DE COMENTÁRIOS -->
            <section class="container-fluid col-xs-12 col-sm-8 col-md-8 col-lg-8 centraliza marginbottom bordasb paddingtexto">
                <h4><i class="far fa-comments"></i>&nbsp;Comentários:</h4>
                <div class="row">

                </div>
            </section> <!-- fim da section comentários -->
 <?php require_once("footer.php"); ?>
