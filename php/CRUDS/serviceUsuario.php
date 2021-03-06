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
	function serviceListarUsu($limit, $id, $admin){
		if ($user = listarUsuario($limit, $id, $admin)){
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
	function serviceExcluirItemDesejado($produtoID){
		if ($user = excluirItemDEsejado($produtoID)){
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
	function serviceListarFornecedor($id){
		if ($user = listarFornecedor($id)){
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
	function serviceExcluirFornecedor($id){
		if ($user = excluirFornecedor($id)){
			return $user;
		}
	}
	function serviceListarStatusCompra(){
		if ($pedido = listarStatusCompra()){
			return $pedido;
		}
	}
	function serviceListarStatusEntrega(){
		if ($pedido = listarStatusEntrega()){
			return $pedido;
		}
	}
	function serviceEditarFornecedor($nome, $razao_social, $cnpj, $endereco, $telefone, $email, $formap, $id){
		if ($fornecedor = editarFornecedor($nome, $razao_social, $cnpj, $endereco, $telefone, $email, $formap, $id)){
			return $fornecedor;
		}
	}
	function serviceListarComprasRealizadas(){
		if ($compra = listarComprasRealizadas()){
			return $compra;
		}
	}
	function serviceInserirFornecedor($nome, $razao_social, $cnpj, $endereco, $telefone, $email, $formap){
		if ($fornecedor = inserirFornecedor($nome, $razao_social, $cnpj, $endereco, $telefone, $email, $formap)){
			return $fornecedor;
		}
	}
	function servicePesquisarFornecedor($n){
		if ($fornecedor = pesquisarFornecedor($n)) {
			return $fornecedor;
		}
	}
	function serviceListarClienteId(){
		if ($cliente = listarClienteId()) {
			return $cliente;
		}
	}
	function servicePesquisarCliente($n){
		if ($cliente = pesquisarCliente($n)) {
			return $cliente;
		}
	}
	function serviceEditaStatusPerfil($perfil, $id){
		if ($cliente = editaStatusPerfil($perfil, $id)) {
			return $cliente;
		}
	}
	function serviceEditaStatusAtivo($ativo, $id){
		if ($cliente = editaStatusAtivo($ativo, $id)) {
			return $cliente;
		}
	}
	function precoBR($var){
		$var = number_format($var, 2, ',', '.');
		return $var;
	}
	function precoBanco($var){
		$var = number_format($var, 2, '.', ',');
		return $var;
	}
	function serviceStringToFloat($var){
		if ($number = stringToFloat($var)) {
			return $number;
		}
	}
