<?php
require_once 'serviceUsuario.php';
	if (isset($_POST['btn-enviar'])){
			if ($user = serviceLogin($_POST['txtEmail'], $_POST['isenha'])){
				if ($user === true){
						if (isset($_GET['red']) && $_GET['red'] == 'checkout'){
						header('location: ../../checkout');
					} else {
						header('location: ../../home');
					}
				} else {
					$_SESSION['erro'] = $user;
					header('location: ../../entrar');
				}
			}
		} elseif (isset($_POST['btn-entrar'])){
			if ($user = serviceLoginAdmin($_POST['txtEmail'], $_POST['isenha'])){
				if ($user === true){
					echo "a";
					header('location: ../../adm/adm.php');
				} else {
					echo "b";
					$_SESSION['erro'] = $user;
					header('location: ../../adm/adm.php');
				}
			}
}
