	<?php
	require_once 'crud_book.php';
	function serviceInserir($categoria, $titulo, $autor, $editora, $isbn, $numeroPaginas, $sinopse, $peso, $data, $fornecedor, $preco, $subcategorias, $capa, $dimensoes, $quantidade, $idioma){
		if ($livro = inserirLivro($categoria, $titulo, $autor, $editora, $isbn, $numeroPaginas, $sinopse, $peso, $data, $fornecedor, $preco, $subcategorias, $capa, $dimensoes, $quantidade, $idioma)){
			return $livro;
		}
	}
	function serviceEditar($categoria, $titulo, $autor, $editora, $isbn, $numeroPaginas, $sinopse, $peso, $fornecedor, $preco, $subcategorias, $capa, $id, $quantidade, $imagem){
		if ($livro = editarLivro($categoria, $titulo, $autor, $editora, $isbn, $numeroPaginas, $sinopse, $peso, $fornecedor, $preco, $subcategorias, $capa, $id, $quantidade, $imagem)){
			return $livro;
		}
	}
	function serviceExcluir($id){
		if ($livro = excluirLivro($id)){
			return $livro;
		}
	}
	function serviceListarLivro($limit, $lancamento){
		if ($livro = listarLivro($limit, $lancamento)) {
			return $livro;
		}
	}
	function serviceBuscarLivro($n, $value, $idioma, $preco){
		if ($livro = pesquisarLivro($n, $value, $idioma, $preco)) {
			return $livro;
		}
	}
	function serviceDetalhesLivro($id){
		if ($livro = detalhesLivro($id)) {
			return $livro;
		}
	}
