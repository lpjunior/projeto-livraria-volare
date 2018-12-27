<?php
if (!isset($_SESSION)){
	session_start();
}
if (!isset($_SESSION['user_id'])){
	header('Location: adm.php');
}
require_once("header.php");
// echo  $_SESSION['logado']."<br>".$_SESSION['nome_adm'];
?>
<section class="row container-fluid">
  <div class="col-12 col-sm-12 col-md-10 col-lg-8 centraliza mt-3">
    <h1 class="fontedezoito text-left pb-2 pt-2 opacidade"><i class="fas fa-caret-right"></i>&nbsp;<i>Consulta de vendas</i></h1>
        <table class="table table-hover text-center table-responsive mb-4">
          <thead class="centraliza">
              <tr> <!-- feita pelos caras de BD -->
                <th scope="col">Nome</th>
                <th scope="col">cpf</th>
                <th scope="col">título</th>
                <th scope="col">Autor</th>
                <th scope="col">Editora</th>
                <th scope="col">número_pedido</th>
                <th scope="col">data_pedido</th>
                <th scope="col">Quantidade</th>
                <th scope="col">Preço</th>
              </tr>
          </thead>
          <tbody class="centraliza bg-white"><!-- CONTEÚDO DA TABELA -->
						<?php
						$compra = serviceListarComprasRealizadas();
						foreach ($compra as $i) {
						?>
              <tr>
                <td><?=$i['nome']?></td>
                <td><?=$i['cpf']?></td>
                <td><?=$i['titulo']?></td>
                <td><?=$i['autor']?></td>
                <td><?=$i['editora']?></td>
                <td><?=$i['numero_pedido']?></td>
                <td><?=$i['data_pedido']?></td>
                <td><?=$i['quantidade']?></td>
                <td><?=$i['preco']?></td>
              </tr>
						<?php } ?>
          </tbody><!-- fim do conteúdo da tabela-->
        </table>

  </div>
</section>
<?php require_once("footer.php"); ?>
