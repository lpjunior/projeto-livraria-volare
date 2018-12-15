<?php
require_once 'php/CRUDS/serviceBook.php';
$app->get('/home', function ($request, $response, $args) {
?>
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
                          <img class="d-block w-100" src="img/banner1.jpg" alt="First slide">
                      </div>
                      <div class="carousel-item">
                        <img class="d-block w-100" src="img/banner1.jpg" alt="Second slide">
                      </div>
                      <div class="carousel-item">
                        <img class="d-block w-100" src="img/banner1.jpg" alt="Third slide">
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
                <!-- COMEÇO DA PRIMEIRA SECTION-->
                <h1 class="fontevinte COLORETEXTO col-md-8 centraliza mt-4"><i>Lançamentos</i></h1>
                <section class="bordaspraconteudo col-md-8 centraliza mt-1">

                    <div class="row text-center"> <!-- DIV QUE JUNTA OS CARDS, todos tem que ficar dentro dela -->
                      <?php
                      $livro = serviceListarLivro(8, TRUE);
                      foreach($livro as $i){
                      ?>
                        <div class="col-sm-3">
                          <div class="card mb-4 shadow-sm">
                            <img class="card-img-top" src="img/placeholder1.jpg" alt="Card image cap">
                            <div class="card-header">
                                <h4 class="my-0 font-weight-normal fontedezoito"><a href="produto.php?id=<?=$i['id']?>"><?=$i['titulo']?></h4></a>
                            </div>
                            <div class="card-body">
                                <h4 class="fontedezesseis"><?=$i['autor']?></h4>
                                <h3 class="fontevinte">R$ <?=$i['preco']?></h3>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-outline-secondary">   <i class="fa fa-shopping-cart"></i>   </button>
                                </div>
                            </div>
                        </div>
                        </div>
                      <?php } ?>
                    </div>  <!-- FIM DA DIV QUE JUNTA OS CARDS -->
                </section>
<?php }); ?>
