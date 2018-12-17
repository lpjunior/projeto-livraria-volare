<?php
	//sessão
	session_start();
	// conexão
	require_once '../db_connect.php';

	if (isset($_POST['btn-editar'])){
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

		$id = mysqli_escape_string($connect, $_POST['id']);

		$sql = "UPDATE produto SET titulo = '$titulo', autor = '$autor', editora= '$editora',
		         isbn= '$isbn', numeroPaginas='$numeroPaginas', sinopse='$sinopse', peso='$peso',
             dataPublicacao='$dataPublicacao', fornecedor='$fornecedor', preco='$preco', quantidade='$quantidade'
			 WHERE id='$id'";

				 echo $sql;
				 exit;
		if(mysqli_query($connect,$sql)){
			$_SESSION['mensagem']= "Atualizado com sucesso !";

			header('Location: ../pgproduto.php');
		}else{
		$_SESSION['mensagem']= "erro ao atualizar !";
		header('Location: ../pgproduto.php');

		}
	}
	?>
