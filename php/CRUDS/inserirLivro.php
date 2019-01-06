<?php
session_start();
require_once 'serviceBook.php';
require_once '../uploadImagem.php';
	if (isset($_POST['btn-livro-enviar'])) {
		$fotos = uploadImg($_FILES['foto']);
			if ($livro = serviceInserir(
				$_POST['categoria'], $_POST['titulo'], $_POST['autor'], $_POST['editora'],
				$_POST['ISBN'], $_POST['numeropaginas'], $_POST['sinopse'], $_POST['peso'],
				$_POST['data_publicacao'], $_POST['fornecedor'], $_POST['preco'],
				$_POST['subcategorias'], $_POST['capa'], $_POST['dimensoes'], $_POST['quantidade'],
				$_POST['idioma'], $fotos)) {
					if ($livro == true){
						header('location: ../../adm/cadastrarpro.php?inserir=true');
					} else {
						header('location: ../../adm/cadastrarpro.php?inserir=false');
					}
			} else {
				return $livro;
			}
		}
