<?php
session_start();
require_once 'serviceUsuario.php';
	if (isset($_POST['btn-enviar'])) {
			if ($user = serviceEditarEndereco($_POST['txtCEP'], $_POST['txtEndCobr'], $_POST['txtNum'], $_POST['txtComplemento'],
				$_POST['txtBairro'], $_POST['txtCidade'], $_POST['txtEstado'], $_SESSION['user_id'], $_POST['idestinatario'], $_GET['end'])){
					## Caso o usuarío retorne true e o checkout for diferente de true, mande para a página de usuários
				if ($user == true && $_GET['checkout'] != true) {
					header('location: ../../user?editar=true');
				} elseif ($_GET['checkout'] == true) {
					header('location: ../../checkout?editar=true');
				} else {
					header('location: ../../user?editar=erro');
				}
			}
		} else {
			header('location: ../../user');
		}
