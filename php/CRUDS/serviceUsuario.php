<?php
require_once 'crud_usuario.php';
	function serviceLogin($email, $senha){
		if ($user = logarUsuario($email, $senha)){
			return $user;
		}
	}

	function serviceRegistro($nome, $sobrenome, $email, $cpf, $datanascimento, $genero, $senha, $cep, $end, $num, $complemento, $bairro, $cidade, $estado){
		if ($user = registrarUsuario($nome, $sobrenome, $email, $cpf, $datanascimento, $genero, $senha, $cep, $end, $num, $complemento, $bairro, $cidade, $estado)){
			return $user;
		}
	}
	function serviceEditar($nome, $sobrenome, $email, $cpf, $datanascimento, $genero, $senha, $cep, $end, $num, $complemento, $bairro, $cidade, $estado, $id){
		if ($user = editarInformacoes($nome, $sobrenome, $email, $cpf, $datanascimento, $genero, $senha, $cep, $end, $num, $complemento, $bairro, $cidade, $estado, $id)){
			return $user;
		}
	}
	function serviceListarUsu($nome, $sobrenome, $email, $cpf, $datanascimento, $genero, $cep, $end, $num, $complemento, $bairro, $cidade, $estado, $limit){
		if ($user = listarUsuario($nome, $sobrenome, $email, $cpf, $datanascimento, $genero, $cep, $end, $num, $complemento, $bairro, $cidade, $estado, $limit)){
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
