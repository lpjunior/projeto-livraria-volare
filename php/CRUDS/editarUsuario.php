<?php
session_start();
require_once 'serviceUsuario.php';
	if (isset($_POST['btn-enviar']) && $_POST['isenha'] === $_POST['isenha2']) {
			if ($user = serviceEditarUsuario($_POST['txtNome'], $_POST['txtSobrenome'], $_POST['txtEmail'],
			$_POST['txtCPF'], $_POST['txtDataNasc'], $_POST['txtGenero'], $_POST['isenha'], $_SESSION['user_id'] ,$_POST['iTelefone'])){
					## Caso o usuarío retorne true, as informações foram alteradas com sucesso
				if ($user == true) {
						## Se não for true, retornar um alert.
					header('location: ../../contausuario.php?editarUsu=true');
				} else {
					header('location: ../../contausuario.php?editarUsu=false');
				}
			}
		} else {
			header('location: ../../contausuario.php');
		}
