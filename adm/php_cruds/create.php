<?php
	//sessão
	session_start();
	// conexão
	require_once '../db_connect.php';
	
	if (isset($_POST['btn-cadastrar'])){
		$razaoSocial = mysqli_escape_string($connect, $_POST['razaoSocial']);
		$cnpj = mysqli_escape_string($connect, $_POST['cnpj']);
		$inscEstadual = mysqli_escape_string($connect, $_POST['inscEstadual']);
		$cep = mysqli_escape_string($connect, $_POST['cep']);
		$logradouro = mysqli_escape_string($connect, $_POST['logradouro']);
		$numero = mysqli_escape_string($connect, $_POST['numero']);
		$complemento = mysqli_escape_string($connect, $_POST['complemento']);
		$bairro = mysqli_escape_string($connect, $_POST['bairro']);
		$cidade = mysqli_escape_string($connect, $_POST['cidade']);
		$estado = mysqli_escape_string($connect, $_POST['estado']);
		$telefone = mysqli_escape_string($connect, $_POST['telefone']);
		$email = mysqli_escape_string($connect, $_POST['email']);
		
		
		
		$sql = "INSERT INTO `fornecedor` (`id`, `razaoSocial`, `cnpj`, `inscEstadual`, `cep`, `logradouro`,
		`numero`, `complemento`, `bairro`, `cidade`, `estado`, `telefone`, `email`)
		VALUES (NULL, '$razaoSocial', '$cnpj', '$inscEstadual', '$cep', '$logradouro', '$numero', '$complemento',
		'$bairro', '$cidade', '$estado ', '$telefone', '$email'); ";
		if(mysqli_query($connect,$sql)){
			$_SESSION['mensagem']= "cadastrado com sucesso !";
			header('Location: ../adicionaFornecedor.php');
		}else{ 
		$_SESSION['mensagem']= "erro ao cadastrar !";
		header('Location: ../adicionaFornecedor.php');
		
		}
	}
	