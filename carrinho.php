<?php
  require_once 'requires/header.php';
  require_once'php/frete.php';
  //Frete.
  if (isset($_POST['btn_calcula_frete'])) {
    $frete = calculaFrete($_POST['cep'], '22290040', '0.800', '20');
  }
  ?>
  <div class="container-fluid col-md-10 col-12 ">
    <div class="row mt-4">
      <div class="col-12 col-md-8">
        <h1 class="pl-5 fontevinteecinco pt-3">Meu carrinho</h1>
        <div class="mx-auto d-block d-md-none pr-4 pl-0">
          <ul>
            <?php
            if (isset($_SESSION['user_id'])){
              $carrinho = serviceListarCarrinho($_SESSION['user_id']);
            } elseif (isset($_SESSION['produto'])) {
              $carrinho = $_SESSION['produto'];
            } else {
              $carrinho = NULL;
            }
            if ($carrinho != NULL && is_array($carrinho)) {
              foreach ($carrinho as $b => $i) {
                if (isset($_SESSION['user_id'])){
                  $titulo = $i['titulo'];
                  $preco = $i['preco'];
                  $quantidade = $i['quantidade'];
                  $b = $i['id'];
                } elseif (isset($_SESSION['produto'])) {
                  $titulo = $i[0]['titulo'];
                  $preco = $i[0]['preco'];
                  $quantidade = $i['qtd'];
                }
                ?>
            <li class="card">
              <div class="row no-gutters">
                    <div class="col-auto">
                      <?php
                      $produto = serviceDetalhesLivro($b);
                      foreach ($produto as $c) {
                      ?>
                      <img src="php/CRUDS/upload/<?=$c['imagemcapa']?>" height="85" width="85" class="img-fluid" alt="capa do livro">
                    <?php } ?>
                    </div>
                    <div class="col d-flex align-items-start">
                      <div class="float-left pl-3 pt-2">
                        <p class="mb-0 displayblock text-center"><?= $titulo = resume($titulo, 9)?></p><!--JS PARA COLOCAR RETICÊNCIAS NOS TÍTULOS GRANDES-->
                        <p class="mb-0 displayblock text-center"><i class="fas fa-dollar-sign"><?=precoBR($preco)?></i></p>
                      </div>
                    </div>
                    <div class="col">
                      <div class="card-block px-2 float-right">
                        <div class="col-md mt-2">
                          <select id="QtdProd" name="QtdProd" class="form-control tamSel float-left">
                            <?php for($i = 1; $i <= 10; $i++){?>
                            <option value="<?=$i?>" <?=($quantidade == $i ? "selected" : '')?>><?=$i?></option>
                          <?php } ?>
                          </select>
                        </div>
                        <a class="nav-link text-dark opacidade float-right" href="php/CRUDS/carrinhoSystem.php?acao=del&id=<?=$b?>"><i class="fas fa-trash"></i></a>
                      </div>
                    </div>
                </div>
              </li>
              <?php } } ?>
            </ul>
          </div>
          <div>
            <table class="table text-center table-responsive d-none d-md-block ">
              <thead>
                <tr>
                  <th scope="col">Produto</th>
                  <th scope="col">Titulo</th>
                  <th scope="col">Quantidade</th>
                  <th scope="col">Preço</th>
                  <th scope="col">Subtotal</th>
                  <th scope="col"></th>
                </tr>
              </thead>
              <?php
              if (isset($_SESSION['user_id'])){
                $carrinho = serviceListarCarrinho($_SESSION['user_id']);
              } elseif (isset($_SESSION['produto'])) {
                $carrinho = $_SESSION['produto'];
              } else {
                $carrinho = NULL;
              }
              if ($carrinho != NULL && is_array($carrinho)) {
                foreach ($carrinho as $b => $i) {
                  if (isset($_SESSION['user_id'])){
                    $preco = $i['preco'];
                    $quantidade = $i['quantidade'];
                    $b = $i['id'];
                  } else {
                    $preco = $i[0]['preco'];
                    $quantidade = $i['qtd'];
                  }
                  ?>
                  <tbody>
                    <tr>
                      <td>
                        <?php
                        if (isset($_SESSION['user_id'])){
                        $produto = serviceDetalhesLivro($i['id']);
                        } else {
                        $produto = serviceDetalhesLivro($b);
                        }
                        // Foreach para listar a 'capa do livro
                        foreach ($produto as $c) {
                        ?>
                        <img src="php/CRUDS/upload/<?=$c['imagemcapa']?>" height="50" width="50" alt="capa do livro"></a>
                      <?php } ?>
                      </td>
                    <td>
                        <?=(isset($_SESSION['user_id']) ? $i['titulo'] : $i[0]['titulo'])?>
                      </td>
                      <td>
                        <select id="QtdProd" name="QtdProd" class="form-control tamSel float-left">
                          <?php for($i = 1; $i <= 10; $i++){?>
                          <option value="<?=$i?>" <?=($quantidade == $i ? "selected" : '')?>><?=$i?></option>
                        <?php } ?>
                        </select>
                      </td>
                      <td>R$ <span id="idpreco"><?=precoBR($preco);?></span></td>
                      <td id="subtotalProd">R$<?= precoBR($preco * $quantidade);?></td>
                      <td class="text-center mb-3"><a href="php/CRUDS/carrinhoSystem.php?acao=del&id=<?=$b?>" class="linkstyle"><i class="fas fa-trash"></i></a></td>
                    </tr>
                    <tr>
                    </tbody>
                  <?php } } ?>
                </table>


              </div>
            </div>
            <div class="col-md-4 col-12">
              <div class="col bordasc">
                <h4 class="pl-2 fontevinte mt-3">Resumo do pedido</h4>
             <form action="#" method="post">
               <div class="input-group mb-1 input-sm float-left largurainput">
                 <!-- ÁREA PRA CALCULAR O FRETE -->
                   <input type="text" class="text-center form-control col cep mb-3" placeholder="Digite o CEP" name="cep" aria-label="Digite o cep" aria-describedby="button-addon2">
                   <div class="input-group-append mb-3">
                     <button class="btn btn-outline-secondary rounded COLORE1" type="submit" name="btn_calcula_frete" id="button-addon2">calcule</button>
                   </div>
                 </form>
                <table class="table">
                  <tbody>
                    <tr>

                      <th scope="row">Subtotal</th>
                      <?php
                      // Cálculo do subtotal
                      $preco = 0;
                      $subtotal = 0;
                      if (isset($_SESSION['user_id'])){
                        $carrinho = serviceListarCarrinho($_SESSION['user_id']);
                      } elseif (isset($_SESSION['produto'])) {
                        $carrinho = $_SESSION['produto'];
                      } else {
                        $carrinho = NULL;
                        $subtotal = '00,00';
                      }
                      if ($carrinho != NULL && is_array($carrinho)) {
                      foreach($carrinho as $i){
                        // Deixando a variável para os dois com o mesmo nome
                        if (isset($_SESSION['user_id'])){
                          $preco = $i['preco'] * $i['quantidade'];
                        } else {
                          $preco = $i[0]['preco'] * $i['qtd'];
                        }
                        // Função para transformar o resultado num float
                        $subtotal += serviceStringToFloat($preco);
                      }
                      $subtotal = precoBR($subtotal);
                      if (isset($_SESSION['user_id'])){
                        $quantidade = $i['quantidade'];
                      } else {
                        $quantidade = $i['qtd'];
                      } }
                      ?>
                      <td>R$<span id="idSubtotal"><?=$subtotal?></span></td>
                    </tr>
                    <tr>
                      <th scope="row">Frete</th>
                      <td>R$<span id="idFrete"><?=(isset($frete) ? $frete['valor'] : '00,00')?></span></td>
                    </tr>
                    <tr>
                      <th scope="row" class="total">Total</th>
                      <td class="total">R$<span id="idTotal"><?=
                      // Transformando o valor do frete para float, somando com o preço e usando a função para transformar
                      // para o modo que os brasileiros usam o real
                      (isset($frete) ? precoBR((serviceStringToFloat($subtotal) + serviceStringToFloat($frete['valor']))) : $subtotal);
                      ?></span></td>
                    </tr>
                    <?php
                    if (isset($frete)){
                      if (is_array($frete)) {
                        foreach ($frete as $b => $i){
                          if ($b == 'prazo') {
                            $prazoEntrega = $i['0'];
                          } }
                        } } ?>
                    <tr class="border-top">
                        <th scope="row" class="fontedoze">Prazo de entrega:</th>
                        <td><span id="abc"><?=(isset($prazoEntrega) ? $prazoEntrega. " dias" : '')?> </span></td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <div class="col mb-4 col-md-4 col-12">
                <form action="<?=(isset($_SESSION['user_id']) ? 'checkout.php' : 'entrar.php');?>" method="POST">
                  <?php
                  if (isset($frete) && intval($frete['valor']) >= 1){
                  ?>
                  <input type="hidden" name="txtFrete" value="<?=$frete['valor']?>">
                <?php } ?>
                    <button type="submit" class="btn COLORE1 float-left ml-2 mr-2" value="checkout" name="btn-checkout">Concluir compra</button>
                </form>
                    </div>
                    <!-- /frete -->
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col">
                  <script type="text/javascript" src="https://stc.sandbox.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.lightbox.js"></script>
                </div>
              </div>
            </div>
            <?php
              require_once 'requires/footer.php';
             ?>
