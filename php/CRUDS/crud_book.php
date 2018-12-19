<?php
if (!isset($_SESSION)) {
	session_start();
}
require_once 'conexao.php';
## INSERIR LIVROS
function inserirLivro($categoria, $titulo, $autor, $editora, $isbn, $numeroPaginas, $sinopse, $peso, $data, $fornecedor, $preco, $subcategorias, $capa, $dimensoes, $quantidade, $idioma){
	$data = date('Y-m-d', strtotime($data));
	$conexao = getConnection();
	$sql = "INSERT INTO produto VALUES (NULL, '$categoria', '$titulo', '$autor', '$editora', '$isbn', '$numeroPaginas', '$sinopse', '$peso', '$data', '$preco', '$quantidade', '$dimensoes', $subcategorias, $capa, $fornecedor)";
	$resultado = mysqli_query($conexao, $sql);
	$id = mysqli_insert_id($conexao);
	$sql = "INSERT INTO imagens VALUES";
	$cont = 1;
	foreach ($imagem as $i) {
		$nome = $i['nome'];
		if (count($imagem) == $cont){
		$sql .= " (null, $nome, $id)";
	} else {
		$cont++;
		$nome = $i['nome'];
		$sql .= " (null, $nome, $id),";
	}
}
	$resultado = mysqli_query($conexao, $sql);
	$sql = "INSERT INTO Produto_has_Idioma VALUES ($id, 1)";
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
		## Caso seja a aba de lançamentos, liste os últimos que botaram no site
		if ($lancamento != NULL) {
			$sql .= " ORDER BY data_publicacao desc";
		}
		## Botar um limite na lista dos livros
		if ($limit != NULL) {
			$sql .= " LIMIT $limit;";
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
	function pesquisarLivro($n, $value, $idioma, $preco){
		$conexao = getConnection();
		$sql = "select prod.id, prod.titulo, prod.autor, prod.editora, prod.sinopse, prod.datapublicacao, prod.preco
		from produto prod";
		## Se tiver filtro por idioma, fazer o select com o idioma.
		if (isset($idioma) && $idioma != NULL){
			$sql .= " inner join Produto_has_Idioma ph on ph.Produto_id = prod.id
			inner join idioma idi on idi.id = ph.Idioma_id";
		}
		switch ($value) {
			 ### FILTRO DE TITULO ###
	    case "titulo":
				$sql .= " WHERE prod.titulo like '%$n%'";
	      break;

				### FILTRO DE AUTOR ###
	    case "autor":
				$sql .= " WHERE prod.autor like '%$n%'";
	      break;

				 ### FILTRO POR ANO DA PUBLICAÇÃO ###
	    case "ano":
				$sql .= " WHERE prod.datapublicacao like '%$n'";
	      break;

				### CASO A BUSCA SEJA LIVRE ###
			default:
				$sql .= " WHERE (prod.titulo like '%$n%' or prod.autor like '%$n%' or prod.editora like '%$n%')";
				break;
	}
	## Caso o filtro preço seja ativado, filtrar pelo preço.
	if (isset($preco) && $preco != NULL){
		if ($preco == "20-"){
			$sql .= " and prod.preco < 20";
		} elseif ($preco == "20+30-"){
			$sql .= " and prod.preco > 20 and prod.preco < 30";
		} elseif ($preco == "30+40-"){
			$sql .= " and prod.preco > 30 and prod.preco < 40";
		} else {
			$sql .= " and prod.preco > 40";
		}
	}

	## Caso algum idioma seja escolhido como filtro, filtre por idioma.
	if (isset($idioma) && $idioma != NULL){
		$sql .= " and idioma = '$idioma'";
	}
	$sql .= " ORDER BY prod.datapublicacao asc;";
		## enviar o resultado pro banco
		$resultado = mysqli_query($conexao, $sql);
		if (mysqli_affected_rows($conexao) >= 1) {
			$arr = array();
			## Botar o resultado dentro de um array e retornar
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
