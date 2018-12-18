<?php
require_once 'crud_usuario.php';
	function serviceLogin($email, $senha){
		if ($user = logarUsuario($email, $senha)){
			return $user;
		}
	}

	function serviceRegistro($nome, $sobrenome, $email, $cpf, $datanascimento, $genero, $senha, $cep, $end, $num, $complemento, $bairro, $cidade, $estado, $cat, $telefone){
		if ($user = registrarUsuario($nome, $sobrenome, $email, $cpf, $datanascimento, $genero, $senha, $cep, $end, $num, $complemento, $bairro, $cidade, $estado, $cat, $telefone)){
			return $user;
		}
	}
	function serviceEditarUsuario($nome, $sobrenome, $email, $cpf, $datanascimento, $genero, $senha, $cep, $end, $num, $complemento, $bairro, $cidade, $estado, $id, $telefone){
		if ($user = editarInformacoes($nome, $sobrenome, $email, $cpf, $datanascimento, $genero, $senha, $cep, $end, $num, $complemento, $bairro, $cidade, $estado, $id, $telefone)){
			return $user;
		}
	}
	function serviceListarUsu($limit, $id){
		if ($user = listarUsuario($limit, $id)){
			return $user;
		}
	}
	function serviceDeslogar(){
		deslogarUsuario();
	}
	function serviceChecarCpf($cpf){
		if ($user = checarCPF($cpf)){
			return $user;
		}
	}
	function serviceLoginAdmin($email, $senha){
		if ($user = loginUsuarioAdmin($email, $senha)){
			return $user;
		}
	}
	function serviceInserirItemDesejado($usuarioID, $produtoID){
		if ($user = inserirItemDesejado($usuarioID, $produtoID)){
			return $user;
		}
	}
	function serviceListarItemDesejado(){
		if ($user = listarItemDesejado()){
			return $user;
		}
	}
