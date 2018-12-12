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
                                <div class="form-group"><!--tentar alinhar-->
                                    <div class="row">
                                        <button onclick="funcaoParaExecutarMenos()" type="button" class="btn btn-light" id="btnMenos">-</button>
                                        <input type="text" class="form-control col-2 light" name="qtdProduto" min="1" id=quantidadeProduto>
                                        <button onclick="funcaoParaExecutarMais()" type="button" class="btn btn-light" id="btnMais">+</button>
                                    </div>
                                </div>
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
                    <h4 class="text-center">Resumo do pedido</h4>
                        <p>
                            Subtotal:<br/>
                            Frete:<br/>
                            Total:<br/>
                        </p>
                </div>
                <div class="col bordasc">
                    <h5>Calcule o frete</h5>

                </div>
            </div>
        </div>
    </div>

<?php require_once("footer.php"); ?>
<script>
    console.log(document.getElementById("idpreco").textContent);
    console.log($("#idpreco").text());
</script>
<script>



      document.getElementById("quantidadeProduto").addEventListener("keyup", function () {
          if (isNaN(document.getElementById("quantidadeProduto").value)){
          document.getElementById("quantidadeProduto").value = 0;
        }
      });

    if(document.getElementById("quantidadeProduto").value == ""){
      document.getElementById("quantidadeProduto").value = parseInt('1');
   }

    function funcaoParaExecutarMenos (){
        quantProdutoo = document.getElementById("quantidadeProduto").value;
        quantProduto = parseInt(quantProdutoo);
        if (document.getElementById("quantidadeProduto").value <= 0){
          document.getElementById("quantidadeProduto").value = parseInt('0');
          exit;
        }
        if (document.getElementById("quantidadeProduto").value > 99){
          document.getElementById("quantidadeProduto").value = parseInt('99');
          exit;
        }
        quantProduto = quantProduto - 1;

          document.getElementById("quantidadeProduto").value = (quantProduto);
    }
    function funcaoParaExecutarMais (){
      quantProdutoo = document.getElementById("quantidadeProduto").value;
      quantProduto = parseInt(quantProdutoo);
      if (document.getElementById("quantidadeProduto").value == ""){
      document.getElementById("quantidadeProduto").value = 1;
      exit;

      }
      if (document.getElementById("quantidadeProduto").value < 0){
        document.getElementById("quantidadeProduto").value = parseInt('0');
      }
      if (document.getElementById("quantidadeProduto").value >= 99){
        document.getElementById("quantidadeProduto").value = parseInt('99');
        exit;
      }
      quantProduto = quantProduto + 1;

        document.getElementById("quantidadeProduto").value = (quantProduto);
    }

    document.getElementById("quantidadeProduto").addEventListener("keyup", function () {
        if (document.getElementById("quantidadeProduto").value >= 99){
        document.getElementById("quantidadeProduto").value = 99;
      }
    });
</script>
