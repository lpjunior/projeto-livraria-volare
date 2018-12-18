<?php
$app->map(['GET', 'POST'], '/busca', function ($request, $response, $args) {?>
  <section>
      <div class="container-fluid col-md-10 centraliza mt-4 margintop">
          <div class="row">
              <div class="d-none d-sm-block col-sm-2 col-md-2 col-lg-2 bordasc">
                  <h1 class="fontedezoito"><i>Categorias</i></h1>
                  <hr/>
                  <a href="#" class="linkstyle fontedezesseis"><!-- chamar todas as chategorias do banco e o link vai pra vitrine exibindo todos os livros da categoria x--></a>
                  <hr/>
                  <h4 class="fontedezoito"><i>Adicionar filtro</i></h4>
                  <form action="#" method="POST">
                    <!-- busca anterior + idioma -->
                      <label for="formControlRange"><h4 class="displayblock fontedezesseis"><b>idioma:</b></h4></label>
                      <div class="custom-control custom-radio displayblock">
                        <input value="PT" name="idiomas" type="radio" class="custom-control-input" id="port">
                        <label class="custom-control-label" for="port">Português</label>
                      </div>
                      <div class="custom-control custom-radio displayblock">
                        <input value="SPN" name="idiomas" type="radio" class="custom-control-input" id="esp">
                        <label class="custom-control-label" for="esp">Espanhol</label>
                      </div>
                      <div class="custom-control custom-radio displayblock">
                        <input value="ENG" name="idiomas" type="radio" class="custom-control-input" id="ing">
                        <label class="custom-control-label" for="ing">Inglês</label>
                      </div>
                    </form>
                    <form action="#" method="POST">
                      <hr/>
                      <!-- busca anterior + faixa preço -->
                      <div class="custom-control custom-radio">
                        <input type="radio" id="avinte" name="customRadio" class="custom-control-input">
                        <label class="custom-control-label" for="avinte">Até R$ 20</label>
                      </div>
                      <div class="custom-control custom-radio">
                        <input type="radio" id="vintet" name="customRadio" class="custom-control-input">
                        <label class="custom-control-label" for="vintet">R$ 20 - 30</label>
                      </div>
                      <div class="custom-control custom-radio">
                        <input type="radio" id="trintaq" name="customRadio" class="custom-control-input">
                        <label class="custom-control-label" for="trintaq">R$ 30 - 40</label>
                      </div>
                      <div class="custom-control custom-radio">
                        <input type="radio" id="quarentaa" name="customRadio" class="custom-control-input">
                        <label class="custom-control-label" for="quarentaa">Acima de 40</label>
                      </div>
                    </form>
                  <div class="form-group text-center opacidade mt-3 mb-3">
                      <div> <!-- botão pra pesquisar com adição dos filtros selecionados nos radios acima -->
                          <button type="submit" class="btn fontedoze opacidade COLORE1" alt="pesquisar" name="" onclick="">Pesquisar</button>
                      </div>
                  </div>
              </div> <!-- FIM DA DIV LATERAL DIREITA-->
              <div class="col-md-10 col-lg-8 col-sm-10"> <!-- DIV ONDE VAI ENTRAR O CONTEÚDO DA PAG-->
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
                         <h4 class="my-0 font-weight-normal fontedezoito"><a class="linkstyle" href="produto?id=<?=$i['id']?>"><?=$i['titulo']?></a></h4>
                     </div>
                     <div class="card-body">
                         <h4 class="fontedezesseis"><?=$i['autor']?></h4>
                         <h3 class="fontevinte">R$ <?=$i['preco']?></h3>
                         <div class="btn-group">
                           <form action="php/CRUDS/carrinhoSystem.php?acao=add&id=<?=$i['id']?>" method="POST">
                             <button type="submit" class="btn btn-sm btn-outline-secondary">&nbsp;&nbsp;&nbsp;<i class="fa fa-shopping-cart"></i>&nbsp;&nbsp;&nbsp;</button>
                           </form>
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

  <?php
});
