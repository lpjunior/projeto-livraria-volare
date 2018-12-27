<?php
require_once 'serviceUsuario.php';
if (!isset($_SESSION)){
session_start();
}
	if (isset($_POST['btn-inserir-fornecedor'])) {
			if ($fornecedor = serviceInserirFornecedor($_POST['nome'], $_POST['rsocial'], $_POST['cnpj'], $_POST['end'],
      $_POST['tel'], $_POST['mail'], $_POST['formap'])) {
					if ($endereco == true){
            header('location: ../../adm/pgfornecedor.php');
					} else {
            header('location: ../../adm/pgfornecedor.php');
          }
			} else {
				return $fornecedor;
			}
		}
