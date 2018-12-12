<?php
# Pega o Valor do token do facebook
session_start();
$_SESSION['face_token'] = $_POST['token'];
$_SESSION['face_id'] = $_POST['id'];
header('location: index.php');
?>
