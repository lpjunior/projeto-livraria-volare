<?php
require_once 'vendor/autoload.php';
$app = new \Slim\App;
require_once "requires/header.php";
## Página de produtos
require_once 'produto.php';
## Home
require_once 'index.php';
## Página de Login
require_once 'entrar.php';
## Fale Conosco
require_once 'faleconosco.php';
## Cadastro de usuário
require_once 'cadastrousuario.php';
## Página do usuário
require_once 'contausuario.php';
## Vitrine
require_once 'vitrine.php';
## Sobre nós
require_once 'sobre.php';
## carrinho
require_once 'carrinho.php';
## Página de erro
require_once 'error.php';
## CHECKOUT
require_once 'checkout.php';
## FOOTER
require_once "requires/footer.php";
$app->run();
