<?php require_once("header.php"); ?>
<?php 
session_start(); 
 // echo  $_SESSION['logado']."<br>".$_SESSION['nome_adm'];
if ($_SESSION['logado']!='true' or $_SESSION['nome_adm']!= 'fernando'){
	header('Location: adm.php');
	
}
?>

<h1> pagina dos pedidos</h1>
  
<?php require_once("footer.php"); ?>