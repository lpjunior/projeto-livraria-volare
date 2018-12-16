<?php
require_once 'serviceUsuario.php';
	if (isset($_POST['btn-enviar'])) {
			if ($user = serviceEditar($_POST['txtNome'], $_POST['txtSobrenome'], $_POST['txtEmail'],
				$_POST['txtCPF'], $_POST['txtDataNasc'], $_POST['txtGenero'], $_POST['isenha'],
				$_POST['txtCEP'], $_POST['txtEndCobr'], $_POST['txtNum'], $_POST['txtComplemento'],
				$_POST['txtBairro'], $_POST['txtCidade'], $_POST['txtEstado'], $_POST['id'])){
					## Caso o usuarío retorne true, as informações foram alteradas com sucesso
				if ($user == true) {
					$_SESSION['editarTrue'] = "<script>alert('Informações alteradas com sucesso!')</script>";
					header('location: home');
						## Se não for true, retornar um alert.
				} else {
					$_SESSION['editarFalse'] = $user;
					echo $user;
				}
			}
		} else {
			header('location: index.php');
		}
