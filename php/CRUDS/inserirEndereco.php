<?php
require_once 'serviceUsuario.php';
session_start();
	if (isset($_POST['btn-inserir-endereço'])) {
			if ($endereco = serviceInserirEndereço($_POST['txtCEP'], $_POST['txtEndCobr'], $_POST['txtNum'], $_POST['txtComplemento'],
      $_POST['txtBairro'], $_POST['txtCidade'], $_POST['txtEstado'], $_POST['idestinatario'], 1) {
					if ($livro == true){
					}
			} else {
				return $livro;
			}
		}
