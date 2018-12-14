<?php require_once("header.php"); ?>
            <section>
                <div class="container-fluid col-md-10 centraliza mt-4 margintop">
                    <div class="row">
                        <div class="col-sm-4 col-md-2 col-lg-2 bordasc">
                            <h1 class="fontevinte">Categorias</h1>
                            <hr/>
                            <h3 class="fontedezesseis">Categoria 1</h3>
                            <h3 class="fontedezesseis">Categoria 2</h3>
                            <h3 class="fontedezesseis">Categoria 3</h3>
                            <h3 class="fontedezesseis">Categoria 5</h3>
                            <hr/>
                            <h4 class="fontedezesseis">Adicionar filtro</h4>
                            <form>
                                <label for="formControlRange"><h4 class="fontedezesseis">Faixa de preço:</h4></label>
                                <input type="range" class="form-control-range" id="formControlRange">
                            </form>

                        </div> <!-- FIM DA DIV LATERAL DIREITA-->
                        <div class="col-md-8"> <!-- DIV ONDE VAI ENTRAR O CONTEÚDO DA PAG-->
                            <!-- começo dos cards PRIMEIRA LINHA-->
                            <?php
                            ## Se tiver algo escrito no input da busca, e tiver uma categoria marcada
                            if (isset($_POST['txtBusca']) && $_POST['txtBusca'] != '' && isset($_POST['buscaCategoria'])) {
                              $livro = serviceBuscarLivro($_POST['txtBusca'], $_POST['buscaCategoria']);
                            ## Se não tiver nada escrito no input, e tiver uma categoria
                            } elseif (isset($_POST['buscaCategoria']) && $_POST['buscaCategoria'] =! ' ') {
                              $livro = serviceBuscarLivro($_POST['txtBusca'], $_POST['buscaCategoria']);
                              ## Se não tiver nem no input, nem na categoria, liste 8 livros
                            }  else {
                             $livro = serviceListarLivro(8, NULL);
                           }
                           if (is_array($livro)) {?>
                             <div class="row text-center">
                            <?php foreach ($livro as $i) {?>
                              <div class="col-sm-3">
                              <div class="card mb-4 shadow-sm">
                               <img class="card-img-top" src="img/placeholder1.jpg" alt="Card image cap">
                               <div class="card-header">
                                   <h4 class="my-0 font-weight-normal fontedezoito"><a href="produto.php?id=<?=$i['id']?>"><?=$i['titulo']?></a></h4>
                               </div>
                               <div class="card-body">
                                   <h4 class="fontedezesseis"><?=$i['autor']?></h4>
                                   <h3 class="fontevinte">R$ <?=$i['preco']?></h3>
                                   <div class="btn-group">
                                       <button type="button" class="btn btn-sm btn-outline-secondary">&nbsp;&nbsp;&nbsp;<i class="fa fa-shopping-cart"></i>&nbsp;&nbsp;&nbsp;</button>
                                   </div>
                               </div>
                             </div>
                              </div> <!--fim da coluna 1-->
                           <?php } } else {
                             echo $livro;
                           } ?> <!-- Fim do foreach -->

                         </div>  <!-- fim dos cards -->

                       </div> <!-- FIM DA DIV CONTEÚDO DA PAG -->
                    </div> <!-- fim da row -->
                </div> <!-- FIM DO CONTAINER -->
            </section><!-- FIM DA PRIMEIRA SECTION -->
            <!-- pra jogar o footer pra baixo -->

<?php require_once("footer.php"); ?>
