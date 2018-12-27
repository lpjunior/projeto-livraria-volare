	<?php
	require_once 'crud_book.php';
	function serviceInserir($categoria, $titulo, $autor, $editora, $isbn, $numeroPaginas, $sinopse, $peso, $data, $fornecedor, $preco, $subcategorias, $capa, $dimensoes, $quantidade, $idioma, $imagem){
		if ($livro = inserirLivro($categoria, $titulo, $autor, $editora, $isbn, $numeroPaginas, $sinopse, $peso, $data, $fornecedor, $preco, $subcategorias, $capa, $dimensoes, $quantidade, $idioma, $imagem)){
			return $livro;
		}
	}
	function serviceEditar($categoria, $titulo, $autor, $editora, $isbn, $numeroPaginas, $sinopse, $peso, $data, $fornecedor, $preco, $subcategorias, $capa, $dimensoes, $quantidade, $idioma, $imagem, $id){
		if ($livro = editarLivro($categoria, $titulo, $autor, $editora, $isbn, $numeroPaginas, $sinopse, $peso, $data, $fornecedor, $preco, $subcategorias, $capa, $dimensoes, $quantidade, $idioma, $imagem, $id)){
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
	function serviceBuscarLivro($n, $value, $idioma, $preco, $categoria){
		if ($livro = pesquisarLivro($n, $value, $idioma, $preco, $categoria)) {
			return $livro;
		}
	}
	function serviceDetalhesLivro($id){
		if ($livro = detalhesLivro($id)) {
			return $livro;
		}
	}
	function resume($var, $limite){	// Se o texto for maior que o limite, ele corta o texto e adiciona 3 pontinhos.
		if (strlen($var) > $limite)	{
			$var = substr($var, 0, $limite);		$var = trim($var) . "...";
		}
		return $var;
	}
