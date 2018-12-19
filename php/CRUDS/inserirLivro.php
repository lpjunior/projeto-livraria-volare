<?php
session_start();
require_once 'serviceBook.php';
	if (isset($_POST['livro-enviar'])) {
		uploadImg($_FILES['foto']);
			if ($livro = serviceInserir(
				$_POST['categoria'], $_POST['titulo'], $_POST['autor'], $_POST['editora'],
				$_POST['ISBN'], $_POST['numeropaginas'], $_POST['sinopse'], $_POST['peso'],
				$_POST['data_publicacao'], $_POST['fornecedor'], $_POST['preco'],
				$_POST['subcategorias'], $_POST['capa'], $_POST['dimensoes'], $_POST['quantidade'],
				$_POST['idiomas'], $_POST['foto']) {
				echo $livro;
			} else {
				echo $livro;
			}
		}
