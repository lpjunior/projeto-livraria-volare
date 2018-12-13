<?php
require_once 'conexao.php';
function inserirLivro($categoria, $titulo, $autor, $editora, $isbn, $numeroPaginas, $sinopse, $peso, $data, $fornecedor, $preco, $subcategorias, $capa, $quantidade, $imagem){
	$data = date('Y-m-d', strtotime($data));
	$conexao = getConnection();
	$sql = "INSERT INTO produto VALUES (NULL, '$categoria', '$titulo', '$autor', '$editora', '$isbn', '$numeroPaginas', '$sinopse', '$peso', '$data', '$fornecedor', '$preco', '$quantidade', '$imagem', $subcategorias, $capa)";
	$resultado = mysqli_query($conexao, $sql);
	if (mysqli_affected_rows($conexao) >= 1) {
		return true;
	} else {
		return false;
	}
}

function editarLivro($categoria, $titulo, $autor, $editora, $isbn, $numeroPaginas, $sinopse, $peso, $fornecedor, $preco, $subcategorias, $capa, $id, $quantidade, $imagem){
	$conexao = getConnection();
	$sql = "UPDATE produto SET Categoria_id = $categoria, titulo = '$titulo', autor = '$autor', editora = '$editora', isbn = '$isbn', numeroPaginas = '$numeroPaginas', sinopse = '$sinopse', peso = '$peso', fornecedor = '$fornecedor', preco = '$preco', SubCategorias_id = $subcategorias, TipoDeCapa_id = $capa, quantidade = $quantidade, imagem = $imagem WHERE id = $id";
	$resultado = mysqli_query($conexao, $sql);
	if (mysqli_affected_rows($conexao) >= 1) {
		return true;
	} else {
		return false;
	}
}
function excluirLivro($id){
	$conexao = getConnection();
	$sql = "DELETE FROM produto where id = $id";
	$resultado = mysqli_query($conexao, $sql);
	if (mysqli_affected_rows($conexao) >= 1) {
		return true;
	} else {
		return false;
	}
}
## LISTAR LIVROS
	function listarLivro($limit){
		$conexao = getConnection();
		# Fazer toda a listagem do livro
		$sql = "SELECT
		prod.titulo,
		prod.autor,
		prod.editora,
		prod.isbn,
		prod.numeropaginas as numero_paginas,
		prod.sinopse,
		prod.peso,
		prod.datapublicacao as data_publicacao,
		tcap.tipodecapa as tipo_capa,
		prod.preco,
		prod.quantidade,
		cat.categoria,
		subc.assunto

		from produto prod

		inner join categoria cat on cat.id = prod.categoria_id
		inner join subcategorias subc on subc.id = prod.subcategorias_id
		inner join tipodecapa tcap on tcap.id = prod.tipodecapa_id";
		if ($limit != NULL) {
			$sql .= " LIMIT $limit";
		}
		$resultado = mysqli_query($conexao, $sql);
		if (mysqli_affected_rows($conexao) >= 1) {
			$arr = array();
			while ($linha = mysqli_fetch_assoc($resultado)){
				array_push($arr, $linha);
			}
			return $arr;
		} else {
			return false;
		}
	}
	## BUSCA
	function pesquisarLivro($n, $value){
		$conexao = getConnection();
		$sql = "select
		id,
		titulo,
		autor,
		editora,
		sinopse,
		datapublicacao,
		preco
		from produto";

		switch ($value) {
	    case "titulo":
				$sql .= " WHERE titulo like '%$n%'";
	      break;
	    case "autor":
				$sql .= " WHERE autor like '%$n%'";
	      break;
	    case "ano":
				// $sql .= " WHERE ano like '%$n'";
	      break;
			default:
				$sql .= " WHERE titulo like '%$n%' or autor like '%$n%' or editora like '%$n%'";
				break;
	}
		$sql .= " order by datapublicacao asc;";
		$resultado = mysqli_query($conexao, $sql);
		if (mysqli_affected_rows($conexao) >= 1) {
			$arr = array();
			while ($linha = mysqli_fetch_assoc($resultado)){
				array_push($arr, $linha);
			}
			return $arr;
		} else {
			return false;
		}
	}
	## LANÇAMENTOS
	function listarLancamentos(){
		$conexao = getConnection();
		$sql = "SELECT
		prod.titulo,
		prod.autor,
		prod.editora,
		prod.isbn,
		prod.numeropaginas as numero_paginas,
		prod.sinopse,
		prod.peso,
		prod.datapublicacao as data_publicacao,
		tcap.tipodecapa as tipo_capa,
		prod.preco,
		prod.quantidade,
		cat.categoria,
		subc.assunto

		from produto prod

		inner join categoria cat on cat.id = prod.categoria_id
		inner join subcategorias subc on subc.id = prod.subcategorias_id
		inner join tipodecapa tcap on tcap.id = prod.tipodecapa_id
		order by datapublicacao asc;";
		$resultado = mysqli_query($conexao, $sql);
		if (mysqli_affected_rows($conexao) >= 1) {
			$arr = NULL;
			while ($linha = mysqli_fetch_assoc($resultado)){
			$arr[] = $linha;
		}
	} else {
		return false;
	}
		return $arr;
	}
	## Detalhes do livro
	function detalhesLivro($id){
		$conexao = getConnection();
		$sql = "SELECT
		prod.titulo,
		prod.autor,
		prod.editora,
		prod.isbn,
		prod.numeropaginas as numero_paginas,
		prod.sinopse,
		prod.peso,
		prod.datapublicacao as data_publicacao,
		tcap.tipodecapa as tipo_capa,
		prod.preco,
		prod.quantidade,
		cat.categoria,
		subc.assunto

		from produto prod

		inner join categoria cat on cat.id = prod.categoria_id
		inner join subcategorias subc on subc.id = prod.subcategorias_id
		inner join tipodecapa tcap on tcap.id = prod.tipodecapa_id";
		$sql .= " WHERE prod.id = $id";
		$resultado = mysqli_query($conexao, $sql);
		if (mysqli_affected_rows($conexao) >= 1) {
			$arr = array();
			while ($linha = mysqli_fetch_assoc($resultado)){
				array_push($arr, $linha);
			}
			return $arr;
		} else {
			return false;
		}
	}
