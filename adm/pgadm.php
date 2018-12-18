<?php require_once("header.php"); ?>

<?php /*
session_start();
// echo  $_SESSION['logado']."<br>".$_SESSION['nome_adm'];
if (!isset($_SESSION['user_id'])){
	header('Location: adm.php');

} */
?>
<section class="container-fluid col-md-8 centraliza">
        <div class="row">
            <div class="col-md-5">
            <!-- Nav pills -->
                <ul class="nav flex-column nav-pills" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="pill" href="#bannerconfig">configurar banner</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="pill" href="#cadastrarpro">cadastrar produto</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="pill" href="#cadastrarfor">cadastrar fornecedor</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="pill" href="totalestoque">Total estoque</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="pill" href="#vendas">Vendas</a>
                    </li>
                </ul>
                </div>
                <!-- Tab panes -->
                <div class="tab-content col-md-7">
                    <div id="bannerconfig" class="tab-pane active"></div>
								</div>
								<div class="tab-content col-md-7">
                    <div id="cadastrarpro" class="tab-pane active"></div>
								</div>
								<div class="tab-content col-md-7">
                    <div id="cadastrarfor" class="tab-pane active"></div>
								</div>
								<div class="tab-content col-md-7">
                    <div id="totalestoque" class="tab-pane active"></div>
								</div>
								<div class="tab-content col-md-7">
                    <div id="vendas" class="tab-pane active"></div>
								</div>
						</div>
        </div>
</section>

<?php require_once("footer.php"); ?>
