<?php
if (!isset($_SESSION)) {
	session_start();
}
require_once 'php/CRUDS/serviceBook.php';
require_once 'php/CRUDS/serviceUsuario.php';
require_once 'php/CRUDS/serviceComentarios.php';
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
    <header>
        <!-- TOPO DO SITE -->
        <nav class="navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid topoformatacao">
            <a class="text-dark opacidade" href="sobre"><i class="fas fa-users"></i> Sobre a Volare</a>&nbsp;&nbsp;
            <a class="text-dark opacidade" href="faleConosco"> <i class="fas fa-phone-volume"></i> Fale Conosco</a>
            </div>
        </nav>
        <!-- fim do topo -->
        <nav class="navbar navbar-expand-md navbar-light COLORE">
            <!-- HAMBURGER -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div>
                <a href="home"><img src="img/logomarcac.png"  alt="logomarca"></a>
            </div>
            <!-- COMEÇO DA DIV COLLAPSE HAMBURGER--> <div class="collapse navbar-collapse " id="navbarCollapse">

            <!-- DROPDOWN CATEGORIAS DA NAVBAR -->
                <div class="dropdown navbar-form navbar-left">
                    <button class="btn dropdown-toggle COLORE bordas fontecatorze" type="button" id="menu1" data-toggle="dropdown">&nbsp;&nbsp;categorias
                    <span class="caret"></span></button>
                    <ul class="dropdown-menu COLORE" role="menu" aria-labelledby="menu1">
                        <li role="presentation"><a role="menuitem" class="fontedezesseis" href="#"><!-- variavel categoria--></a></li>
                    </ul>
                </div>
            <div class="col-md-8 centraliza navbar-nav mr-auto fontedezesseis">
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
                <div class="nav-item">
                  <a class="nav-link text-dark opacidade" href="php/CRUDS/deslogarUsuario.php"><i class="fas fa-user-circle"></i>&nbsp;Logout</a>
                </div>
              <?php } ?>

						<!-- CARRINHO DROPDOWN -->
							<div class="dropdown float-left">
								<a href="carrinho" class="dropdown-toggle nav-link text-dark fontedezesseis opacidade" data-toggle="dropdown" role="button"> <i class="fas fa-shopping-cart"></i>&nbsp;Carrinho de compras</a>
								<ul class="dropdown-menu dropdown-cart COLORE opacidadecart" role="menu"><!-- abre aqui -->
										<li class="row"><!--primeiro item carrinho -->
											<div class="fontedoze pr-2 pl-1 mb-0">
													<div class="col-3 float-left">
															<img src="http://lorempixel.com/40/40/" alt="capa do livro"/>
													</div>
													<div class="col-5 float-left">
																	<p class="mb-0 displayblock text-center">título</p>
																	<p class="mb-0 displayblock text-center"><i class="fas fa-dollar-sign"></i> 20,00</p>
													</div>
													<div class="col-3 float-left">
															<button class="btn COLOREICON"><i class="fonteonze COLOREICON fas fa-trash"></i></button>
													</div>
											</div>
										</li>
										<div class="dropdown-divider"></div><!--/ primeiro item carrinho -->

										<li class="row"><!--preenchido pra teste -->
											<div class="fontedoze pr-2 pl-1">
													<div class="col-3 float-left">
															<img src="http://lorempixel.com/40/40/" alt="capa do livro"/>
													</div>
													<div class="col-5 float-left">
																	<p class="mb-0 displayblock text-center">título</p>
																	<p class="mb-0 displayblock text-center"><i class="fas fa-dollar-sign"></i> 20,00</p>
													</div>
													<div class="col-3 float-left">
															<button class="btn COLOREICON"><i class="fonteonze COLOREICON fas fa-trash"></i></button>
													</div>
											</div>
										</li>
										<div class="dropdown-divider"></div>
										<li class="row">
											<div class="fontedoze pr-2 pl-1 mb-0 mt-0">
													<div class="col-3 float-left">
															<img src="http://lorempixel.com/40/40/" alt="capa do livro"/>
													</div>
													<div class="col-5 float-left">
																	<p class="mb-0 displayblock text-center">título</p>
																	<p class="mb-0 displayblock text-center"><i class="fas fa-dollar-sign"></i> 20,00</p>
													</div>
													<div class="col-3 float-left">
															<button class="btn COLOREICON"><i class="fonteonze COLOREICON fas fa-trash"></i></button>
													</div>
											</div>
										</li>
										<div class="dropdown-divider"></div>
										<!--/ preenchidos pra teste -->

										<div class="form-group">
												<div class="col-6 pl-1 float-left">
														<button type="submit" class="btn fontedoze mr-1 pr-2 COLORE1" alt="ir para o carrinho de compras" name="" onclick="carrinho">ver carrinho</button>
												</div>
												<div class="col-3 mr-1 float-left">
														<button type="submit" class="btn fontedoze mr-2 pl-2 pr-1 COLORE1" alt="ir para o carrinho de compras" name="" onclick="carrinho">comprar&nbsp;</button>
												</div>
										</div>
                </ul><!-- fecha aqui -->
						  </div>
            </div>
            </div> <!-- FIM DA DIV COLLAPSE HAMBURGER -->
        <!-- CAMPO DE BUSCA -->
            <form class="form-inline mt-2 mt-md-0 col-md-4 col-lg-4 centraliza" action="busca" method="POST">
                <div class="input-group">
                    <span class="input-group-append">

                            <select class="form-control py-2 COLORE fontecatorze bordas" name="buscaCategoria">
                            <option value=" " class="bordas fontecatorze d-none">buscar por</option>
                            <option value=" " class="bordas fontedezesseis">busca livre</option>
                            <option value="titulo" class="bordas fontedezesseis">título</option>
                            <option value="autor" class="bordas fontedezesseis">autor</option>
                            <option value="ano" class="bordas fontedezesseis">ano</option>
                            </select>

                    </span>
                    <input class="form-control py-2 border-right-0 border noradius" href="#" type="search" value="" id="" name="txtBusca">
                    <span class="input-group-append">
                        <button type="submit" class="fa fa-search input-group-text bg-white noradius"></button>
                    </span>
                </div>
            </form> <!--fim do campo de busca-->
        </nav>
    </header>
    <main>
