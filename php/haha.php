<?php
require_once '../vendor/autoload.php';
$app = new \Slim\App;
$app->get('/home', function ($request, $response, $args) {
  echo "Estou na home";
});
$app->get('/contato', function ($request, $response, $args) {
  echo "Estou na contato";
});
$app->run();
