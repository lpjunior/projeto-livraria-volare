<?php require_once("header.php"); ?>
<?php
if (!isset($_SESSION)){
	session_start();
}
// echo  $_SESSION['logado']."<br>".$_SESSION['nome_adm'];
if (!isset($_SESSION['user_id'])){
	header('Location: adm.php');
}
?>
<?php require_once("footer.php"); ?>
