<?php
if (!isset($_SESSION)){
	session_start();
}
if (!isset($_SESSION['user_id'])){
	header('Location: adm.php');
}
require_once("header.php");
?>
<section class="row container-fluid">
  <div class="col-12 col-sm-12 col-md-8 col-lg-8 centraliza mt-3">
    <h1 class="fontedezoito text-left pb-2 pt-2 opacidade"><i class="fas fa-caret-right"></i>&nbsp;<i>Pedidos do cliente <b>id</b></i></h1>
      <div>
        <!-- BUSCA -->
        <form action="#" method="POST">
        <div class="input-group mb-4 ml-2 mr-2 pr-2">
        <input name="pedido" type="text" class="form-control col-md-3" placeholder="" aria-label="Recipient's username" aria-describedby="basic-addon2">
          <div class="input-group-append">
            <input type="submit" name="pesquisa" class="btn btn-info opacidade">
          </div>
        </div>
      </form>
        <!-- fim da busca -->
      </div>
      	<table class="table table-hover text-center table-responsive mb-4">
          <thead class="centraliza">
              <tr>
                <th scope="col">Data</th>
                <th scope="col">Pedido_id</th>
								<th scope="col">status compra</th>
								<th scope="col">status entrega</th>
								<th scope="col">Visualizar pedido</th>
              </tr>
          </thead>
          <tbody class="centraliza bg-white"><!-- CONTEÚDO DA TABELA-->
          <?php
					// Caso a pessoa tenha feito alguma busca, liste os pedidos de acordo com a busca
            if (isset($_POST['pesquisa']) && $_POST['pesquisa']) {
            $pedido = servicePesquisarPedido($_POST['pedido']);
					// Caso não tenha feito, liste todos os pedidos
          } else {
            $pedido = serviceListarPedidoAdmin(NULL, NULL);
          }
          foreach ($pedido as $i) {?>
              <tr>
									<td><?=$i['data_pedido']?></td>
									<td><?=$i['id']?></td>
									<td><?=$i['status_compra']?></td>
                  <td><?=$i['status_entrega']?></td>

									<td><a class="linkstyle1" href="visualizarpedido.php?id=<?=$i['id']?>"><i class="fas fa-sign-in-alt"></i><a/></td>
                    <!-- botões editar e excluir -->
     							 <td><a class="linkstyle2" href="editaPedido.php?id=<?=$i['id']?>"><i class="fas fa-pen"></i><a/></td>
     							 <td><a class="linkstyle3" href="../php/CRUDS/excluiPedido.php?id=<?=$i['id']?>"><i class="fas fa-trash"></i><a/></td>
							</tr>
            <?php } ?>
					</tbody>
				</table>
	</div>
</section>
<?php require_once("footer.php"); ?>
