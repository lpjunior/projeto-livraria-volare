<?php
session_start();
require_once 'serviceCheckout.php';
	if (isset($_POST['btn-editar-pedido']) && isset($_GET['id'])) {
			if ($pedido = serviceEditarPedido($_POST['status_entrega'], $_POST['status_compra'], $_GET['id'])){
				if ($pedido == true) {
					header('location: ../../adm/pgpedido.php');
				} else {
					header('location: ../../adm/pgpedido.php');
				}
			}
		} else {
			header('location: ../../adm/pgpedido.php');
		}
