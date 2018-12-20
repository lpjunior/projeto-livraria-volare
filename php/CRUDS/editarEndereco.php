<?php
session_start();
require_once 'serviceUsuario.php';
	if (isset($_POST['btn-enviar'])) {
			if ($user = serviceEditarEndereco($_POST['txtCEP'], $_POST['txtEndCobr'], $_POST['txtNum'], $_POST['txtComplemento'],
				$_POST['txtBairro'], $_POST['txtCidade'], $_POST['txtEstado'], $_SESSION['user_id'], $_POST['idestinatario'], $_GET['end'])){
					## Caso o usuarío retorne true, as informações foram alteradas com sucesso
				if ($user == true) {
						## Se não for true, retornar um alert.
					header('location: ../../user');
				} else {
					$_SESSION['editarFalse'] = $user;
					header('location: ../../user');
				}
			}
		} else {
			header('location: ../../user');
		}
