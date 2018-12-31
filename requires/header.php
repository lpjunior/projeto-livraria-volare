<?php
if (!isset($_SESSION)) {
	session_start();
}
require_once 'php/CRUDS/serviceBook.php';
require_once 'php/CRUDS/serviceUsuario.php';
require_once 'php/CRUDS/serviceComentarios.php';
require_once 'php/CRUDS/serviceCarrinho.php';
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
  if ($_SERVER['REQUEST_URI'] == '/projeto-livraria-volare/produto/') {
    header('location: ../error');
  }
  ?>
    <header class="navbar-expand-lg navbar-expand-md">
        <!-- TOPO DO SITE -->
        <nav class=" navbar-dark bg-dark">
            <div class="container-fluid topoformatacao pt-1 pl-1">
            <a class="linkstyle pr-1" href="sobre">&nbsp;&nbsp;<i class="fas fa-users"></i> Sobre a Volare</a>
            <a class="linkstyle" href="faleConosco"> <i class="fas fa-phone-volume"></i> Fale Conosco</a>
            </div>
        </nav>
        <!-- fim do topo -->
        <nav class="navbar navbar-light COLORE">
            <!-- HAMBURGER -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
						<!-- LOGO -->
            <div class="navbar-left">
                <a href="home"><img class="mt-0 mb-0 pt-0 pb-0" src="img/logomarcab.png"  alt="logomarca volare livraria"></a>
            </div>
            <!-- COMEÇO DA DIV COLLAPSE HAMBURGER--> <div class="collapse navbar-collapse " id="navbarCollapse">


            <div class="col-md-12 col-lg-12 col-xl-12 navbar-nav fontedezesseis"><!-- div que agrupa os links -->
							<!-- DROPDOWN CATEGORIAS DA NAVBAR -->
	                <div class="ml-4 dropdown navbar-form">
	                    <button class="btn opacidade COLORE dropdown-toggle mr-3" type="button" id="menu1" data-toggle="dropdown">Categorias
	                    <span class="caret"></span></button>
	                    <ul class="dropdown-menu COLORE mb-0" role="menu" aria-labelledby="menu1">
												<?php
												$categoria = listarCategoria();
												foreach ($categoria as $i) { ?>
	                        <li class="pr-2 pl-1 pb-1" role="presentation"><a role="menuitem" class="linkstyle fontedezesseis" href="busca?cat=<?=$i['id']?>"><?=$i['categoria']?></a></li>
												<?php  } ?>
	                    </ul>
	                </div>
               <!-- LINKS NAVBAR -->
                <div class="nav-item">
                  <a class="nav-link text-dark opacidade" href="home"><i class="fas fa-home"></i>&nbsp;Início</a>
                </div>
                <?php
                if (!isset($_SESSION['user']) && !isset($_SESSION['token_face'])) { ?>
                <div class="nav-item">
                  <a class="nav-link text-dark opacidade" href="entrar"><i class="fas fa-user-circle"></i>&nbsp;Entre ou cadastre-se</a>
                </div>
              <?php } else { ?>
                <div class="dropdown float-left">
								<a href="user" class="dropdown-toggle nav-link text-dark fontedezesseis opacidade" data-toggle="dropdown" role="button"> <i class="fas fa-user-circle"></i>&nbsp;Olá, <?=$_SESSION['user']['nome']?></a>
									<ul class="dropdown-menu COLORE" role="menu">
                                        <li>
											<div class="fontedoze pr-2 pl-1 mb-0">
													<a href="user" class="text-dark" >Minha Conta</a>
											</div>
										</li>
										<div class="dropdown-divider"></div>
                                        <li>
											<div class="fontedoze pr-2 pl-1 mb-0">
													<a href="php/CRUDS/deslogarUsuario.php" class="text-dark">Sair</a>
											</div>
										</li>
                  </ul><!-- fecha aqui -->
                </div>
              <?php }?>

							<!-- CARRINHO DROPDOWN -->
							<div class="dropdown float-left">
								<a href="carrinho" class="dropdown-toggle nav-link text-dark fontedezesseis opacidade" data-toggle="dropdown" role="button"> <i class="fas fa-shopping-cart"></i>&nbsp;Carrinho de compras</a>
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
															<img src="http://lorempixel.com/40/40/" height="40" width="40" alt="capa do livro"/>
													</div>
													<div class="col-9 float-left">
																	<p class="mb-0 displayblock text-center fontedoze">&nbsp;&nbsp;<?=(isset($_SESSION['user_id']) ? $i['titulo'] : $i[0]['titulo'])?></p>
															<div class="col-9 float-left mt-0">
																	<p class="mb-0 displayblock text-center fontecatorze">&nbsp;R$<?=(isset($_SESSION['user_id']) ? $i['preco'] : $i[0]['preco'])?></i></p>
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
													<form action="carrinho" method="POST">
														<button type="submit" class="btn fontedoze mr-1 pr-2 COLORE1" alt="ir para o carrinho de compras" name="" value="checkout" onclick="carrinho">ver carrinho</button>
													</form>
												</div>
												<div class="col-3 mr-1 float-left">
													<form action="<?=(isset($_SESSION['user']) ? 'checkout' : 'entrar');?>" method="POST">
														<button type="submit" class="btn fontedoze mr-2 pl-2 pr-1 COLORE1" alt="ir para o carrinho de compras" name="btn-checkout" onclick="carrinho">comprar&nbsp;</button>
														</form>
												</div>
										</div>
									<?php } ?>
                  </ul><!-- fecha aqui -->
            	</div>
						</div> <!--fim da div que junta os links -->
            </div> <!-- FIM DA DIV COLLAPSE HAMBURGER -->
        <!-- CAMPO DE BUSCA -->
            <form class="form mt-2 mt-md-0 col-12 col-sm-6 col-md-5 col-lg-4 col-xl-4 pr-3 pl-2 navbar-left" action="busca" method="GET">
                <div class="input-group">
                    <span class="input-group-append">

                            <select class="form-control py-2 COLORE fontecatorze bordas" name="modo">
                            <option value=" " class="bordas fontecatorze d-none">buscar por</option>
                            <option value=" " class="bordas fontedezesseis">busca livre</option>
                            <option value="titulo" class="bordas fontedezesseis">título</option>
                            <option value="autor" class="bordas fontedezesseis">autor</option>
                            <option value="ano" class="bordas fontedezesseis">ano</option>
                            </select>

                    </span>
                    <input class="form-control py-2 border-right-0 border noradius" href="#" type="search" value="" id="" name="busca">
                    <span class="input-group-append">
                        <button type="submit" class="fa fa-search input-group-text bg-white noradius"></button>
                    </span>
                </div>
            </form> <!--fim do campo de busca-->
        </nav>
    </header>
    <main>
