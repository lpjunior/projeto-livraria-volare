<?php
$app->get('/produto', function ($request, $response, $args) {
?>
        <div class="container-fluid col-md-8 col-xs-12 centraliza">
            <div class="row">
                <section class="col-xs-12 col-sm-4 col-md-4 col-lg-4 mt-4">
                    <!--imagem do livro-->
                    <?php
                    if (isset($_GET['id'])) {
                    $livro = serviceDetalhesLivro($_GET['id']);
                    if (is_array($livro)) {
                    foreach ($livro as $i) { ?>
                    <img class="d-block w-100" src="img/placeholder2.jpg" alt="capa do livro">
                    <h4 class="text-center fontedezesseis paddingtexto"> Avalie este livro:</h4>
                    <!-- RATING STARS -->
                    <div class="rating fontevinteecinco">
                        <span>☆</span><span>☆</span><span>☆</span><span>☆</span><span>☆</span>
                    </div>
                    <br/>
                    <h4 class="fontedezesseis"><i class="far fa-bookmark"></i>&nbsp;Sinopse:</h4> <p class="fontedezesseis"><?=$i['sinopse']?></p>
                </section>
                <!-- div para informações -->
                <section class="col-xs-12 col-sm-8 col-md-8 col-lg-8 mt-4 bordasb">
                    <div class="col-md-12 paddingtexto">
                        <h1 class="paddingtexto fontevinteecinco"><?=$i['titulo']?></h1>
                        <h2 class="fontevinte">Autor: <?=$i['autor']?> </h2>
                        <h2><span style="font-size: 20px;"><i class="fas fa-dollar-sign"></i></span>&nbsp;<span style="font-size: 24px;"><?=$i['preco']?></span></h2>
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
                    <div class="col-md-12 mt-4">
                    <hr/>
                    <h4 class="fontedezoito">Detalhes do produto:</h4><br/>
                    <h4 class="fontedezesseis">ISBN: <?=$i['isbn']?></h4>
                    <h4 class="fontedezesseis">Editora: <?=$i['editora']?></h4>
                    <h4 class="fontedezesseis">Idioma: <?='não tem ainda'?></h4>
                    <h4 class="fontedezesseis">Dimensões: <?='tb não tem'?></h4>
                    <h4 class="fontedezesseis">Tipo de capa: <?=$i['tipo_capa']?></h4>
                    <h4 class="fontedezesseis">Ano de publicação: <?='n tem'?></h4>
                    <h4 class="fontedezesseis">Número de Páginas: <?=$i['numero_paginas']?></h4>
                    <!-- INICIO FORMULARIO BOTAO PAGSEGURO
                    <form action="https://pagseguro.uol.com.br/checkout/v2/payment.html" method="post">
                    <NÃO EDITE OS COMANDOS DAS LINHAS ABAIXO
                    <input type="hidden" name="code" value="" />
                    <input type="hidden" name="iot" value="button" />
                    <input type="image" src="https://stc.pagseguro.uol.com.br/public/img/botoes/pagamentos/209x48-comprar-assina.gif" name="submit" alt="Pague com PagSeguro - é rápido, grátis e seguro!" />
                    </form>
                    < FINAL FORMULARIO BOTAO PAGSEGURO -->
                  </div>
                </section>
              <?php } } }  ?>
                <!-- COMEÇO DOS CARDS-->
                <section class="d-none d-sm-block">
                    <h4 class="fontedezoito text-center mt-4 bg-light opacidade">Clientes que compraram este livro também aprovam:</h4><br/>

                    <!-- começo dos cards PRIMEIRA LINHA-->
                        <div class="card-deck mb-4 text-center ">
                          <?php
                          $livro = serviceListarLivro(4, NULL);
                          foreach ($livro as $i) {
                          ?>
                        <div class="card mb-4 shadow-sm">

                            <img class="card-img-top" src="img/placeholder1.jpg" alt="Card image cap">
                            <div class="card-header">
                                <h4 class="my-0 font-weight-normal fontedezoito"><?=$i['titulo']?></h4>
                            </div>
                            <div class="card-body">
                                <h4 class="fontedezesseis"><?=$i['autor']?></h4>
                                <h3 class="fontevinte">R$ <?=$i['preco']?></h3>
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
            <section class="container-fluid col-xs-12 col-sm-8 col-md-8 col-lg-8 centraliza mb-5 bordasb paddingtexto">
                <h4><i class="far fa-comments"></i>&nbsp;Comentários:</h4>
                <div class="row">

                </div>
            </section> <!-- fim da section comentários -->
            <?php
            });
             ?>
