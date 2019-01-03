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
                                  ?>
                                    <div class="col-auto">
                                        <img src="http://lorempixel.com/85/85/" height="85" width="85" class="img-fluid" alt="capa do livro">
                                    </div>
                                    <div class="col d-flex align-items-start">
                                        <div class="float-left pl-3 pt-2">
												<p class="mb-0 displayblock text-center"><?= $i['titulo'] = resume($i['titulo'], 6)?></p><!--JS PARA COLOCAR RETICÊNCIAS NOS TÍTULOS GRANDES-->
												<p class="mb-0 displayblock text-center"><i class="fas fa-dollar-sign"><?=number_format($i['preco'], 2, ',', '.'); // retorna R$100.000,50?></i></p>
									    </div>
                                    </div>
                                    <div class="col">
                                        <div class="card-block px-2 float-right">
                                            <div class="col-md mt-2">
                                                <select id="QtdProd" name="QtdProd" class="form-control">
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
                                <a href="https://placeholder.com"><img src="http://via.placeholder.com/50" height="50" width="50" alt="capa do livro"></a>
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
                    <h4 class="text-center mt-3">Resumo do pedido</h4>
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
                          $quantidade = $i['qtd'];
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
                        </tbody>
                        </table>
                </div>
                <div class="col bordasc mt-3">
                    <h5 class="text-center mt-3">Calcule o frete</h5>
                         <div class="input-group mb-4 input-sm col-xs-4 mt-4">
                           <form class="" action="#" method="post">
                            <input type="text" class="text-center form-control col cep " name="cep" placeholder="Digite o CEP" aria-label="Digite o cep" aria-describedby="button-addon2">
                            <div class="input-group-append">
                              <button class="btn btn-outline-secondary COLORE1" type="submit" name="btn_calcula_frete" id="button-addon2">calcule</button>

                            </div>
                            <?php
                            if (isset($frete)){
                              if (is_array($frete)){
                              foreach ($frete as $b => $i) {
                            ?>
                            <p> <?php if ($b == 'prazo'){
                              echo "O prazo de entrega é de: ". $i['0']. " dias";
                            } else {
                              echo "O valor do frete é: R$ ".$i['0'];
                            }?> </p>
                          <?php } } else {
                            echo "<p>".$frete."</p>";
                          } }?>
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
