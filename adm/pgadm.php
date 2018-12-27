<?php require_once("header.php");
if (!isset($_SESSION['user_id'])){
	header('Location: adm.php');
}
?>
<section class="col-md-8 col-lg-8 centraliza">
			<!--<div class="d-flex align-items-center p-3 my-3 shadow-sm">
         <img class="mr-3" src="../img/logomarcafooter.png" alt="logomarca volare" width="100" height="40">
        <div class="lh-100">
          <h5 class="mb-0 lh-100 text-secondary"><i>Bem vindo, @nomedoadmin</i></h5>
        </div>
      </div>-->

    <div class="my-3 p-3 fundoareadm rounded shadow-sm">
        <h6 class="border-bottom border-gray pb-2 mb-0">Área do administrador</h6>
        <div class="media text-muted pt-3">
					<p class="media-body pb-3 mb-0 border-bottom border-gray">
            <strong class="d-block text-gray-dark"><a href="cadastrarpro.php">Inserir produto</a></strong>
							<small>Para inserir um novo produto na base de dados todos os campos devem ser preenchidos</small>
					</p>
        </div>
				<div class="media text-muted pt-3">
					<p class="media-body pb-3 mb-0 lh-125 border-bottom border-gray">
            <strong class="d-block text-gray-dark"><a href="pgproduto.php">Consultar produto</a></strong>
						<small>Utilize a busca para obter resultado mais rápido</small>
					</p>
        </div>
				<div class="media text-muted pt-3">
					<p class="media-body pb-3 mb-0 lh-125 border-bottom border-gray">
            <strong class="d-block text-gray-dark"><a href="cadastrarfor.php">Cadastrar fornecedor</a></strong>
						<small>Para inserir um novo fornecedor na base de dados todos os campos devem ser preenchidos</small>
					</p>
        </div>
				<div class="media text-muted pt-3">
					<p class="media-body pb-3 mb-0 lh-125 border-bottom border-gray">
            <strong class="d-block text-gray-dark"><a href="pgfornecedor.php">Consultar fornecedor</a></strong>
						<small>Utilize a busca para obter resultado mais rápido</small>
					</p>
        </div>
				<div class="media text-muted pt-3">
					<p class="media-body pb-3 mb-0 lh-125 border-bottom border-gray">
            <strong class="d-block text-gray-dark"><a href="pgusuarios.php">Editar usuários</a></strong>
						<small>O tipo de usuário e status podem ser modificados</small>
					</p>
        </div>
				<div class="media text-muted pt-3">
					<p class="media-body pb-3 mb-0 lh-125 border-bottom border-gray">
            <strong class="d-block text-gray-dark"><a href="pgpedidos.php">Histórico de pedidos</a></strong>
						<small>Para vizualizar detalhes do pedido, clique no ícone de visualizar pedidos do referido.</small>
					</p>
        </div>
				<div class="media text-muted pt-3">
					<p class="media-body pb-3 mb-0 lh-125 border-bottom border-gray">
            <strong class="d-block text-gray-dark"><a href="upbanner.php">Upload banner</a></strong>
						<small>As imagens utilizadas devem conter 1200 pixels de largura e 350 pixels de altura.</small>
					</p>
        </div>
				<div class="media text-muted pt-3">
					<p class="media-body pb-3 mb-0 lh-125 border-bottom border-gray">
            <strong class="d-block text-gray-dark"><a href="consultavendas.php">Consultar vendas</a></strong>
					</p>
        </div>
    </div>
</section>
<?php require_once("footer.php"); ?>
