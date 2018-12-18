<?php
require_once '../php/CRUDS/serviceBook.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <title>Volare Livraria</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!--Import Google Icon Font-->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="../css/estilo.css">
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
    <nav class="navbar navbar-expand-md navbar-light COLORE">
    <!-- LOGO -->
      <div class="col-md-3">
          <img src="../img/logomarcac.png" alt="logomarca volare">
      </div>
      <div class="col-md-9 centraliza">
        <!-- LINKS NAVBAR -->
          <ul class="navbar-nav">
              <li class="nav-item pr-3">
                  <a class="nav-link text-dark opacidade" href="adm.php"><i class="fas fa-home"></i>&nbsp;Home</a>
              </li>
              <li class="nav-item pr-3">
                  <a class="nav-link text-dark opacidade" href="adm.php"><i class="fas fa-user"></i>&nbsp;Meu perfil</a><!--linkar com a pag user-->
              </li>
			        <li class="nav-item pr-3">
                  <a class="nav-link text-dark opacidade" href="pgclientes.php"><i class="fas fa-user-edit"></i>&nbsp;Clientes</a>
              </li>
              <li class="nav-item pr-3">
                  <a class="nav-link text-dark opacidade" href="pgfornecedor.php"><i class="fas fa-user-tie"></i>&nbsp;Fornecedores</a>
              </li>
              <li class="nav-item pr-3">
                  <a class="nav-link text-dark opacidade" href="pgproduto.php"><i class="fas fa-paste"></i>&nbsp;Produtos</a>
              </li>
			        <li class="nav-item pr-3">
                  <a class="nav-link text-dark opacidade" href="logout.php"><i class="fas fa-reply"></i>&nbsp;Sair</a>
              </li>
          </ul>
      </div>
    </nav>
<main>
