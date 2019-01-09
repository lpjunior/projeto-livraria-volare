<?php
if (!isset($_SESSION)) {
	session_start();
}
require_once 'php/CRUDS/serviceBook.php';
require_once 'php/CRUDS/serviceUsuario.php';
require_once 'php/CRUDS/serviceComentarios.php';
require_once 'php/CRUDS/serviceCarrinho.php';
require_once 'php/CRUDS/serviceCheckout.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <title>Volare Livraria</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <link rel="stylesheet" type="text/css" href="css/estilo.css">
</head>
<body>
  <?php if (!isset($_SESSION['user'])){?>
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/dadosFacebook.js"></script>
    <script src="js/facebook-sdk.js"></script>
  <?php }
  ?>
    <header class="navbar-expand-lg navbar-expand-md">
        <!-- TOPO DO SITE -->
        <nav class=" navbar-dark bg-dark">
            <div class="container-fluid topoformatacao pt-1 pl-1">
            <a class="linkstyle pr-1" href="sobre">&nbsp;&nbsp;<i class="fas fa-users" aria-hidden=”true”></i> Sobre a Volare</a>
            <a class="linkstyle" href="faleConosco"> <i class="fas fa-phone-volume" aria-hidden=”true”></i> Fale Conosco</a>
            </div>
        </nav>
        <!-- fim do topo -->
        <nav class="navbar navbar-light COLORE">
            <!-- HAMBURGER -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="menu de navegação">
                <span class="navbar-toggler-icon"></span>
            </button>
						<!-- LOGO -->
            <div class="navbar-left mr-3 d-md-none d-lg-block">
                <a href="index.php"><img src="img/logomarcab.png"  alt="logomarca volare livraria"></a>
            </div>
						<div class="navbar-left d-none d-md-block d-lg-none">
                <a href="index.php"><img src="img/logomarcac.png"  alt="logomarca volare livraria"></a>
            </div>
            <!-- COMEÇO DA DIV COLLAPSE HAMBURGER--> <div class="collapse navbar-collapse" id="navbarCollapse">

            <!-- div que agrupa os links -->
            <div class="col-md-12 col-lg-12 col-xl-12 navbar-nav navbar-left fontedezesseis">
							<!-- DROPDOWN CATEGORIAS DA NAVBAR -->
	                <!-- <div class="dropdown navbar-form">
	                    <button class="btn opacidade COLORE dropdown-toggle" type="button" id="menu1" data-toggle="dropdown">Categorias
	                    <span class="caret"></span></button>
	                    <ul class="dropdown-menu COLORE" role="menu" aria-labelledby="menu1">
												<?php
												$categoria = listarCategoria();
												foreach ($categoria as $i) { ?>
	                        <li class="pr-2 pl-1 pb-1" role="presentation"><a role="menuitem" class="linkstyle fontedezesseis" href="busca?cat=<?=$i['id']?>"><?=$i['categoria']?></a></li>
												<?php  } ?>
	                    </ul>
	                </div> -->
               <!-- LINKS NAVBAR -->
                <div class="nav-item">
                  <a class="nav-link text-dark opacidade" href="index.php"><i class="fas fa-home" aria-hidden=”true”></i>&nbsp;Início</a>
                </div>
                <?php
                if (!isset($_SESSION['user']) && !isset($_SESSION['token_face'])) { ?>
                <div class="nav-item">
                  <a class="nav-link text-dark opacidade" href="entrar.php"><i class="fas fa-user-circle" aria-hidden=”true”></i>&nbsp;Entre ou cadastre-se</a>
                </div>
              <?php } else { ?>
                <div class="dropdown float-left">
								<a href="user" class="dropdown-toggle nav-link text-dark fontedezesseis opacidade" data-toggle="dropdown" role="button"> <i class="fas fa-user-circle" aria-hidden=”true”></i>&nbsp;Olá, <?=$_SESSION['user']['nome']?></a>
									<ul class="dropdown-menu COLORE" role="menu">
                    <li>
											<div class="fontecatorze pr-2 pl-3 mb-0">
													<a href="contausuario.php" class="text-dark" >Minha Conta</a>
											</div>
										</li>
										<div class="dropdown-divider"></div>
										<li>
											<div class="fontecatorze pr-2 pl-3 mb-0">
													<a href="pedidos.php" class="text-dark" >Meus pedidos</a><!-- LINK PEDIDOS -->
											</div>
										</li>
										<div class="dropdown-divider"></div>
                    <li>
											<div class="fontecatorze pr-2 pl-3 mb-0">
													<a href="php/CRUDS/deslogarUsuario.php" class="text-dark">Sair</a>
											</div>
										</li>
                  </ul><!-- fecha aqui -->
                </div>
              <?php }?>
							<!-- carrinho sem dropdown -->
							<div class="float-left d-lg-none d-xl-none">
								<a href="carrinho" value="checkout" class="nav-link text-dark fontedezesseis opacidade"> <i class="fas fa-shopping-cart" aria-hidden=”true”></i>&nbsp;Carrinho</a>
							</div>
							<!-- CARRINHO DROPDOWN -->
							<div class="dropdown float-left d-none d-sm-none d-md-none d-lg-block">
								<a href="carrinho.php" class="dropdown-toggle nav-link text-dark fontedezesseis opacidade" data-toggle="dropdown" role="button"> <i class="fas fa-shopping-cart" aria-hidden=”true”></i>&nbsp;Carrinho de compras</a>
								<ul class="dropdown-menu dropdown-cart COLORE opacidadecart" role="menu"><!-- abre aqui -->
									<?php
									if (isset($_SESSION['user_id'])){
									$carrinho = serviceListarCarrinho($_SESSION['user_id']);
								} elseif (isset($_SESSION['produto'])) {
									$carrinho = $_SESSION['produto'];
								}
								if (isset($carrinho) && is_array($carrinho)){
								foreach ($carrinho as $b => $i) {
									if (isset($_SESSION['user'])){
										$b = $i['id'];
										}
									?>
										<li class="row"><!--primeiro item carrinho -->
											<div class="pr-1 pl-1 mb-0">
													<div class="col-2 float-left pr-1">
														<?php
			                      $produto = serviceDetalhesLivro($b);
			                      foreach ($produto as $c) {
			                      ?>
															<img src="php/CRUDS/upload/miniaturas/<?=$c['imagemcapa']?>" height="40" width="40" alt="capa do livro"/>
														<?php } ?>
													</div>
													<div class="col-9 float-left">
																	<p class="mb-0 displayblock text-center fontedoze">&nbsp;&nbsp;<?=(isset($_SESSION['user_id']) ? $i['titulo'] : $i[0]['titulo'])?></p>
															<div class="col-9 float-left mt-0">
																	<p class="mb-0 displayblock text-center fontecatorze">&nbsp;R$<?=(isset($_SESSION['user_id']) ? precoBR($i['preco']) : precoBR($i[0]['preco']))?></i></p>
															</div>
															<div class="col-3 float-left mt-0">
																	<a class="" href="php/CRUDS/carrinhoSystem.php?acao=del&id=<?=$b?>" class="btn COLOREICON"><i class="fonteonze COLOREICON fas fa-trash"></i></a>
															</div>
													</div>

											</div>
										</li>
										<div class="dropdown-divider"></div><!--/ primeiro item carrinho -->
									<?php } } else {
										echo "&nbsp;O carrinho está vazio";
									} ?>

										<?php if (isset($carrinho) && is_array($carrinho)) { ?>
										<div class="form-group mb-5">
												<div class="col-6 pl-3 float-left">
													<form action="carrinho.php" method="POST">
														<button type="submit" class="btn fontedoze mr-1 pr-2 COLORE1" name="" value="checkout" onclick="carrinho">ver carrinho</button>
													</form>
												</div>
												<div class="col-3 mr-1 float-left">
													<form action="<?=(isset($_SESSION['user']) ? 'checkout.php' : 'entrar.php');?>" method="POST">
														<button type="submit" class="btn fontedoze mr-2 pl-2 pr-1 COLORE1" name="btn-checkout">comprar&nbsp;</button>
														</form>
												</div>
										</div>
									<?php } ?>
                  </ul><!-- fecha aqui -->
            	</div>
						</div> <!--fim da div que junta os links -->
            </div> <!-- FIM DA DIV COLLAPSE HAMBURGER -->
        <!-- CAMPO DE BUSCA -->
            <form class="form col-12 col-xl-4 col-sm-6 col-md-5 col-lg-3 navbar-left" action="vitrine.php" method="GET">
                <div class="input-group">
                    <span class="input-group-append">

                            <select class="form-control COLORE bordas" name="modo">
                            <option value=" " class="bordas fontecatorze d-none">buscar por</option>
                            <option value=" " class="bordas fontedezesseis">busca livre</option>
                            <option value="titulo" class="bordas fontedezesseis">título</option>
                            <option value="autor" class="bordas fontedezesseis">autor</option>
                            <option value="ano" class="bordas fontedezesseis">ano</option>
                            </select>

                    </span>
                    <input class="form-control  border-right-0 border noradius" aria-label="campo de busca" type="search" value="" id="" name="busca">
                    <span class="input-group-append">
                        <button type="submit" aria-label="pesquisar" class="fa fa-search input-group-text bg-white noradius"></button>
                    </span>
                </div>
            </form> <!--fim do campo de busca-->
        </nav>
    </header>
    <main>
