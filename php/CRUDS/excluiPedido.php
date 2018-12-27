<?php
session_start();
require_once 'serviceUsuario.php';
	if (isset($_GET['id'])) {
			if ($pedido = serviceExcluirPedido($_GET['id']){
        if ($pedido == true){
        header('location: ../../adm/pgpedido.php');
      } else {
        header('location: ../../adm/pgpedido.php');
      }
		}
  } else {
    header('location: ../../adm/pgpedido.php');
  }
