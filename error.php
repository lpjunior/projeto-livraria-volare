<?php
$app->get('/error', function ($request, $response, $args) {
  echo "<h1 class='text-center'>Página não encontrada</h1>";
})->setName("error");
