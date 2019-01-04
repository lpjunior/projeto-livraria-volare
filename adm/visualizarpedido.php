<?php
if (!isset($_SESSION)){
	session_start();
}
if (!isset($_SESSION['user_id'])){
	header('Location: adm.php');
}
require_once("header.php");
// echo  $_SESSION['logado']."<br>".$_SESSION['nome_adm'];
$preco = 0;
?>
<div class="container-fluid col-md-8 col-xs-12 centraliza">
  <h1 class="fontedezoito mt-3">Pedido_id: <b> <?=$_GET['id'];?></b></h1>
    <div class="row bg-white">
        <section class="col-xs-12 col-sm-4 col-md-4 col-lg-4 mt-4">
					<?php
          $pedido = listarPedido(NULL, $_GET['id']);
          foreach ($pedido as $i) {
          ?>
                <h1 class="fontevinte">Endereço de entrega</h1>
                <p class="fontedezesseis">Nome do destinatário: <?=$i['destinatario']?></p>
                <p class="displayblock fontedezesseis">CEP: <?=$i['cep']?> Estado: <?=$i['estado']?></p>
                <p class="displayblock fontedezesseis">Bairro: <?=$i['bairro']?></p>
                <p class="displayblock fontedezesseis">Rua: <?=$i['endereco']?></p>
                <p class="displayblock fontedezesseis">Número: <?=$i['numero']?> </p>
                <p class="displayblock fontedezesseis">Complemento: <?=$i['numero']?></p>
							<?php } ?>
        </section>
        <section class="col-xs-12 col-sm-8 col-md-8 col-lg-8 mt-2">
                <div class="col-md-10 col-lg-10 col-xl-10 float-right">
                    <table class="table table-borderless">
                    <thead>
                      <tr class="COLORETEXTO fontedezesseis">
                        <th scope="col"></th>
                        <th scope="col">itens</th>
                        <th scope="col">quantidade</th>
                        <th scope="col">subtotal</th>

                      </tr>
                    </thead>
                    <tbody>
											<?php
                      $itensPedidos = serviceListarItensPedidos($_GET['id']);
											if (is_array($itensPedidos)){
                      foreach ($itensPedidos as $i) {
                      ?>
                      <tr class="fontedezesseis">
                          <th scope="row"></th>
                        <td class="text-left"><?=$i['titulo']?></td> <!--título-->
                        <td class="text-center"><?=$i['quantidade']?></td>
                        <td class="text-center">R$ <?=precoBR($i['preco'] * $i['quantidade'])?></td> <!-- preço itens x quantidade -->
                      </tr>
										<?php
										$preco += serviceStringToFloat($i['preco']) * serviceStringToFloat($i['quantidade']);
									}
									?>
                    </tbody>
                    </table>
                </div>
                <div class="col-md-10 col-lg-10 col-xl-10 float-right">
                    <table class="table table-borderless">
                      <tr>
                        <th scope="row fontevinte"></th>
                        <td class="fontedezoito">Frete:</td>
                        <td colspan="2" class="fontedezoito text-center">R$ <?=precoBR($i['frete'])?></td>
                        <td></td>
                      </tr>
                      <tr>
                        <th scope="row fontevinte"></th>
                        <td class="fontedezoito"><b>Total:</b></td>
                        <td colspan="2" class="fontedezoito text-center"><b>R$ <?=precoBR($preco + $i['frete'])?></b></td>
                        <td></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
        </section>
</div>
</div>
<?php } else {
	echo "Sem itens pedidos";
} ?>
<?php require_once 'footer.php';?>
