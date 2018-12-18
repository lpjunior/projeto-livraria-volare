<?php require_once("header.php"); ?>
<? php
session_start();
 // echo  $_SESSION['logado']."<br>".$_SESSION['nome_adm'];
if (!isset($_SESSION['user'])){
	header('Location: adm.php');

}
?>

<section class="row container-fluid">
  <div class="col-12 col-sm-12 col-md-8 col-lg-8 centraliza mt-3">
    <h1 class="fontedezoito text-left pb-2 pt-2 opacidade"><i class="fas fa-caret-right"></i>&nbsp;<i>Pedidos - cliente <b>id</b></i></h1>
				<table class="table table-striped text-center table-responsive mb-4">
          <thead class="centraliza">
              <tr>
                <th scope="col">Data</th>
                <th scope="col">Pedido_id</th>
								<th scope="col">status compra</th>
								<th scope="col">status entrega</th>
								<th scope="col">Visualizar pedido</th>
              </tr>
          </thead>
          <tbody class="centraliza"><!-- CONTEÚDO DA TABELA -->
              <tr>
									<td>datapedido</td>
									<td>id</td>
									<td>status da compra</td>
									<td>status da entrega</td>
									<td><a class="linkstyle1" href="#"><i class="fas fa-sign-in-alt"></i><a/></td>
							</tr>
					</tbody>
				</table>
	</div>
</section>
<?php require_once("footer.php"); ?>
