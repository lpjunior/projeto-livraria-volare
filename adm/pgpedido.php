<?php require_once("header.php");?>
<section class="row container-fluid">
  <div class="col-12 col-sm-12 col-md-8 col-lg-8 centraliza mt-3">
    <h1 class="fontedezoito text-left pb-2 pt-2 opacidade"><i class="fas fa-caret-right"></i>&nbsp;<i>Pedidos do cliente <b>id</b></i></h1>
      <div>
        <!-- BUSCA -->
        <div class="input-group mb-4 ml-2 mr-2 pr-2">
        <input type="text" class="form-control col-md-3" placeholder="" aria-label="Recipient's username" aria-describedby="basic-addon2">
          <div class="input-group-append">
            <button class="btn btn-info opacidade" type="button">Pesquisar</button>
          </div>
        </div>
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
          <tbody class="centraliza bg-white"><!-- CONTEÚDO DA TABELA
          **********ordenar pela data do pedido-->
          <?php
          $pedido = serviceListarPedido(NULL);
          foreach ($pedido as $i) {
          ?>
              <tr>
									<td><?=$i['data_pedido']?></td>
									<td><?=$i['id']?></td>
									<td><?php if ($i['id_status_compra'] == 1){
                    echo "Em análise";
                  } elseif ($i['id_status_compra'] == 2){
                    echo "Pagamento Efetuado";
                  } else {
                    echo "Cancelado";
                  } ?></td>
                  <td><?php if ($i['id_status_entrega'] == 1){
                    echo "Postado";
                  } elseif ($i['id_status_entrega'] == 2){
                    echo "A caminho do endereço de entrega";
                  } else {
                    echo "Entregue";
                  }?></td>
                  <!-- LINKAR PELO ID DO PEDIDO O A ABAIXO -->
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
