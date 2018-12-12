<?php require_once("header.php"); ?>
    <div class="container-fluid col-8 margintop">
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
                                <button id="btnPlus" class="btn btn-light">+</button>
                                <span id="qtdProd" class="badge badge-secondary" contenteditable>1</span>
                                <button id="btnMenus" class="btn btn-light">-</button>
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

                </div>
            </div>
        </div>
    </div>
    <div class="form-group"><!--tentar alinhar-->
                                    <div class="row">
                                        <button onclick="funcaoParaExecutarMenos()" type="button" class="btn btn-light" id="btnMenos">-</button>
                                        <input type="text" class="form-control col-2 light" name="qtdProduto" min="1" id=quantidadeProduto>
                                        <button onclick="funcaoParaExecutarMais()" type="button" class="btn btn-light" id="btnMais">+</button>
                                    </div>
                                </div>
<?php require_once("footer.php"); ?>
<script>

    $(function(){
        $("#qtdProd").keyup(function() {
            $qtd = parseInt($("#qtdProd").html());
            if($qtd >= 99) {
                $("#qtdProd").html(99);
            } else if($qtd <= 0) {
                $("#qtdProd").html(0);
            }
        });
    });

    $(function(){
        $("#qtdProd").keyup(function() {
            $qtd = parseInt($("#qtdProd").html());
            if($qtd == "") {
                $("#qtdProd").html(0);
            } else if(isNaN($qtd)) {
                $("#qtdProd").html(0);
            }
        });
    });

    $(function(){
        $("#btnPlus").click(function() {
            $qtd = parseInt($("#qtdProd").html());
            if($qtd >= 99) {
                $("#qtdProd").html(99);
            } else {
                $("#qtdProd").html(++$qtd);
            }
        });
    });

    $(function(){
        $("#btnMenus").click(function() {
            $qtd = parseInt($("#qtdProd").html());
            if($qtd <= 0) {
                $("#qtdProd").html(0);
            } else {
                $("#qtdProd").html(--$qtd);
            }
        });
    });
</script>
