<?php
	//sessão
	session_start();
	// conexão
	require_once '../db_connect.php';
	
	if (isset($_POST['btn-cadastrar'])){
		$titulo = mysqli_escape_string($connect, $_POST['titulo']);
		$autor = mysqli_escape_string($connect, $_POST['autor']);
		$editora = mysqli_escape_string($connect, $_POST['editora']);
		$isbn = mysqli_escape_string($connect, $_POST['isbn']);
		$numeroPaginas = mysqli_escape_string($connect, $_POST['numeroPaginas']);
		$sinopse = mysqli_escape_string($connect, $_POST['sinopse']);
		$peso = mysqli_escape_string($connect, $_POST['peso']);
		$dataPublicacao = mysqli_escape_string($connect, $_POST['dataPublicacao']);
		$fornecedor = mysqli_escape_string($connect, $_POST['fornecedor']);
		$preco = mysqli_escape_string($connect, $_POST['preco']);
		$quantidade = mysqli_escape_string($connect, $_POST['quantidade']);
		
		
		
		
		$sql = "INSERT INTO `produto` (`id`,`titulo`, `autor`, `editora`, `isbn`, `numeroPaginas`, `sinopse`,
		`peso`, `dataPublicacao`, `fornecedor`, `preco`, `quantidade` )
		VALUES (NULL, '$titulo', '$autor', '$editora', '$isbn', '$numeroPaginas', '$sinopse', '$peso',
		'$dataPublicacao', '$fornecedor', '$preco ', '$quantidade'); ";
		if(mysqli_query($connect,$sql)){
			$_SESSION['mensagem']= "cadastrado com sucesso !";
			header('Location: ../adicionaProduto.php');
		}else{ 
		$_SESSION['mensagem']= "erro ao cadastrar !";
		header('Location: ../adicionaProduto.php');
		
		}
	}
	