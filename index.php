<?php
require_once 'php/CRUDS/serviceBook.php';
$app->get('/home', function ($request, $response, $args) {?>
            <!-- CAROUSEL -->
            <section class="row container-fluid mx-auto d-none d-sm-block">
                <div class="col-md-10 col-lg-10 mx-auto">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                      <div class="carousel-item active">
                          <img class="d-block w-100" src="img/banner1.jpg" alt="imagem promocional">
                      </div>
                      <div class="carousel-item">
                        <img class="d-block w-100" src="img/banner2.jpg" alt="imagem promocional">
                      </div>
                      <div class="carousel-item">
                        <img class="d-block w-100" src="img/banner3.jpg" alt="imagem promocional">
                      </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="sr-only">Next</span>
                    </a>
                  </div>
                </div>
            </section>
            <!-- ********************** FIM DO CAROUSEL ****************** -->
                <!-- -->
            <div class="container-fluid col-md-10 centraliza mb-4 mt-4">
                <section class="col-sm-2 col-md-2 col-lg-2 pb-4 float-left">
                  <h1 class="fontedezesseis mr-2 pr-1"><i>Categorias</i></h1>
                  <?php
                  $categoria = listarCategoria();
                  foreach ($categoria as $i) {
                    ?>
                    <a class="border-bottom  ml-2 linkstyle" href="busca?cat=<?=$i['id']?>" class="linkstyle fontedezesseis"><?=$i['categoria']?></a><br>
                  <?php } ?>
                </section>
<!-- conjunto cards 1 -->
                <div class="col-md-12"><h1 class="fontedezoito COLORETEXTO"><i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="font-size: 14px;"><i class="far fa-bookmark" aria-hidden=”true”></i></span>&nbsp;&nbsp;Lançamentos</i></h1></div>
                <section class="bordaspraconteudo pb-2 col-sm-10 col-md-10 mb-2 pt-3 float-left">

                    <div class="row text-center"> <!-- DIV QUE JUNTA OS CARDS, todos tem que ficar dentro dela -->
                      <?php
                      $livro = serviceListarLivro(8, TRUE);
                      foreach($livro as $i){
                      ?>
                        <div class="col-sm-4 col-lg-3">
                          <div class="card mb-4 shadow-sm">
                            <img class="card-img-top" src="php/CRUDS/upload/<?=$i['imagemcapa']?>" alt="capa do livro">
                            <div class="COLORE border-bottom pt-2 border-top alturatitulo">
                                <h4 class="my-0 font-weight-normal fontequinze"><a class="linkstyle" href="produto?id=<?=$i['id']?>"><?=$i['titulo']?></h4></a>
                            </div>
                            <div class="card-body">
                                <h4 class="fontequinze"><?=$i['autor']?></h4>
                                <h3 class="fontevinte">R$ <?=number_format($i['preco'], 2, ',', '.');?></h3>
                                <div class="btn-group">
                                  <form action="php/CRUDS/carrinhoSystem.php?acao=add&id=<?=$i['id']?>" method="POST">
                                    <button type="submit" class="btn btn-sm btn-outline-secondary" aria-label="adicionar ao carrinho"><i class="fa fa-shopping-cart"></i>   </button>
                                  </form>
                                </div>
                            </div>
                        </div>
                        </div>
                      <?php } ?>
                    </div>  <!-- FIM DA DIV QUE JUNTA OS CARDS -->
                </section>
<!-- conjunto cards dois -->
                <div class="col-sm-2 col-md-2 col-lg-2 pb-4 float-left">&nbsp; </div>
                <div class="col-md-12"> <h1 class="fontedezoito COLORETEXTO  "><i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="font-size: 14px;"><i class="far fa-bookmark" aria-hidden=”true”></i></span>&nbsp;&nbsp;Recomendações</i></h1></div>
                <section class="bordaspraconteudo pb-5 col-sm-10 col-md-10 mb-5 pt-3 float-left">

                    <div class="row text-center"> <!-- DIV QUE JUNTA OS CARDS, todos tem que ficar dentro dela -->
                      <?php
                      $livro = servicelistarLivro(8, TRUE);
                      foreach($livro as $i){
                      ?>
                        <div class="col-sm-4 col-lg-3">
                          <div class="card mb-4 shadow-sm">
                            <img class="card-img-top" src="php/CRUDS/upload/<?=$i['imagemcapa']?>" alt="capa do livro">
                            <div class="COLORE border-bottom pt-2 border-top alturatitulo">
                                <h4 class="my-0 font-weight-normal fontequinze"><a class="linkstyle" href="produto?id=<?=$i['id']?>"><?=$i['titulo']?></h4></a>
                            </div>
                            <div class="card-body">
                                <h4 class="fontequinze"><?=$i['autor']?></h4>
                                <h3 class="fontevinte">R$ <?=number_format($i['preco'], 2, ',', '.');?></h3>
                                <div class="btn-group">
                                  <form action="php/CRUDS/carrinhoSystem.php?acao=add&id=<?=$i['id']?>" method="POST">
                                    <button type="submit" class="btn btn-sm btn-outline-secondary" aria-label="adicionar ao carrinho"><i class="fa fa-shopping-cart"></i>   </button>
                                  </form>
                                </div>
                            </div>
                        </div>
                        </div>
                      <?php } ?>
                    </div>  <!-- FIM DA DIV QUE JUNTA OS CARDS -->
                </section>

</div> <!-- fim do container fluid -->
<?php }); ?>
