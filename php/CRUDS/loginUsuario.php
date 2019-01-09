<?php
if (!isset($_SESSION)){
	session_start();
}
require_once 'serviceUsuario.php';
 if (!isset($_SESSION['block'])){
	if (isset($_POST['btn-enviar'])){
			if ($user = serviceLogin($_POST['txtEmail'], $_POST['isenha'])){
				if ($user === true){
						if (isset($_GET['red']) && $_GET['red'] == 'checkout'){
						header('location: ../../checkout.php');
						echo "true";
					} else {
						header('location: ../../index.php');
						echo "truecheckout";
					}
				} elseif($user == "inativo"){
					$_SESSION['erro'] = "inativo";
					header('location: ../../entrar.php');
					echo "inativo";
					exit;
				}
			}
			$_SESSION['erro'] = 'Erro';
			header('location: ../../entrar.php');
			exit;
			} elseif (isset($_POST['btn-entrar'])){
			if ($user = serviceLoginAdmin($_POST['txtEmail'], $_POST['isenha'])){
				if ($user === true){
					header('location: ../../adm/adm.php');
					echo "admin";
				} else {
					header('location: ../../adm/adm.php');
					echo "admin";
				}
			}
		}
} else {
	header('location: ../../entrar.php');
}
