<?php
require_once 'conexao.php';

## INSERIR LIVROS
function inserirLivro($categoria, $titulo, $autor, $editora, $isbn, $numeroPaginas, $sinopse, $peso, $data, $fornecedor, $preco, $subcategorias, $capa, $quantidade, $imagem){
	$data = date('Y-m-d', strtotime($data));
	$conexao = getConnection();
	$sql = "INSERT INTO produto VALUES (NULL, '$categoria', '$titulo', '$autor', '$editora', '$isbn', '$numeroPaginas', '$sinopse', '$peso', '$data', '$fornecedor', '$preco', '$quantidade', '$imagem', $subcategorias, $capa)";
	$resultado = mysqli_query($conexao, $sql);
	if (mysqli_affected_rows($conexao) >= 1) {
		return true;
	} else {
		return "Falha ao inserir o livro";
	}
}
## EDITAR LIVROS
function editarLivro($categoria, $titulo, $autor, $editora, $isbn, $numeroPaginas, $sinopse, $peso, $fornecedor, $preco, $subcategorias, $capa, $id, $quantidade, $imagem){
	$conexao = getConnection();
	$sql = "UPDATE produto SET Categoria_id = $categoria, titulo = '$titulo', autor = '$autor', editora = '$editora', isbn = '$isbn', numeroPaginas = '$numeroPaginas', sinopse = '$sinopse', peso = '$peso', fornecedor = '$fornecedor', preco = '$preco', SubCategorias_id = $subcategorias, TipoDeCapa_id = $capa, quantidade = $quantidade, imagem = $imagem WHERE id = $id";
	$resultado = mysqli_query($conexao, $sql);
	if (mysqli_affected_rows($conexao) >= 1) {
		return true;
	} else {
		return "Falha ao editar o livro";
	}
}
## EXCLUIR LIVROS
function excluirLivro($id){
	$conexao = getConnection();
	$sql = "DELETE FROM produto where id = $id";
	$resultado = mysqli_query($conexao, $sql);
	if (mysqli_affected_rows($conexao) >= 1) {
		return true;
	} else {
		return "Falha ao excluir o livro";
	}
}
## LISTAR LIVROS
	function listarLivro($limit, $lancamento){
		$conexao = getConnection();
		# Fazer toda a listagem do livro
		$sql = "SELECT
		prod.id,
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
		## Botar um limite na lista dos livros
		if ($limit != NULL) {
			$sql .= " LIMIT $limit";
		}
		## Caso seja a aba de lançamentos, liste os últimos que botaram no site
		if ($lancamento != NULL) {
			$sql .= " ORDER BY data_publicacao asc;";
		}
		$resultado = mysqli_query($conexao, $sql);
		if (mysqli_affected_rows($conexao) >= 1) {
			$arr = array();
			while ($linha = mysqli_fetch_assoc($resultado)){
				array_push($arr, $linha);
			}
			return $arr;
		} else {
			return "Falha ao exibir resultados";
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
				$sql .= " WHERE autor like '%$n%'";
	      break;
			default:
				$sql .= " WHERE titulo like '%$n%' or autor like '%$n%' or editora like '%$n%'";
				$padrao = true;
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
			return "<h1 class='text-center'>A busca não teve resultados.</h1>";
		}
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
