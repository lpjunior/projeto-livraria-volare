<?php
require_once 'crud_book.php';
	function serviceInserir($categoria, $titulo, $autor, $editora, $isbn, $numeroPaginas, $sinopse, $peso, $data, $fornecedor, $preco, $subcategorias, $capa, $quantidade, $imagem){
		if ($livro = inserirLivro($categoria, $titulo, $autor, $editora, $isbn, $numeroPaginas, $sinopse, $peso, $data, $fornecedor, $preco, $subcategorias, $capa, $quantidade, $imagem)){
			return $livro;
		} else {
			return false;
		}
	}
	function serviceEditar($categoria, $titulo, $autor, $editora, $isbn, $numeroPaginas, $sinopse, $peso, $fornecedor, $preco, $subcategorias, $capa, $id, $quantidade, $imagem){
		if ($livro = editarLivro($categoria, $titulo, $autor, $editora, $isbn, $numeroPaginas, $sinopse, $peso, $fornecedor, $preco, $subcategorias, $capa, $id, $quantidade, $imagem)){
			return $livro;
		} else {
			return false;
		}

	}
	function serviceExcluir($id){
		if ($livro = excluirLivro($id)){
			return $livro;
		} else {
			return false;
		}
	}
	function serviceListarLivro($limit){
		if ($livro = listarLivro($limit)) {
			return $livro;
		} else {
			return false;
		}
	}
	function serviceListarLancamento(){
		if ($livro = listarLancamentos()) {
			return $livro;
		} else {
			return false;
		}
	}
	function serviceBuscarLivro($n, $value){
		if ($livro = pesquisarLivro($n, $value)) {
			return $livro;
		} else {
			return false;
		}
		}
		function serviceDetalhesLivro($id){
			if ($livro = detalhesLivro($id)) {
				return $livro;
			} else {
				return false;
			}
		}
