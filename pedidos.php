<?php
require_once 'php/CRUDS/serviceBook.php';
$app->get('/pedidos', function ($request, $response, $args) {?>
<section class="col-md-10 col-lg-10 centraliza">
  <h3 class="fontevinte COLORETEXTO col-md-8 mt-4"><i>Meus pedidos</i></h1>
  <table class="table mt-2">
    <thead>
      <tr>
        <th scope="col">Data do Pedido</th>
        <th scope="col">Número do pedido</th>
        <th scope="col">Status de pagamento</th>
        <th scope="col">Status de entrega</th>
        <!-- <th scope="col"></th> -->
      </tr>
    </thead>
    <tbody>
      <?php
      $pedidos = serviceListarPedido($_SESSION['user_id'], NULL);
      if (is_array($pedidos)){
      foreach ($pedidos as $i) {
      ?>
      <tr class="mb-4 COLORE border-bottom">
        <th scope="row"><?=$i['data_pedido']?></th>
        <td><?=$i['numero_pedido']?></td><!-- id do pedido -->
        <td><?=$i['status_compra']?></td>
        <td><?=$i['status_entrega']?></td>
        <td class="linkstyle fontedoze"><a class="text-info" href="detalhes-pedido?id=<?=$i['pedido_id']?>" ><i class="fas fa-caret-right"></i>&nbsp;&nbsp;<b>detalhes do pedido</b></a></td>
      </tr>
    <?php } } else {
      $pedidoserro = "Não existem pedidos feitos!";
    } ?>
    </tbody>
  </table>

</section>
<h1 class="text-center"><?=(isset($pedidoserro) ? $pedidoserro : '')?></h1>
<?php }); ?>
