<?php
$app->map(['GET', 'POST'], '/carrinho', function ($request, $response, $args) {
  require_once'php/frete.php';
  //Frete.
  if (isset($_POST['btn_calcula_frete'])) {
    $frete = calculaFrete($_POST['cep'], '22290040', '10', '20');

  }

  ?>
  <div class="container-fluid col-md-10 col-12 ">
    <div class="row mt-4">
      <div class="col-12 col-md-8">
        <h1 class="pl-5 fontevinteecinco pt-3">Meu carrinho</h1>
        <div class="mx-auto d-block d-md-none pr-4 pl-0">
          <ul>
            <li class="card">
              <div class="row no-gutters">
                <?php
                if (isset($_SESSION['user_id'])){
                  $carrinho = serviceListarCarrinho($_SESSION['user_id']);
                } elseif (isset($_SESSION['produto'])) {
                  $carrinho = $_SESSION['produto'];
                }
                else {
                  $carrinho = NULL;
                }
                if ($carrinho != NULL && is_array($carrinho)) {
                  foreach ($carrinho as $b => $i) {
                    if (isset($_SESSION['user_id'])){
                      $titulo = $i['titulo'];
                      $preco = $i['preco'];
                      $quantidade = $i['quantidade'];
                    } elseif (isset($_SESSION['produto'])) {
                      $titulo = $i[0]['titulo'];
                      $preco = $i[0]['preco'];
                      $quantidade = $i['qtd'];
                    }
                    ?>
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
                        <p class="mb-0 displayblock text-center"><?= $titulo = resume($titulo, 6)?></p><!--JS PARA COLOCAR RETICÊNCIAS NOS TÍTULOS GRANDES-->
                        <p class="mb-0 displayblock text-center"><i class="fas fa-dollar-sign"><?=precoBR($preco)?></i></p>
                      </div>
                    </div>
                    <div class="col">
                      <div class="card-block px-2 float-right">
                        <div class="col-md mt-2">
                          <select id="QtdProd" name="QtdProd" class="form-control">
                            <option selected><?=$i['qtd']?></option>
                          </select>
                        </div>
                        <a class="nav-link text-dark opacidade float-right" href="#"><i class="fas fa-trash"></i></a>
                      </div>
                    </div>
                  <?php } } ?>
                </div>
              </li>
            </ul>
          </div>
          <table class="table text-center table-responsive d-none d-md-block ">
            <thead>
              <tr>
                <th scope="col">Produto</th>
                <th scope="col">Titulo</th>
                <th scope="col">Quantidade</th>
                <th scope="col">Preço</th>
                <th scope="col">Subtotal</th>
              </tr>
            </thead>
            <?php
            if (isset($_SESSION['user_id'])){
              $carrinho = serviceListarCarrinho($_SESSION['user_id']);
            } elseif (isset($_SESSION['produto'])) {
              $carrinho = $_SESSION['produto'];
            }
            else {
              $carrinho = NULL;
            }
            if ($carrinho != NULL && is_array($carrinho)) {
              foreach ($carrinho as $b => $i) {
                if (isset($_SESSION['user_id'])){
                  $preco = $i['preco'];
                  $quantidade = $i['quantidade'];
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
                      foreach ($produto as $c) {
                      ?>
                      <img src="php/CRUDS/upload/<?=$c['imagemcapa']?>" height="50" width="50" alt="capa do livro"></a>
                    <?php } ?>
                    </td>
                    <td>

                      <?=(isset($_SESSION['user_id']) ? $i['titulo'] : $i[0]['titulo'])?>
                    </td>
                    <td>
                      <button id="btnMenus" class="btn btn-light btn-sm">-</button>
                      <input type="text" id="qtdProd" style="display:inline" maxlength="2" class="text-center form-control col-2" value="<?=(isset($_SESSION['user_id']) ? $i['quantidade'] : $i['qtd'])?>">
                      <button id="btnPlus" class="btn btn-light btn-sm">+</button>
                    </td>
                    <td>R$ <span id="idpreco"><?=precoBR($preco);?></span></td>
                    <td>R$<?= precoBR($preco * $quantidade);?></td>
                  </tr>
                  <tr>
                  </tbody>
                <?php } } ?>
              </table>
            </div>
            <div class="col-md-4 col-12">
              <div class="col bordasc">
                <h4 class="pl-2 fontevinte mt-3">Resumo do pedido</h4>
             <form action="#" method="post">
               <div class="input-group mb-4 input-sm float-left largurainput">
                 <!-- ÁREA PRA CALCULAR O FRETE -->
                   <input type="text" class="text-center form-control col cep mb-3" placeholder="Digite o CEP" name="cep" aria-label="Digite o cep" aria-describedby="button-addon2">
                   <div class="input-group-append mb-3">
                     <button class="btn btn-outline-secondary rounded COLORE1" type="submit" name="btn_calcula_frete" id="button-addon2">calcule</button>
                   </div>
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
                      } else {
                        $carrinho = $_SESSION['produto'];
                      }
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
                      }
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
                        <td><span id=""><?=(isset($prazoEntrega) ? $prazoEntrega. "dias" : '')?> </span></td>

                    </tr>
                  </tbody>
                </table>
              </div>
              <div class="col bordasc mt-3">

                      </form>

                    </div>
                    <!-- /frete -->
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col">
                  <form method="POST" action="https://sandbox.pagseguro.uol.com.br/checkout/v2/cart.html?action=add">
                    <button type="submit" class="btn COLORE1" name="btn-checkout" >Concluir compra</button>
                  </form>
                  <script type="text/javascript" src="https://stc.sandbox.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.lightbox.js"></script>
                </div>
              </div>
            </div>
          <?php }); ?>
          <script>

          $(function(){
            $("#qtdProd").keyup(function() {
              $txtQtd = $("#qtdProd").val();
              $qtd = parseInt($txtQtd);
              if($txtQtd.length > 2) {
                $("#qtdProd").val(99);
              } else if($qtd >= 99) {
                $("#qtdProd").val(99);
              } else if($qtd <= 0) {
                $("#qtdProd").val(0);
              }
            });
          });

          $(function(){
            $("#qtdProd").keyup(function() {
              $qtd = parseInt($("#qtdProd").val());
              if($qtd == "") {
                $("#qtdProd").val(0);
              } else if(isNaN($qtd)) {
                $("#qtdProd").val(0);
              }
            });
          });

          $(function(){
            $("#btnPlus").click(function() {
              $qtd = parseInt($("#qtdProd").val());
              if($qtd >= 99) {
                $("#qtdProd").val(99);
              } else {
                $("#qtdProd").val(++$qtd);
              }
            });
          });

          $(function(){
            $("#btnMenus").click(function() {
              $qtd = parseInt($("#qtdProd").val());
              if($qtd <= 0) {
                $("#qtdProd").val(0);
              } else {
                $("#qtdProd").val(--$qtd);
              }
            });
          });

          // Install input filters.
          setInputFilter(document.getElementById("qtdProd"), function(value) {
            return /^-?\d*$/.test(value); });

            // Restricts input for the given textbox to the given inputFilter.
            function setInputFilter(textbox, inputFilter) {
              ["input", "keydown", "keyup", "mousedown", "mouseup", "select", "contextmenu", "drop"].forEach(function(event) {
                textbox.addEventListener(event, function() {
                  if (inputFilter(this.value)) {
                    this.oldValue = this.value;
                    this.oldSelectionStart = this.selectionStart;
                    this.oldSelectionEnd = this.selectionEnd;
                  } else if (this.hasOwnProperty("oldValue")) {
                    this.value = this.oldValue;
                    this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
                  }
                });
              });
            }
          </script>
