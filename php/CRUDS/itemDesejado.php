<?php
session_start();
require_once 'serviceUsuario.php';
  if (isset($_GET['idProd'])){
			if ($favoritos = serviceInserirItemDesejado($_SESSION['user_id'], $_GET['idProd'])){
					## Caso o usuarío retorne true, as informações foram alteradas com sucesso
				if ($favoritos == true) {
						## Se não for true, retornar um alert.
          $_SESSION['mensagem'] = "<script>alert('Item adicionado aos favoritos com sucesso!')</script>";
					header("location: ../../produto.php?id=".$_GET['idProd']);
				} else {
					$_SESSION['mensagem'] = "<script>alert('Erro ao adicionar aos favoritos')</script>";
					header("location: ../../produto.php?id=".$_GET['idProd']);
				}
			}
		} else {
			header('location: ../../home');
		}
