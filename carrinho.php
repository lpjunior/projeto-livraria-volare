<?php
$app->get('/carrinho', function ($request, $response, $args) {
  require_once 'php/CRUDS/crud_carrinho.php';
?>
    <div class="container-fluid col-8 mt-4">
        <div class="row">
            <div class="col-8">
                <h1>Meu carrinho</h1>
                <table class="table text-center">
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
                    $carrinho = listarCarrinho($_SESSION['user_id']);
                  } elseif (isset($_SESSION['produto'])) {
                    $carrinho = $_SESSION['produto'];
                  }
                  else {
                    $carrinho = NULL;
                  }
                  if ($carrinho != NULL) {

                    foreach ($carrinho as $b => $i) {
                    ?>
                    <tbody>
                        <tr>
                            <td>
                                <a href="https://placeholder.com"><img src="http://via.placeholder.com/150"></a>
                            </td>
                            <td>

                              <?=(isset($_SESSION['user_id']) ? $i['titulo'] : $i[0]['titulo'])?>
                            </td>
                            <td>
                                <button id="btnMenus" class="btn btn-light btn-sm btnMenus">-</button>
                                <input type="text" id="qtdProd" style="display:inline" maxlength="2" class="text-center form-control col-2" value="<?=(isset($_SESSION['user_id']) ? $i['quantidade'] : $i['qtd'])?>">
                                <button id="btnPlus" class="btn btn-light btn-sm btnPlus">+</button>
                            </td>
                            <td>R$ <span id="idpreco"><?=(isset($_SESSION['user_id']) ? $i['preco'] : $i[0]['preco'])?></span></td>
                            <td><!--fazer um js-->R$00,00</td>
                        </tr>
                        <tr>
                    </tbody>

                  <?php

                 } } ?>
                </table>
            </div>
            <div class="col-4">
                <div class="col bordasc">
                    <h4 class="text-center mt-3">Resumo do pedido</h4>
                    <table class="table">
                        <tbody>
                            <tr>
                            <th scope="row">Subtotal</th>
                            <td>R$<span id="idSubtotal">00,00</span></td>
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
                              <button class="btn btn-outline-secondary" type="button" id="button-addon2">calcule</button>
                            </div>
                        </div>
                        <!-- /frete -->
                </div>
            </div>
        </div>
    </div>
<?php }); ?>
<script>
    id(total)
    $(function(){
        $(this).keyup(function() {
            $txtQtd = $(this).val();
            $qtd = parseInt($txtQtd);
            if($txtQtd.length > 2) {
                $(this).val(99);
            } else if($qtd >= 99) {
                $(this).val(99);
            } else if($qtd <= 0) {
                $(this).val(0);
            }
        });
    });

    $(function(){
        $(this).keyup(function() {
            $qtd = parseInt($(this).val());
            if($qtd == "") {
                $(this).val(0);
            } else if(isNaN($qtd)) {
                $(this).val(0);
            }
        });
    });

    $(function(){
        $(".btnPlus").click(function() {
            $qtd = parseInt($(this).val());
            if($qtd >= 99) {
                $(this).val(99);
            } else {
                $(this).val(++$qtd);
            }
        });
    });

    $(function(){
        $(".btnMenus").click(function() {
            $qtd = parseInt($(this).val());
            if($qtd <= 0) {
                $(this).val(0);
            } else {
                $(this).val(--$qtd);
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
