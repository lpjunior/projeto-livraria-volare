<?php
require_once '../php/CRUDS/serviceBook.php';
require_once '../php/CRUDS/serviceUsuario.php';
require_once '../php/CRUDS/serviceCheckout.php';?>
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
<body class="planodefundo">
  <div>
    <nav class="navbar navbar-expand-md navbar-light COLORE centraliza">
        <div class="row mx-auto">
          <div class="nav-item pr-2 pl-2 mb-0">
            <a class="nav-link text-dark opacidade" href="adm.php"><i class="fas fa-home"></i>&nbsp;Home</a>
          </div>
          <div class="nav-item pr-2 pl-2 mb-0">
            <!-- *****LINKAR PÁGINA ******--><a class="nav-link text-dark opacidade" href="  "><i class="fas fa-user"></i>&nbsp;Meu perfil</a>
          </div>
          <div class="dropdown pr-2 pl-2 mb-0 float-left"><!-- começo dropdown -->
          <a href="#" class="dropdown-toggle nav-link text-dark opacidade" data-toggle="dropdown" role="button"><i class="fas fa-paste"></i>&nbsp;Cadastrar</a>
            <ul class="dropdown-menu COLORE" role="menu">
              <li>
                <div class="pr-2 pl-2 mb-0">
                    <a href="cadastrarpro.php" class="text-dark" >produto</a>
                </div>
              </li>
              <div class="dropdown-divider"></div>
              <li>
                <div class="pr-2 pl-2 mb-0">
                    <a href="cadastrarfor.php" class="text-dark">fornecedor</a>
                </div>
              </li>
            </ul>
          </div> <!-- fim da div dropdown -->
          <div class="dropdown pr-2 pl-2 mb-0 float-left"><!-- começo dropdown -->
          <a href="#" class="dropdown-toggle nav-link text-dark opacidade" data-toggle="dropdown" role="button"><i class="fas fa-chart-area"></i>&nbsp;Consultar/editar</a>
            <ul class="dropdown-menu COLORE" role="menu">
              <li>
                <div class="pr-2 pl-2 mb-0">
                    <a href="pgproduto.php" class="text-dark">produto</a>
                </div>
              </li>
              <div class="dropdown-divider"></div>
              <li>
                <div class="pr-2 pl-2 mb-0">
                    <a href="pgfornecedor.php" class="text-dark">fornecedor</a>
                </div>
              </li>
              <div class="dropdown-divider"></div>
              <li>
                <div class="pr-2 pl-2 mb-0">
                    <a href="pgpedido.php" class="text-dark">histórico de pedidos</a>
                </div>
              </li>
                <div class="dropdown-divider"></div>
              <li>
                <div class="pr-2 pl-2 mb-0">
                    <a href="consultavendas.php" class="text-dark">vendas</a>
                </div>
              </li>
              <div class="dropdown-divider"></div>
              <li>
                <div class="pr-2 pl-2 mb-0">
                    <a href="pgusuarios.php" class="text-dark">usuários</a>
                </div>
              </li>
            </ul>
          </div> <!-- fim da div dropdown -->
          <div class="nav-item pr-2 pl-2 mb-0">
            <a class="nav-link text-dark opacidade" href="upbanner.php"><i class="fas fa-images"></i>&nbsp;banner</a>
          </div>
          <div class="nav-item pr-2 pl-2 mb-0">
            <a class="nav-link text-dark opacidade" href="logout.php"><i class="fas fa-reply"></i>&nbsp;Sair</a>
          </div>

        </div>
    </nav>
  </div>
<main class="container-fluid">
