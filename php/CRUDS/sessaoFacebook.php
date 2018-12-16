<?php
# Pega o Valor do token do facebook
/*session_start();
$_SESSION['face_token'] = $_POST['token'];
$_SESSION['face_id'] = $_POST['id'];
header('location: ../../home');
*/
# Pega o Valor do token do facebook
session_start();
header("Content-Type: application/json; charset=UTF-8");
$dados = json_decode($_GET["x"], false);
$_SESSION['token_face'] = $dados;
header('location: ../../home');
?>
