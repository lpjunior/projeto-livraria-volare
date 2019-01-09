<?php
if (!isset($_SESSION)){
	session_start();
}
require_once 'serviceUsuario.php';
 if (!isset($_SESSION['block'])){
	if (isset($_POST['btn-enviar'])){
			if ($user = serviceLogin($_POST['txtEmail'], $_POST['isenha'])){
				if ($user === true){
						if (isset($_SESSION['headercheckout']) && $_SESSION['headercheckout'] == true){
							unset($_SESSION['headercheckout']);
						header('location: ../../checkout.php');
					} else {
						header('location: ../../index.php');
					}
				} elseif($user == "inativo"){
					$_SESSION['erro'] = "inativo";
					header('location: ../../entrar.php');
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
				} else {
					header('location: ../../adm/adm.php');
				}
			}
		}
} else {
	header('location: ../../entrar.php');
}
