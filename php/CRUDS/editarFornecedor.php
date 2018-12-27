<?php
session_start();
require_once 'serviceUsuario.php';
	if (isset($_POST['btn-fornecedor-editar'])) {
			if ($fornecedor = serviceEditarFornecedor($_POST['txtNome'], $_POST['txtRazaoSocial'], $_POST['txtCNPJ'],
      $_POST['txtEndereco'], $_POST['txtTelefone'], $_POST['txtEmail'], $_POST['txtFormap'], $_GET['id'])) {
					if ($fornecedor == true){
						header('location: ../../adm/pgfornecedor.php');
					} else {
            header('location: ../../adm/pgfornecedor.php');
          }
			}
}
