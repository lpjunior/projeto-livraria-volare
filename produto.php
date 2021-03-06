<?php
require_once 'requires/header.php';
require_once'php/frete.php';

  //Frete.
  if (isset($_POST['btnCalculaFrete'])) {
        $frete = calculaFrete($_POST['cep_prod'], '22290040', '10', '20');
}

  if (isset($_SESSION['mensagem'])){
    echo $_SESSION['mensagem'];
    unset($_SESSION['mensagem']);
  }
  if (isset($_SESSION['ComentarioErro'])) {
    echo $_SESSION['ComentarioErro'];
    unset($_SESSION['ComentarioErro']);
  }
?>
        <div class="container-fluid col-sm-10 col-md-8 col-lg-8 col-12 centraliza">
            <div class="row">
                <section class="col-12 col-sm-4 col-md-4 col-lg-4 mt-4">
                    <!--imagem do livro-->
                    <?php
                    if (isset($_GET['id'])) {
                    $livro = serviceDetalhesLivro($_GET['id']);
                    if (is_array($livro)) {
                    foreach ($livro as $i) {
                      if ($i['idioma'] == 'POR'){
                        $i['idioma'] = "Português";
                      } elseif ($i['idioma'] == 'ENG'){
                        $i['idioma'] = "Inglês";
                      } else {
                        $i['idioma'] = "Espanhol";
                      }
                      ?>
                    <img class="d-block w-100" src="php/CRUDS/upload/<?=$i['imagemcapa']?>" alt="capa do livro">


                    <br/>
                    <?php
                    $i['sinopse'] = resume($i['sinopse'], 300);
                     ?>
                    <h4 class="fontedezesseis"><i class="far fa-bookmark" aria-hidden=”true”></i>&nbsp;Sinopse:</h4> <p class="fontedezesseis"><?=$i['sinopse']?></p>
                </section>
                <!-- div para informações -->
                <section class="col-12 col-sm-8 col-md-8 col-lg-8 mt-4 bordasb">
                    <div class="col-md-12 paddingtexto">
                      <h1 class="paddingtexto fontevinteecinco"><?=$i['titulo']?></h1>
                      <h2 class="fontevinte">Autor: <?=$i['autor']?> </h2>
                      <!-- FAVORITAR-->
                        <a class="afav" href="php/CRUDS/itemDesejado.php?idProd=<?=$i['id']?>"><span style="font-size: 20px;">&#9829;</span>&nbsp;<span style="font-size: 18px;">favoritar</span></a>
                      <h2><span style="font-size: 20px;">R$&nbsp;<span style="font-size: 24px;"><?=number_format($i['preco'], 2, ',', '.')?></span></h2>

                      <form action="#" method="post">
                        <div class="input-group mb-2 input-sm col-xs-4 largurainput">

                            <input type="text" class="form-control cep" placeholder="Digite o CEP" name="cep_prod" aria-label="Digite o cep" aria-describedby="button-addon2">
                            <div class="input-group-append">
                              <button class="btn btn-outline-secondary rounded" type="submit" name="btnCalculaFrete" id="button-addon2">calcule</button>
                            </div>
                            <?php
                            if (isset($frete)){
                              if (is_array($frete)){
                              foreach ($frete as $b => $i) {
                            ?>
                            <span class="opacidade pl-1 pt-2"> <?php if ($b == 'prazo'){
                              echo "Prazo de entrega: ". $i['0']. " dias";
                            } else {
                              echo "Valor do frete: R$".$i['0'];
                            }?> </span>
                          <?php } } else {
                            echo "<span>".$frete."</span>";
                          } }?>

                        </div>
                      </form>
                        <!-- /frete -->
                        <!-- BOTÃO -->
                        <a class="btn COLORE1 btn-outline-secondary" href="php/CRUDS/carrinhoSystem.php?acao=add&id=<?=$i['id']?>">Adicione ao carrinho</a>
                    </div>
                    <div class="col-md-12 mt-4">
                    <hr/>
                    <h4 class="fontedezoito">Detalhes do produto:</h4><br/>
                    <h4 class="fontedezesseis">ISBN: <?=$i['isbn']?></h4>
                    <h4 class="fontedezesseis">Editora: <?=$i['editora']?></h4>
                    <h4 class="fontedezesseis">Idioma: <?=$i['idioma']?></h4>
                    <h4 class="fontedezesseis">Dimensões: <?=$i['dimensoes']?></h4>
                    <h4 class="fontedezesseis">Tipo de capa: <?=$i['tipo_capa']?></h4>
                    <h4 class="fontedezesseis">Ano de publicação: <?=$i['data_publicacao']?></h4>
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
              <?php }  } else {?>
                  <h1 class="text-center">Livro não encontrado</h1>
                  <?php die(); } ?>
                <!-- COMEÇO DOS CARDS-->
                <section class="d-none d-sm-block">
                    <h4 class="fontedezoito text-center mt-4 bg-light opacidade">Clientes que compraram este livro também aprovam:</h4><br/>

                    <!-- começo dos cards PRIMEIRA LINHA-->
                        <div class="card-deck text-center ">
                          <?php
                          $livro = serviceListarLivroCategoria(4, $i['categoria_id'], $_GET['id']);
                          foreach ($livro as $i) {
                          ?>
                        <div class="card mb-3 shadow-sm">

                            <img class="card-img-top" src="php/CRUDS/upload/<?=$i['imagemcapa']?>" alt="capa do livro">
                            <div class="COLORE border-bottom pt-2 border-top alturatitulo">
                                <a class="linkstyle" href="produto.php?id=<?=$i['id']?>"><h4 class="my-0 font-weight-normal fontedezoito"><?=$i['titulo']?></h4></a>
                            </div>
                            <div class="card-body">
                                <h4 class="fontedezesseis"><?=$i['autor']?></h4>
                                <h3 class="fontevinte">R$ <?=number_format($i['preco'], 2, ',', '.')?></h3>
                                <div class="btn-group">
                                <button type="button" class="btn btn-sm btn-outline-secondary" aria-label="adicionar ao carrinho">&nbsp;&nbsp;&nbsp;<i class="fa fa-shopping-cart" alt="icone carrinho"></i>&nbsp;&nbsp;&nbsp;</button>
                                </div>
                            </div>
                        </div> <!--fim da coluna 1-->
                      <?php } ?>
                       </div> <!-- fim dos cards primeira linha-->
                </section> <!-- fim da section dos cards -->
            </div><!-- fim da row -->
        </div><!-- fim do primeiro container -->

        <!-- COMEÇO DA SECTION DE COMENTÁRIOS -->
       <section class="container-fluid mb-4 mt-3 pb-4">
           <div class="col-12 col-sm-8 col-md-8 col-lg-8 centraliza bordasb"><!-- BORDAS COMEÇO-->
                 <div class="col-12 col-md-12 col-lg-12 col-sm-12 pl-4 mt-4 mb-4">
                     <h4 class="fontevinteecinco"><i class="far fa-comments" aria-hidden=”true”></i>&nbsp;Comentários:</h4>
                 </div>
                 <form action="php/CRUDS/inserirComentario.php?id=<?=$_GET['id']?>" method="POST">
                 <div class="col-md-7 col-lg-7 col-sm-10 centraliza mt-2 mb-2">
                      <textarea class="form-control" rows="3" name="message" placeholder="Escreva seu comentário" maxlength="250" required="required"></textarea>
                 </div>
                 <div class="col-md-7 col-lg-7 col-sm-10 centraliza mb-4">
                     <div class="form-group text-right opacidade pr-2">
                         <div>

                             <button type="submit" class="btn fontedoze opacidade COLORE1" name="btn-comentar">comentar</button>

                             <!-- se o usuário não estiver logado deve aparecer a mensagem "Para postar um comentário entre ou faça o seu cadastro"-->
                         </div>
                     </div>
                 </div>
                 </form>
                 <table class="table table-striped mt-3 mb-3">
                       <!--vai puxar os 8 últimos comentários inseridos no banco-->
                       <?php
                       $comentarios = serviceListarComentarios(8, $_GET['id']);
                       if (!is_array($comentarios)){
                         $comentarios = array('0' => array('id' => 'a', 'comentario' => '<h5 class="fontedezesseis"><i>Não existem comentários sobre este livro, seja o primeiro!</i></h5>'));
                       }
                       foreach ($comentarios as $i) {
                       ?>
                       <tbody>
                         <tr>
                           <form method="POST" action="php/CRUDS/excluirComentario.php">
                             <input name="produtoID" type="hidden" value="<?=$_GET['id']?>">
                           <th scope="row" class="COLORETEXTO text-center">
                             <?php if (isset($_SESSION['user_id']) && isset($i['usuarios_id']) && $_SESSION['user_id'] == $i['usuarios_id']){ ?>
                             <button value="<?=$i['id']?>" name='btn-excluir' class="far fa-edit input-group-text"></button>
                           <?php }?>
                           </br>
                           <?=(isset($i['nome']) ? $i['nome'] : '')?></th>

                           <td><p><?=$i['comentario']?></p></td>
                           </form>
                         </tr>
                       </tbody>
                 </table>
           </div>
       </section> <!-- fim da section comentários -->

     <?php } } else{ ?>
       </table>
       <h1 class="text-center">Livro não encontrado</h1>
       <?php
     }
          require_once 'requires/footer.php';
