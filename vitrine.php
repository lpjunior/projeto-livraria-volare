<?php
$app->map(['GET', 'POST'], '/busca', function ($request, $response, $args) {?>
  <section>
    <div class="container-fluid col-md-10 centraliza mt-4 margintop">
      <div class="row">
        <div class="d-none d-sm-block col-sm-2 col-md-2 col-lg-2 bordasc">
          <h1 class="fontedezoito"><i>Categorias</i></h1>
          <hr/>
          <?php
          $categoria = listarCategoria();
          foreach ($categoria as $i) {
            ?>
            <a href="busca?cat=<?=$i['id']?>" class="linkstyle fontedezesseis"><?=$i['categoria']?></a><br>
          <?php } ?>
          <hr/>
          <h4 class="fontedezoito"><i>Adicionar filtro</i></h4>
          <form action="#" method="GET">
            <!-- busca anterior + idioma -->
            <label for="formControlRange"><h4 class="displayblock fontedezesseis"><b>idioma:</b></h4></label>
            <div class="custom-control custom-radio displayblock">
              <input value="POR" name="idiomas" type="radio" class="custom-control-input" id="port">
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
            <hr/>
            <!-- busca anterior + faixa preço -->
            <div class="custom-control custom-radio">
              <input value="-20" type="radio" id="avinte" name="preco" class="custom-control-input">
              <label class="custom-control-label" for="avinte">Até R$ 20</label>
            </div>
            <div class="custom-control custom-radio">
              <input value="20-30" type="radio" id="vintet" name="preco" class="custom-control-input">
              <label class="custom-control-label" for="vintet">R$ 20 - 30</label>
            </div>
            <div class="custom-control custom-radio">
              <input value="30-40" type="radio" id="trintaq" name="preco" class="custom-control-input">
              <label class="custom-control-label" for="trintaq">R$ 30 - 40</label>
            </div>
            <div class="custom-control custom-radio">
              <input value="40" type="radio" id="quarentaa" name="preco" class="custom-control-input">
              <label class="custom-control-label" for="quarentaa">Acima de 40</label>
            </div>
            <div class="form-group text-center opacidade mt-3 mb-3">
              <div> <!-- botão pra pesquisar com adição dos filtros selecionados nos radios acima -->
                <button type="submit" class="btn fontedoze opacidade COLORE1" alt="pesquisar" onclick="">Pesquisar</button>
              </div>
            </div>
          </form>
        </div> <!-- FIM DA DIV LATERAL DIREITA-->
        <div class="col-md-10 col-lg-8 col-sm-10"> <!-- DIV ONDE VAI ENTRAR O CONTEÚDO DA PAG-->
          <!-- começo dos cards PRIMEIRA LINHA-->
          <?php
          if (isset($_GET['cat'])){
            ## Pegar as últimas buscas para poder usar caso clique nos filtros
            $_SESSION['ultimaCategoria'] = $_GET['cat'];
            $_SESSION['buscaAnterior'] = ''; ## Caso o usuário tenha feito uma busca normal, apague ela e mostre a categoria escolhida
            $_SESSION['modoAnterior'] = ''; ## Caso o usuário tenha feito uma busca normal, apague ela e mostre a categoria escolhida
            ## Buscar os livros no banco
            $livro = serviceBuscarLivro('', '', NULL, NULL, $_GET['cat']);
          } elseif (isset($_GET['busca'])){
            ## Pegar as últimas buscas para poder usar caso clique nos filtros
            $_SESSION['ultimaCategoria'] = NULL; ## Caso o usuário tenha feito uma busca por categoria, apague a categoria e mostre a busca
            $_SESSION['buscaAnterior'] = $_GET['busca'];
            $_SESSION['modoAnterior'] = $_GET['modo'];
            ## Buscar os livros no banco
            $livro = serviceBuscarLivro($_GET['busca'], $_GET['modo'], NULL, NULL, NULL);
            ## Se a pessoa clicar nos filtros de idioma e preço
          } elseif (isset($_GET['idiomas']) && isset($_GET['preco'])){
            $livro = serviceBuscarLivro($_SESSION['buscaAnterior'], $_SESSION['modoAnterior'], $_GET['idiomas'], $_GET['preco'], $_SESSION['ultimaCategoria']);
          } elseif (isset($_GET['idiomas'])){ ## Caso a pessoa só tenha o filtro de idiomas.
            $livro = serviceBuscarLivro($_SESSION['buscaAnterior'], $_SESSION['modoAnterior'], $_GET['idiomas'], NULL, $_SESSION['ultimaCategoria']);
          } elseif (isset($_GET['preco'])) { ## Caso a pessoa só tenha o filtro de preço.
            $livro = serviceBuscarLivro($_SESSION['buscaAnterior'], $_SESSION['modoAnterior'], NULL, $_GET['preco'], $_SESSION['ultimaCategoria']);
          } else {
            $livro = serviceListarLivro(8, NULL);
          }
          if (is_array($livro)) {?>
            <div class="row text-center">
              <?php foreach ($livro as $i) {?>
                <div class="col-sm-3">
                  <div class="card mb-4 shadow-sm">
                    <img class="card-img-top" src="php/CRUDS/upload/miniaturas/<?=$i['imagemthumb']?>" alt="Card image cap">
                    <div class="card-header">
                      <h4 class="my-0 font-weight-normal fontedezoito"><a class="linkstyle" href="produto?id=<?=$i['id']?>"><?=$i['titulo']?></a></h4>
                    </div>
                    <div class="card-body">
                      <h4 class="fontedezesseis"><?=$i['autor']?></h4>
                      <h3 class="fontevinte">R$ <?=number_format($i['preco'], 2, ',', '.')?></h3>
                      <div class="btn-group">
                        <form action="php/CRUDS/carrinhoSystem.php?acao=add&id=<?=$i['id']?>" method="POST">
                          <button type="submit" class="btn btn-sm btn-outline-secondary">&nbsp;&nbsp;&nbsp;<i class="fa fa-shopping-cart"></i>&nbsp;&nbsp;&nbsp;</button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div> <!--fim da coluna 1-->
              <?php } } else {
                echo "<h1 class='text-center'>A busca não foi encontrada</h1>";
              } ?> <!-- Fim do foreach -->

            </div>  <!-- fim dos cards -->

          </div> <!-- FIM DA DIV CONTEÚDO DA PAG -->
        </div> <!-- fim da row -->
      </div> <!-- FIM DO CONTAINER -->
    </section><!-- FIM DA PRIMEIRA SECTION -->

    <?php
  });
