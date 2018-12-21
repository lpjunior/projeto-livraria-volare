<?php
$app->map(['GET', 'POST'], '/carrinho', function ($request, $response, $args) {
?>
    <div class="container-fluid col-md-10 col-12 mt-4">
        <div class="row">
            <div class="col-12 col-md-8">
                <h1>Meu carrinho</h1>
                    <!--<div class="float-left">
                        <ul>
                            <li class="card">
                                <div class="row no-gutters">
                                    <div class="col-auto">
                                        <img src="//placehold.it/80" class="img-fluid" alt="">
                                    </div>
                                    <div class="col">
                                        <div class="card-block px-2">
                                            <h4 class="card-title">Título do livro</h4>
                                            <p class="card-text d-none d-md-block">Descrição??</p>
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
                                </div>
                            </li>
                        </ul>
                    </div>-->
                <table class="table text-center table-responsive">
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
                  if (isset($carrinho) && is_array($carrinho)) {
                    foreach ($carrinho as $b => $i) {
                    ?>
                    <tbody>
                        <tr>
                            <td>
                                <a href="https://placeholder.com"><img src="http://via.placeholder.com/50"></a>
                            </td>
                            <td>

                              <?=(isset($_SESSION['user_id']) ? $i['titulo'] : $i[0]['titulo'])?>
                            </td>
                            <td>
                                <button id="btnMenus" class="btn btn-light btn-sm">-</button>
                                <input type="text" id="qtdProd" style="display:inline" maxlength="2" class="text-center form-control col-2" value="<?=(isset($_SESSION['user_id']) ? $i['quantidade'] : $i['qtd'])?>">
                                <button id="btnPlus" class="btn btn-light btn-sm">+</button>
                            </td>
                            <td>R$ <span id="idpreco"><?=(isset($_SESSION['user_id']) ? $i['preco'] : $i[0]['preco'])?></span></td>
                            <td id="subItem">R$ </td>
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
                            <td>R$ <span id="idSubtotal"></span></td>
                            </tr>
                            <tr>
                            <th scope="row">Frete</th>
                            <td>R$<span id="idFrete">00,00</span></td>
                            </tr>
                            <tr>
                            <th scope="row" class="total">Total</th>
                            <td class="total">R$<span id="idTotal">00,00</span></td>
                            </tr>
                        </tbody>
                        </table>
                </div>
                <div class="col bordasc mt-3">
                    <h5 class="text-center mt-3">Calcule o frete</h5>
                         <div class="input-group mb-4 input-sm col-xs-4 mt-4">
                            <input type="text" class="text-center form-control col cep " placeholder="Digite o CEP" aria-label="Digite o cep" aria-describedby="button-addon2">
                            <div class="input-group-append">
                              <button class="btn btn-outline-secondary COLORE1" type="button" id="button-addon2">calcule</button>
                            </div>
                        </div>
                        <!-- /frete -->
                </div>
            </div>
        </div>
        <div class="row">
			<div class="col mt-4">
          <form method="POST" action="checkout">
                <button type="submit" class="btn COLORE1" name="btn-checkout" >Concluir compra</button>
              </form>
            </div>
		</div>
    </div>
<?php }); ?>
<script>
  $(function(){
    $("#qtdProd").keyup(function(){
      quant = document.getElementById('qtdProd');
      idpreco = parseFloat($("preco").html());
      quantidade = parseInt(quant);
      subtotal = idpreco * quantidade;
      console.log(subtotal);
      //console.log(document.getElementById('idpreco').value);

    });
  });



  $(function(){
    $("#idSubtotal").html(valorSubtotal);
  });
</script>
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



      /*subtotalQtd = document.getElementById("qtdProd").addEventListener("keyup", function(){
        document.getElementById("")
      });*/



</script>
