<?php
  require_once 'requires/header.php';
require_once 'php/CRUDS/serviceBook.php';
?>
<section class="col-md-10 col-lg-10 centraliza">

   <div class="col-md-10 d-inline-flex ">
     <a href="user"><h5 class="fontequinze linkstyle mt-4"> <i class="fas fa-arrow-alt-circle-left"></i>&nbsp;&nbsp;Minha conta</h5></a> <h1 class="COLORETEXTO mx-auto mt-4 fontevinteecinco"><i>Meus pedidos</i></h1>
  </div>
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
      $pedidoserro = "<h5 class='fontedezoito opacidade text-center'>Não existe pedido a ser visualizado</h5>";
    } ?>
    </tbody>
  </table>

</section>
<h1 class="text-center"><?=(isset($pedidoserro) ? $pedidoserro : '')?></h1>
<?php
  require_once 'requires/footer.php';
 ?>
