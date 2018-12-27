<?php
session_start();
require_once 'serviceBook.php';
require_once '../uploadImagem.php';
	if (isset($_POST['btn-livro-enviar'])) {
		if ($_FILES['foto']['name'] != ''){
		$fotos = uploadImg($_FILES['foto']);
	}
			if ($livro = serviceEditar(
				$_POST['categoria'], $_POST['titulo'], $_POST['autor'], $_POST['editora'],
				$_POST['ISBN'], $_POST['numeropaginas'], $_POST['sinopse'], $_POST['peso'],
				$_POST['data_publicacao'], $_POST['fornecedor'], $_POST['preco'],
				$_POST['subcategorias'], $_POST['capa'], $_POST['dimensoes'], $_POST['quantidade'],
				$_POST['idioma'], ($_FILES['foto']['name'] != '') ? $fotos : NULL, $_GET['id'])) {
					if ($livro == true){
						header('location: ../../adm/pgproduto.php');
					}
			} else {
				return $livro;
			}
		}
