<?php
require_once 'serviceUsuario.php';
	if (isset($_POST['btn-enviar'])) {
			if ($user = serviceEditar($_POST['txtNome'], $_POST['txtSobrenome'], $_POST['txtEmail'],
				$_POST['txtCPF'], $_POST['txtDataNasc'], $_POST['txtGenero'], $_POST['isenha'],
				$_POST['txtCEP'], $_POST['txtEndCobr'], $_POST['txtNum'], $_POST['txtComplemento'],
				$_POST['txtBairro'], $_POST['txtCidade'], $_POST['txtEstado'], $_POST['id'])){
				if ($user == true) {
					$_SESSION['editarTrue'] = "<script>alert('Informações alteradas com sucesso!')</script>";
					header('location: index.php');
				} else {
					$_SESSION['editarFalse'] = $user;
					echo $user;
				}
			}
		} else {
			header('location: index.php');
		}
