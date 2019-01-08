<?php
  require_once 'requires/header.php';
  if (isset($_GET['id'])){
    $preco = 0;
  ?>
<section class="col-12 col-md-8 col-lg-8 mx-auto">
    <div class="row bg-white">
        <section class="col-xs-12 col-sm-4 col-md-4 col-lg-4 mt-4">
          <?php
          $pedido = listarPedido($_SESSION['user_id'], $_GET['id']);
          foreach ($pedido as $i) {
          ?>
                <h1 class="fontedezoito pb-2"><i> Número do pedido: <!-- preencher id--> <?=$i['numero_pedido']?> </i></h1>
                <span class="fontedezoito">Status da compra: <!-- preencher --> <?=$i['status_compra']?></span>
                  <br/><br/>
                <span class="fontedezoito">Status da entrega: <!-- preencher --> <?= $i['status_entrega']?></span>
                  <br/><br/>
                <h1 class="fontedezoito">Endereço de entrega:</h1>
                <span class="displayblock pb-1 fontedezesseis">Nome do destinatário: <?=$i['destinatario']?></span>
                <span class="displayblock pb-1 fontedezesseis">CEP: <?=$i['cep']?> Estado: <?=$i['estado']?></span>
                <span class="displayblock pb-1 fontedezesseis">Bairro: <?=$i['bairro']?></span>
                <span class="displayblock pb-1 fontedezesseis">Rua: <?=$i['endereco']?></span>
                <span class="displayblock pb-1 fontedezesseis">Número: <?=$i['numero']?> </span>
                <span class="displayblock pb-1 fontedezesseis">Complemento: <?=$i['numero']?></span>
        </section>
      <?php } ?>
        <section class="col-xs-12 col-sm-8 col-md-8 col-lg-8 mt-2">
                <div class="col-md-10 col-lg-10 col-xl-10 float-right">
                    <table class="table table-borderless table-responsive">
                    <thead>
                      <tr class="COLORETEXTO fontedoze">
                        <th scope="col"></th>
                        <th scope="col">Produtos</th>
                        <th scope="col">qtd.</th>
                        <th scope="col">subtotal</th>

                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $itensPedidos = serviceListarItensPedidos($_GET['id']);
                      foreach ($itensPedidos as $i) {
                      ?>
                      <tr class="fontedezesseis">
                          <th scope="row">
                            <div class="col-2 float-left pr-1">
  															<img src="php/CRUDS/upload/miniaturas/<?=$i['nome']?>" height="40" width="40" alt="capa do livro"/>
  													</div></th>

                        <td class="text-left"><?=$i['titulo']?></td> <!--título (seria legal colocar um <a> aqui pra ir pra página do produto tmb)-->
                        <td class="text-center"><?=$i['quantidade']?></td>
                        <td class="text-center">R$ <?=precoBR($i['preco'] * $i['quantidade'])?></td>
                        <?php
                        $preco += serviceStringToFloat($i['preco']) * serviceStringToFloat($i['quantidade']);
                        ?>
                      </tr>
                    <?php } ?>
                    </tbody>
                    </table>
                </div>
                <div class="col-md-10 col-lg-10 col-xl-10 float-right">
                  <p class="row ml-4 fontedezesseis">
                        <i class="fas fa-check text-info opacidade pt-1"></i>&nbsp;&nbsp;Frete: <!-- preencher -->R$ <?=precoBR($i['frete'])?> </p>
                  <p class="row ml-4 fontedezesseis">
                        <i class="fas fa-check text-info opacidade pt-1"></i>&nbsp;&nbsp;Total do pedido: <!-- preencher -->R$ <?=precoBR($preco + $i['frete'])?> </p>
                </div>

        </section>
</section>
<?php
} else {
  echo "<h5 class='fontedezoito opacidade text-center mt-4'>Não existem pedidos.</h5>";
}
<?php
  require_once 'requires/footer.php';
 ?>
