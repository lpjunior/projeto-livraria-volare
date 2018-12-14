<?php
require_once 'php/CRUDS/serviceBook.php';
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
    <script src="js/dadosFacebook.js"></script>
    <script src="js/facebook-sdk.js"></script>
    <script src="js/jquery-3.3.1.min.js"></script>
  <?php }  ?>

    <header>
        <!-- TOPO DO SITE -->
        <nav class="navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid topoformatacao">
            <a class="text-dark opacidade" href="sobre.php"><i class="fas fa-users"></i> Sobre a Volare</a>&nbsp;&nbsp;
            <a class="text-dark opacidade" href="faleconosco.php"> <i class="fas fa-phone-volume"></i> Fale Conosco</a>
            </div>
        </nav>
        <!-- fim do topo -->
        <nav class="navbar navbar-expand-md navbar-light COLORE">
            <!-- HAMBURGER -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div>
                <img src="img/logomarcac.png"  alt="logomarca">
            </div>
            <!-- COMEÇO DA DIV COLLAPSE HAMBURGER--> <div class="collapse navbar-collapse " id="navbarCollapse">

            <!-- DROPDOWN CATEGORIAS DA NAVBAR -->
                <div class="dropdown navbar-form navbar-left">
                    <button class="btn dropdown-toggle COLORE bordas fontedoze" type="button" id="menu1" data-toggle="dropdown">&nbsp;&nbsp;CATEGORIAS
                    <span class="caret"></span></button>
                    <ul class="dropdown-menu COLORE1" role="menu" aria-labelledby="menu1">
                        <li role="presentation"><a role="menuitem" class="fontedezesseis" href="#">cat 1</a></li>
                        <li role="presentation"><a role="menuitem" class="fontedezesseis" href="#">cat 2</a></li>
                        <li role="presentation"><a role="menuitem" class="fontedezesseis" href="#">cat 3</a></li>
                        <li role="presentation"><a role="menuitem" class="fontedezesseis" href="#">cat 4</a></li>
                    </ul>
                </div>
            <div class="col-md-8 centraliza">
            <!-- LINKS NAVBAR -->
              <ul class="navbar-nav mr-auto fontedezesseis">
                <li class="nav-item ">
                  <a class="nav-link text-dark opacidade" href="index.php"><i class="fas fa-home"></i>&nbsp;Início</a>
                </li>
                <?php
                if (!isset($_SESSION['user']) && !isset($_SESSION['token_face'])) { ?>
                <li class="nav-item">
                  <a class="nav-link text-dark opacidade" href="entrar.php"><i class="fas fa-user-circle"></i>&nbsp;Entre ou cadastre-se</a>
                </li>
              <?php } else { ?>
                <li class="nav-item">
                  <a class="nav-link text-dark opacidade" href="php/CRUDS/deslogarUsuario.php"><i class="fas fa-user-circle"></i>&nbsp;Logout</a>
                </li>
              <?php } ?>
                <li class="nav-item">
                  <a class="nav-link text-dark opacidade" href="carrinho.php"><i class="fas fa-shopping-cart"></i>&nbsp;Carrinho de compras</a>
                </li>
              </ul>
            </div>
            </div> <!-- FIM DA DIV COLLAPSE HAMBURGER -->
        <!-- CAMPO DE BUSCA -->
            <form class="form-inline mt-2 mt-md-0 col-md-4 col-lg-4 centraliza" action="vitrine.php" method="POST">
                <div class="input-group">
                    <span class="input-group-append">

                            <select class="form-control py-2 COLORE1 fonteonze bordas" name="buscaCategoria">
                            <option value=" " class="COLORE1 bordas fontecatorze d-none">BUSCAR POR</option>
                            <option value=" " class="COLORE1 bordas fontedezesseis">busca livre</option>
                            <option value="titulo" class="COLORE1 bordas fontedezesseis">título</option>
                            <option value="autor" class="COLORE1 bordas fontedezesseis">autor</option>
                            <option value="ano" class="COLORE1 bordas fontedezesseis">ano</option>
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
