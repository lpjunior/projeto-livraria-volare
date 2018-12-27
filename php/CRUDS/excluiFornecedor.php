<?php
session_start();
require_once 'serviceUsuario.php';
	if (isset($_GET['id'])) {
			if ($fornecedor = serviceExcluirFornecedor($_GET['id'])) {
        if ($fornecedor == true){
        header('location: ../../adm/pgfornecedor.php');
      } else {
        header('location: ../../adm/pgfornecedor.php');
      }
		}
  } else {
    header('location: ../../adm/pgfornecedor.php');
  }
