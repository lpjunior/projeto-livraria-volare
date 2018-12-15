<?php
$app->get('/carrinho', function ($request, $response, $args) {
?>
    <div class="container-fluid col-8 mt-4">
        <div class="row">
            <div class="col-8">
                <h1>Meu carrinho</h1>
                <table class="table text-center">
                    <thead>
                        <tr>
                        <th scope="col">Produto</th>
                        <th scope="col">#</th>
                        <th scope="col">Quantidade</th>
                        <th scope="col">Preço</th>
                        <th scope="col">Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <a href="https://placeholder.com"><img src="http://via.placeholder.com/150"></a>
                            </td>
                            <td>
                                Nome do produto
                            </td>
                            <td>
                                <button id="btnPlus" class="btn btn-light btn-sm">+</button>
                                <input type="text" id="qtdProd" style="display:inline" maxlength="2" class="text-center form-control col-2" value="1">
                                <button id="btnMenus" class="btn btn-light btn-sm">-</button>
                            </td>
                            <td>R$ <span id="idpreco">100,00</span></td>
                            <td><!--fazer um js-->R$00,00</td>
                        </tr>
                        <tr>
                    </tbody>
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
