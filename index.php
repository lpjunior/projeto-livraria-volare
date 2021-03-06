<?php
  require_once 'requires/header.php';
require_once 'php/CRUDS/serviceBook.php';
?>
            <!-- CAROUSEL -->
            <section class="row container-fluid mx-auto d-none d-sm-block" aria-hidden=”true”>
                <div class="col-md-10 col-lg-10 mx-auto">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators pb-1">
                      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                      <div class="carousel-item active">
                          <a href="#lancamentos"><img class="d-block w-100" src="img/banner1.jpg" alt="imagem promocional"></a>
                      </div>
                      <div class="carousel-item">
                        <a href="#recomendacoes"><img class="d-block w-100" src="img/banner2.jpg" alt="imagem promocional"></a>
                      </div>
                      <div class="carousel-item">
                        <a href="busca?cat=3"><img class="d-block w-100" src="img/banner3.jpg" alt="imagem promocional"></a>
                      </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev"></a>
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
            <div class="container-fluid col-md-10 centraliza mb-4 mt-1">
                <section class="col-sm-2 col-md-2 col-lg-2 pb-4 float-left">
                  <h1 class="fontedezesseis mr-2 pr-1 pl-1"><i>&nbsp;Categorias</i></h1>
                  <?php
                  $categoria = listarCategoria();
                  foreach ($categoria as $i) {
                    ?>
                    <a class="border-bottom  ml-2 linkstyle" href="vitrine.php?cat=<?=$i['id']?>" class="linkstyle fontedezesseis"><?=$i['categoria']?></a><br>
                  <?php } ?>
                </section>
<!-- conjunto cards 1 -->

                <section id="lancamentos" class="col-sm-10 col-md-10 mb-2  float-left">
                  <div class="col-md-12"><h1 class="fontedezoito COLORETEXTO"><i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="font-size: 14px;"><i class="far fa-bookmark" aria-hidden=”true”></i></span>&nbsp;&nbsp;Lançamentos</i></h1></div>
                    <div class="row text-center bordaspraconteudo pt-3"> <!-- DIV QUE JUNTA OS CARDS, todos tem que ficar dentro dela -->
                      <?php
                      $livro = serviceListarLivro(8, TRUE);
                      foreach($livro as $i){
                      ?>
                        <div class="col-sm-4 col-lg-3">
                          <div class="card mb-4 shadow-sm">
                            <img class="card-img-top" src="php/CRUDS/upload/<?=$i['imagemcapa']?>" alt="capa do livro">
                            <div class="COLORE border-bottom pt-2 border-top alturatitulo">
                                <h4 class="my-0 font-weight-normal fontequinze"><a class="linkstyle" href="produto.php?id=<?=$i['id']?>"><?=$i['titulo']?></h4></a>
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
                <section id="recomendacoes" class="col-sm-10 col-md-10 mb-5 pb-5 float-left">
                  <div class="col-md-12"><h1 class="fontedezoito COLORETEXTO"><i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="font-size: 14px;"><i class="far fa-bookmark" aria-hidden=”true”></i></span>&nbsp;&nbsp;Recomendações</i></h1></div>
                    <div class="row text-center bordaspraconteudo pt-3 "> <!-- DIV QUE JUNTA OS CARDS, todos tem que ficar dentro dela -->

                      <?php
                      $livro = serviceListarRecomendacao(TRUE, 8);
                      foreach($livro as $i){
                      ?>
                        <div class="col-sm-4 col-lg-3">
                          <div class="card mb-4 shadow-sm">
                            <img class="card-img-top" src="php/CRUDS/upload/<?=$i['imagemcapa']?>" alt="capa do livro">
                            <div class="COLORE border-bottom pt-2 border-top alturatitulo">
                                <h4 class="my-0 font-weight-normal fontequinze"><a class="linkstyle" href="produto.php?id=<?=$i['id']?>"><?=$i['titulo']?></h4></a>
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
<?php
  require_once 'requires/footer.php';
 ?>
