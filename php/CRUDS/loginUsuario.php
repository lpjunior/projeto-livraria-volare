<?php
require_once 'serviceUsuario.php';
	if (isset($_POST['btn-enviar'])){
			if ($user = serviceLogin($_POST['txtEmail'], $_POST['isenha'])){
				if ($user === true){
					header('location: ../../index.php');
				} else {
					$_SESSION['erro'] = $user;
					header('location: ../../entrar.php');
				}
			}
		}
