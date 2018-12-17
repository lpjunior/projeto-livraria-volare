<?php
	//sessão
	session_start();
	// conexão
	require_once '../db_connect.php';
	
	if (isset($_POST['btn-editar'])){
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
		
		$id = mysqli_escape_string($connect, $_POST['id']);
		
		$sql = "UPDATE fornecedor SET razaoSocial = '$razaoSocial', cnpj = '$cnpj', inscEstadual='$inscEstadual',
		         cep='$cep', logradouro='$logradouro', numero='$numero', complemento='$complemento', 
                 bairro='$bairro', cidade='$cidade', estado='$estado', telefone='$telefone', email='$email' 
				 WHERE id='$id'";
                 
				 
		if(mysqli_query($connect,$sql)){
			$_SESSION['mensagem']= "Atualizado com sucesso !";
			
			header('Location: ../pgfornecedor.php');
		}else{ 
		$_SESSION['mensagem']= "erro ao atualizar !";
		header('Location: ../pgfornecedor.php');
		
		}
	}
	