<?php
require_once 'crud_usuario.php';
	function serviceLogin($email, $senha){
		if ($user = logarUsuario($email, $senha)){
			return $user;
		}
	}

	function serviceRegistro($nome, $sobrenome, $email, $cpf, $datanascimento, $genero, $senha, $cep, $end, $num, $complemento, $bairro, $cidade, $estado, $telefone, $interesse){
		if ($user = registrarUsuario($nome, $sobrenome, $email, $cpf, $datanascimento, $genero, $senha, $cep, $end, $num, $complemento, $bairro, $cidade, $estado, $telefone, $interesse)){
			return $user;
		}
	}
	function serviceEditarUsuario($nome, $sobrenome, $email, $cpf, $datanascimento, $genero, $senha, $id, $telefone){
		if ($user = editarInformacoes($nome, $sobrenome, $email, $cpf, $datanascimento, $genero, $senha, $id, $telefone)){
			return $user;
		}
	}
	function serviceListarUsu($limit, $id){
		if ($user = listarUsuario($limit, $id)){
			return $user;
		}
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
	function serviceListarCategoria(){
		if ($user = listarCategoria()){
			return $user;
		}
	}
	function serviceListarCapa(){
		if ($user = listarCapa()){
			return $user;
		}
	}
	function serviceListarSubcategoria(){
		if ($user = listarSubcategoria()){
			return $user;
		}
	}
	function serviceListarIdioma(){
		if ($user = listarIdioma()){
			return $user;
		}
	}
	function serviceListarFornecedor(){
		if ($user = listarFornecedor()){
			return $user;
		}
	}
	function serviceListarEndereco($idUsuario, $tipoend){
		if ($user = listarEndereco($idUsuario, $tipoend)){
			return $user;
		}
	}
	function serviceInserirEndereço($cep, $end, $num, $complemento, $bairro, $cidade, $estado, $destinatario, $tipoend){
		if ($user = inserirEndereço($cep, $end, $num, $complemento, $bairro, $cidade, $estado, $destinatario, $tipoend)){
			return $user;
		}
	}
	function serviceEditarEndereco($cep, $end, $num, $complemento, $bairro, $cidade, $estado, $id, $destinatario, $tipoend){
		if ($user = editarEndereco($cep, $end, $num, $complemento, $bairro, $cidade, $estado, $id, $destinatario, $tipoend)){
			return $user;
		}
	}
