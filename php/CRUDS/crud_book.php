<?php
if (!isset($_SESSION)) {
	session_start();
}
require_once 'conexao.php';
## INSERIR LIVROS
function inserirLivro($categoria, $titulo, $autor, $editora, $isbn, $numeroPaginas, $sinopse, $peso, $data, $fornecedor, $preco, $subcategorias, $capa, $dimensoes, $quantidade, $idioma, $imagem){
	date_default_timezone_set('America/Sao_Paulo');
	$preco = stringToFloat($preco);
	$conexao = getConnection();
	$sinopse = str_replace('\'', '',$sinopse);
	$sql = "INSERT INTO produto VALUES (NULL, '$categoria', '$titulo', '$autor', '$editora', '$isbn', '$numeroPaginas', '$sinopse', '$peso', '$data', '$preco', '$quantidade', '$dimensoes', $subcategorias, $capa, $fornecedor)";
	$resultado = mysqli_query($conexao, $sql);
	$id = mysqli_insert_id($conexao);
	$imgCapa = $imagem['capa'];
	$imgThumb = $imagem['0'];
	$sql = "INSERT INTO imagemcapa VALUES (NULL, '$imgCapa', $id)";
	$resultado = mysqli_query($conexao, $sql);
	$sql = "INSERT INTO imagemthumb VALUES (NULL, '$imgCapa', $id)";
	$resultado = mysqli_query($conexao, $sql);
	$sql = "INSERT INTO Produto_has_Idioma VALUES ($id, $idioma)";
	$resultado = mysqli_query($conexao, $sql);
	// Botar o $idioma no insert
	if (mysqli_affected_rows($conexao) >= 1) {
		return true;
	} else {
		return "Falha ao inserir o livro";
	}
}
## EDITAR LIVROS
function editarLivro($categoria, $titulo, $autor, $editora, $isbn, $numeroPaginas, $sinopse, $peso, $data, $fornecedor, $preco, $subcategorias, $capa, $dimensoes, $quantidade, $idioma, $imagem, $id){
	$conexao = getConnection();
	// Editando o produto
	$preco = stringToFloat($preco);
	$sql = "UPDATE produto SET Categoria_id = $categoria, titulo = '$titulo', autor = '$autor', editora = '$editora', isbn = '$isbn',
	numeroPaginas = '$numeroPaginas', sinopse = '$sinopse', peso = '$peso', datapublicacao = '$data', fornecedores_id = '$fornecedor',
	preco = '$preco', SubCategorias_id = '$subcategorias',
	TipoDeCapa_id = '$capa', quantidade = '$quantidade', dimensoes = '$dimensoes' WHERE id = $id";
	$resultado = mysqli_query($conexao, $sql);
	if ($imagem != NULL){
	// Editando as imagens
	$imgCapa = $imagem['capa'];
	$imgThumb = $imagem['0'];
	$sql = "UPDATE imagemcapa SET nome = '$imgCapa' where produto_id = $id";
	$resultado = mysqli_query($conexao, $sql);
	$sql = "UPDATE imagemthumb SET nome = '$imgThumb' where produto_id = $id";
	$resultado = mysqli_query($conexao, $sql);
}
	// Pegando o id do idioma
	$sql = "SELECT * from idiomas where idioma = $idioma";
	$resultado = mysqli_query($conexao, $sql);
	$idIdiomas = mysqli_insert_id($conexao);
	echo $sql."<br>";
	// Editando o idioma com o id
	$sql = "UPDATE Produto_has_Idioma set Idioma_id = $idioma where Idioma_id = $idIdiomas";
	$resultado = mysqli_query($conexao, $sql);
	echo $sql."<br>";
	if (mysqli_affected_rows($conexao) >= 1) {
		return true;
	} else {
		return "Falha ao editar o livro";
	}
}
## EXCLUIR LIVROS
function excluirLivro($id){
	$conexao = getConnection();
	$sql = "DELETE FROM imagemcapa where produto_id = $id";
	$resultado = mysqli_query($conexao, $sql);
	$sql = "DELETE FROM imagemthumb where produto_id = $id";
	$resultado = mysqli_query($conexao, $sql);
	$sql = "DELETE FROM produto where id = $id";
	$resultado = mysqli_query($conexao, $sql);
	if (mysqli_affected_rows($conexao) >= 1) {
		return header('location: ../../adm/pgproduto.php');
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
		prod.dimensoes,
		prod.quantidade,
		cat.categoria,
		subc.assunto,
		idi.idioma,
		forn.nome as fornecedor,
		imgcapa.nome as imagemcapa,
        imgthumb.nome as imagemthumb

		from produto prod

		inner join categoria cat on cat.id = prod.categoria_id
		inner join subcategorias subc on subc.id = prod.subcategorias_id
		inner join tipodecapa tcap on tcap.id = prod.tipodecapa_id
		inner join Produto_has_Idioma pi on pi.Produto_id = prod.id
		inner join idioma idi on idi.id = pi.Idioma_id
		inner join imagemcapa imgcapa on prod.id = imgcapa.produto_id
        inner join imagemthumb imgthumb on prod.id = imgthumb.produto_id
		inner join fornecedores forn on forn.id = prod.fornecedores_id";
		## Caso seja a aba de lançamentos, liste os últimos que botaram no site
		if ($lancamento != NULL) {
			$sql .= " ORDER BY datapublicacao desc";
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
	function pesquisarLivro($n, $value, $idioma, $preco, $categoria){
		$conexao = getConnection();
		$sql = "SELECT
		prod.id as id,
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
		prod.dimensoes,
		prod.quantidade,
		cat.categoria,
		cat.id as catId,
		subc.assunto,
		forn.nome as fornecedor,
		imgcapa.nome as imagemcapa,
    imgthumb.nome as imagemthumb,
		idi.idioma as idioma
		from produto prod
		inner join categoria cat on cat.id = prod.categoria_id
		inner join subcategorias subc on subc.id = prod.subcategorias_id
		inner join tipodecapa tcap on tcap.id = prod.tipodecapa_id
		inner join imagemcapa imgcapa on prod.id = imgcapa.produto_id
    inner join imagemthumb imgthumb on prod.id = imgthumb.produto_id
		inner join fornecedores forn on forn.id = prod.fornecedores_id
		inner join Produto_has_Idioma ph on ph.Produto_id = prod.id
		inner join idioma idi on idi.id = ph.Idioma_id";

			############ FILTROS ###############

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

	## Filtro de categoria
	if (isset($categoria) && $categoria != NULL){
		$sql .= " and cat.id = $categoria";
	}
	## Filtro de preço
	if (isset($preco) && $preco != NULL){
		if ($preco == "-20"){
			$sql .= " and prod.preco < 20";
		} elseif ($preco == "20-30"){
			$sql .= " and prod.preco > 20 and prod.preco < 30";
		} elseif ($preco == "30-40"){
			$sql .= " and prod.preco > 30 and prod.preco < 40";
		} else {
			$sql .= " and prod.preco > 40";
		}
	}
	## Filtro de idioma
	if (isset($idioma) && $idioma != NULL){
		$sql .= " and idioma = '$idioma'";
	}
	$sql .= " ORDER BY prod.datapublicacao asc;";

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
		prod.dimensoes,
		prod.quantidade,
		cat.categoria,
		subc.assunto,
		idi.idioma,
		forn.nome as fornecedor,
		imgcapa.nome as imagemcapa,
    imgthumb.nome as imagemthumb

		from produto prod

		inner join categoria cat on cat.id = prod.categoria_id
		inner join subcategorias subc on subc.id = prod.subcategorias_id
		inner join tipodecapa tcap on tcap.id = prod.tipodecapa_id
		inner join Produto_has_Idioma pi on pi.Produto_id = prod.id
		inner join idioma idi on idi.id = pi.Idioma_id
		inner join imagemcapa imgcapa on prod.id = imgcapa.produto_id
    inner join imagemthumb imgthumb on prod.id = imgthumb.produto_id
		inner join fornecedores forn on forn.id = prod.fornecedores_id";
		$sql .= " WHERE prod.id = $id";
		$resultado = mysqli_query($conexao, $sql);
		if (mysqli_affected_rows($conexao) >= 1) {
			$arr = array();
			while ($linha = mysqli_fetch_assoc($resultado)){
				array_push($arr, $linha);
			}
			$a = $arr[0]['data_publicacao'];
			$a = date('d/m/Y', strtotime($a));
			$arr[0]['data_publicacao'] = $a;
			return $arr;
		} else {
			return false;
		}
	}
	function stringToFloat($str) {
  if(strstr($str, ",")) {
    $str = str_replace(".", "", $str); // replace dots (thousand seps) with blancs
    $str = str_replace(",", ".", $str); // replace ',' with '.'
  }

  if(preg_match("#([0-9\.]+)#", $str, $match)) { // search for number that may contain '.'
    return floatval($match[0]);
  } else {
    return floatval($str); // take some last chances with floatval
  }
}
