<?php
if (!isset($_SESSION)) {
	session_start();
}
require_once 'conexao.php';
## Registrar Cliente
function registrarUsuario($nome, $sobrenome, $email, $cpf, $datanascimento, $genero, $senha, $cep, $end, $num, $complemento, $bairro, $cidade, $estado, $telefone, $interesse){
	date_default_timezone_set('America/Sao_Paulo');
	$datanascimento = implode('-',array_reverse(explode('/',$datanascimento)));
	## FILTROS
	$conexao = getConnection();
	$nome = filtrarString($nome);
	$sobrenome = filtrarString($sobrenome);
	$email = filtrarEmail($email);
	$cpf = mysqli_escape_string($conexao, $cpf);
	$cpf = htmlspecialchars($cpf);
	$genero = filtrarInt($genero);
	$cep = filtrarInt($cep);
	$end = filtrarString($end);
	$num = filtrarInt($num);
	$complemento = filtrarString($complemento);
	$bairro = filtrarString($bairro);
	$cidade = filtrarString($cidade);
	$estado = filtrarString($estado);
	$sql = "INSERT INTO usuarios VALUES (NULL, '$nome', '$sobrenome', '$email', '$cpf', '$datanascimento', 1, md5('$senha'), 1 , $genero)";
	$resultado = mysqli_query($conexao, $sql);
	$id = mysqli_insert_id($conexao);
	$sql = "INSERT INTO endereco VALUES (NULL, '$cep', '$end', '$num', '$complemento', '$bairro', '$estado', '$cidade', $id, 4)";
	$resultado = mysqli_query($conexao, $sql);
	$sql = "INSERT INTO telefone VALUES (NULL, $telefone, $id, 1)";
	$resultado = mysqli_query($conexao, $sql);
	$sql = "INSERT INTO interesses VALUES";
	$sql .= " ($id, $i)";
	if(sizeof($interesse) > 1) {
		foreach ($interesse as $i) {
			$sql .= ", ($id, $i)";
		}
	}
	$resultado = mysqli_query($conexao, $sql);
	if (mysqli_affected_rows($conexao) >= 1) {
		return header('location: ../../entrar');
	} else {
		return "Falha ao registrar";
	}
}
############### Logar Usuário ################
function logarUsuario($email, $senha){
	$conexao = getConnection();
	$email = mysqli_escape_string($conexao, $email);
	$senha = mysqli_escape_string($conexao, $senha);
	$sql = "SELECT nome, email, id FROM usuarios where email = '$email' and senha = md5('$senha') and ativo = 1";
	$resultado = mysqli_query($conexao, $sql);
	## Caso tenha achado algum usuário com esse email e senha, pegue os dados e guarde na sessão
	if (mysqli_affected_rows($conexao) >= 1) {
		$_SESSION['user'] = mysqli_fetch_assoc($resultado);
		$_SESSION['user_id'] = $_SESSION['user']['id'];
		## Se esse usuário, quando deslogado estiver com algum item no carrinho, coloque no banco de dados
		if (isset($_SESSION['produto'])){
			$carrinho = $_SESSION['produto'];
			$idUsuario = $_SESSION['user_id'];
			$sql = "SELECT * from itens_reservados where usuarios_id = $idUsuario";
			$resultado = mysqli_query($conexao, $sql);
			$itensreservados = array();
			while ($linha = mysqli_fetch_assoc($resultado)){
				array_push($itensreservados, $linha);
			}
			foreach ($itensreservados as $i) {
				## Apagar os itens que estão no carrinho e aumentar o estoque ##
				## Aumentar o estoque
				$qtd = $i['quantidade'];
				$prodId = $i['produto_id'];
				$sql = "UPDATE produto set quantidade = quantidade + $qtd where id = $prodId";
				$resultado = mysqli_query($conexao, $sql);
			}
			## Apagar o carrinho
			$sql = "DELETE FROM itens_reservados where usuarios_id = $idUsuario";
			$resultado = mysqli_query($conexao, $sql);
			$cont = 1;
			foreach ($carrinho as $b => $i) {
				$qtd = $i['qtd'];
				$sql = "INSERT INTO itens_reservados VALUES";
				if (count($carrinho) == $cont){
					$sql .= " ($idUsuario, $b, $qtd)";
				} else {
					$cont++;
					$sql .= " ($idUsuario, $b, $qtd),";
				}
			}
			$resultado = mysqli_query($conexao, $sql);
			foreach ($carrinho as $i) {
				$sql = "UPDATE produto set quantidade = quantidade - $qtd where id = $b";
				$resultado = mysqli_query($conexao, $sql);
			}
		} // Fim do if caso a pessoa tenha itens no carrinho.
		return true;
	} else {
		return "Falha ao logar";
	}
}
## Editar informações do cliente
function editarInformacoes($nome, $sobrenome, $email, $cpf, $datanascimento, $genero, $senha, $id, $telefone){
	$conexao = getConnection();
	date_default_timezone_set('America/Sao_Paulo');
	$datanascimento = implode('-',array_reverse(explode('/',$datanascimento)));
	$nome = filtrarString($nome);
	$sobrenome = filtrarString($sobrenome);
	$email = filtrarEmail($email);
	$cpf = mysqli_escape_string($conexao, $cpf);
	$cpf = htmlspecialchars($cpf);
	$genero = filtrarInt($genero);
	$sql = "UPDATE usuarios SET nome = '$nome', sobrenome = '$sobrenome', email = '$email', cpf = '$cpf', datanascimento = '$datanascimento', senha = md5('$senha') where id = $id";
	$resultado = mysqli_query($conexao, $sql);
	echo $sql;

	if (mysqli_affected_rows($conexao) >= 1) {
		return true;
	} else {
		return "<script>alert('Falha ao editar informações')</script>";
	}
}
## Perfil do usuário
function listarUsuario($limit, $id, $admin){
	$conexao = getConnection();
	# Select do perfil do usuário
	$sql = "SELECT
	usu.id,
	usu.nome,
	usu.sobrenome,
	usu.email,
	usu.cpf,
	usu.ativo,
	usu.datanascimento,
	ge.genero,
	usu.perfil_id,
	tel.numero as telefone

	from usuarios usu
	inner join genero ge on ge.id = usu.genero_id
	inner join perfil per on per.id = usu.perfil_id
	inner join telefone tel on usu.id = tel.usuarios_id";
	if ($limit != NULL) {
		$sql .= " LIMIT $limit";
	}
	if ($id != NULL){
		$sql .= " WHERE usu.id = $id";
	}
	if ($admin != NULL){
		$idUsuario = $_SESSION['user_id'];
		$sql .= " WHERE usu.id != $idUsuario";
	}
	$resultado = mysqli_query($conexao, $sql);
	if (mysqli_affected_rows($conexao) >= 1) {
		while ($linha = mysqli_fetch_assoc($resultado)){
			$arr[] = $linha;
		}
		$a = $arr[0]['datanascimento'];
		$a = date('d/m/Y', strtotime($a));
		$arr[0]['datanascimento'] = $a;
		return $arr;
	}
	############################ Filtros para o cadastro ##########################
}
function filtrarEmail($var){
	$conexao = getConnection();
	$var = mysqli_escape_string($conexao, $var);
	$var = filter_var($var, FILTER_SANITIZE_EMAIL);
	return $var;
}
function filtrarString($var){
	$conexao = getConnection();
	$var = mysqli_escape_string($conexao, $var);
	$var = filter_var($var, FILTER_SANITIZE_STRING);
	return $var;
}
function filtrarInt($var){
	return filter_var($var, FILTER_SANITIZE_NUMBER_INT);
}
########################## Cadastro de admin ############################

function registrarAdmin($nome, $sobrenome, $email, $cpf, $datanascimento, $genero, $senha, $cep, $end, $num, $complemento, $bairro, $cidade, $estado){
	date_default_timezone_set('America/Sao_Paulo');
	$datanascimento = implode('-',array_reverse(explode('/',$datanascimento)));
	$conexao = getConnection();
	$nome = filtrarString($nome);
	$sobrenome = filtrarString($sobrenome);
	$email = filtrarEmail($email);
	$cpf = mysqli_escape_string($conexao, $cpf);
	$cpf = htmlspecialchars($cpf);
	$genero = filtrarInt($genero);
	$cep = filtrarInt($cep);
	$end = filtrarString($end);
	$num = filtrarInt($num);
	$complemento = filtrarString($complemento);
	$bairro = filtrarString($bairro);
	$cidade = filtrarString($cidade);
	$estado = filtrarString($estado);
	$sql = "INSERT INTO usuarios VALUES (NULL, '$nome', '$sobrenome', '$email', '$cpf', '$datanascimento', 1, md5('$senha'), 2 , $genero, 1)";
	$resultado = mysqli_query($conexao, $sql);
	$id = mysqli_insert_id($conexao);
	$sql = "INSERT INTO endereco VALUES (NULL, '$cep', '$end', '$num', '$complemento', '$bairro', '$estado', '$cidade', $id, 1)";
	$resultado = mysqli_query($conexao, $sql);
	if (mysqli_affected_rows($conexao) >= 1) {
		return true;
	} else {
		return "Falha ao exibir informações";
	}
}
function checarCPF($cpf){
	$conexao = getConnection();
	$cpf = mysqli_escape_string($conexao, $cpf);
	$cpf = htmlspecialchars($cpf);
	$sql = "SELECT cpf from usuarios where cpf = '$cpf'";
	$resultado = mysqli_query($conexao, $sql);
	if (mysqli_affected_rows($conexao) >= 1) {
		return 1;
	} else {
		return "não_cadastrado";
	}
}
function loginUsuarioAdmin($email, $senha){
	$conexao = getConnection();
	$email = mysqli_escape_string($conexao, $email);
	$senha = mysqli_escape_string($conexao, $senha);
	$sql = "SELECT nome, email, id FROM usuarios where email = '$email' and senha = md5('$senha') and perfil_id = 2 and ativo = 1";
	$resultado = mysqli_query($conexao, $sql);
	if (mysqli_affected_rows($conexao) >= 1) {
		$_SESSION['user'] = mysqli_fetch_assoc($resultado);
		$_SESSION['user_id'] = $_SESSION['user']['id'];
		return true;
	} else {
		return header('location: ../../adm/adm.php');
	}
}
function inserirItemDesejado($usuarioID, $produtoID){
	$conexao = getConnection();
	$sql = "INSERT INTO desejados VALUES ($usuarioID, $produtoID)";
	if (mysqli_query($conexao, $sql)){
		return true;
	} else {
		return false;
	}
}
function listarItemDesejado(){
	$conexao = getConnection();
	$sql = "SELECT prod.titulo, prod.autor, prod.preco from desejados d inner join produto prod on prod.id = d.produto_id;";
	$resultado = mysqli_query($conexao, $sql);
	if (mysqli_affected_rows($conexao) >= 1){
		$item = array();
		while ($linha = mysqli_fetch_assoc($resultado)){
			array_push($item, $linha);
		}
		return $item;
	} else {
		return false;
	}
}
function listarCategoria(){
	$conexao = getConnection();
	$sql = "SELECT * FROM categoria";
	$resultado = mysqli_query($conexao, $sql);
	if (mysqli_affected_rows($conexao) >= 1){
		$categoria = array();
		while ($linha = mysqli_fetch_assoc($resultado)){
			array_push($categoria, $linha);
		}
		return $categoria;
	} else {
		return false;
	}
}
function listarEndereco($idUsuario, $tipoend){
	$conexao = getConnection();
	$sql = "SELECT end.*, tp.tipo, tp.id as endId from endereco end inner join tipoendereco tp on tp.id = end.TipoEndereco_id where end.usuarios_id = $idUsuario and tp.id = $tipoend";
	$resultado = mysqli_query($conexao, $sql);
	if (mysqli_affected_rows($conexao) >= 1){
		$endereco = array();
		while ($linha = mysqli_fetch_assoc($resultado)){
			array_push($endereco, $linha);
		}
		return $endereco;
	} else {
		return false;
	}
}
function editarEndereco($cep, $end, $num, $complemento, $bairro, $cidade, $estado, $id, $destinatario, $tipoend){
	$conexao = getConnection();
	$cep = filtrarInt($cep);
	$end = filtrarString($end);
	$num = filtrarInt($num);
	$complemento = filtrarString($complemento);
	$bairro = filtrarString($bairro);
	$cidade = filtrarString($cidade);
	$estado = filtrarString($estado);
	$sql = "UPDATE endereco SET cep = '$cep', endereco = '$end', numero = '$num', complemento = '$complemento',
	bairro = '$bairro', cidade = '$cidade', estado = '$estado', destinatario = '$destinatario' where TipoEndereco_id = $tipoend";
	echo $sql;
	if (mysqli_query($conexao, $sql)){
		return true;
	} else {
		return false;
	}
}
function listarSubcategoria(){
	$conexao = getConnection();
	$sql = "SELECT * FROM subcategorias";
	$resultado = mysqli_query($conexao, $sql);
	if (mysqli_affected_rows($conexao) >= 1){
		$subcategorias = array();
		while ($linha = mysqli_fetch_assoc($resultado)){
			array_push($subcategorias, $linha);
		}
		return $subcategorias;
	} else {
		return false;
	}
}
function listarCapa(){
	$conexao = getConnection();
	$sql = "SELECT * FROM tipodecapa";
	$resultado = mysqli_query($conexao, $sql);
	if (mysqli_affected_rows($conexao) >= 1){
		$capa = array();
		while ($linha = mysqli_fetch_assoc($resultado)){
			array_push($capa, $linha);
		}
		return $capa;
	} else {
		return false;
	}
}
function listarIdioma(){
	$conexao = getConnection();
	$sql = "SELECT * FROM idioma";
	$resultado = mysqli_query($conexao, $sql);
	if (mysqli_affected_rows($conexao) >= 1){
		$idioma = array();
		while ($linha = mysqli_fetch_assoc($resultado)){
			array_push($idioma, $linha);
		}
		return $idioma;
	} else {
		return false;
	}
}
function listarFornecedor(){
	$conexao = getConnection();
	$sql = "SELECT * FROM fornecedores";
	$resultado = mysqli_query($conexao, $sql);
	if (mysqli_affected_rows($conexao) >= 1){
		$fornecedores = array();
		while ($linha = mysqli_fetch_assoc($resultado)){
			array_push($fornecedores, $linha);
		}
		return $fornecedores;
	} else {
		return false;
	}
}
function inserirEndereço($cep, $end, $num, $complemento, $bairro, $cidade, $estado, $destinatario, $tipoend){
	$conexao = getConnection();
	$destinatario = filtrarString($destinatario);
	$cep = filtrarInt($cep);
	$end = filtrarString($end);
	$num = filtrarInt($num);
	$complemento = filtrarString($complemento);
	$bairro = filtrarString($bairro);
	$cidade = filtrarString($cidade);
	$estado = filtrarString($estado);
	$id = $_SESSION['user_id'];
	$sql = "INSERT INTO endereco VALUES (NULL, '$cep', '$end', '$num', '$complemento', '$bairro', '$estado', '$cidade', $id, $tipoend, '$destinatario')";
	echo $sql;
	$resultado = mysqli_query($conexao, $sql);
	if (mysqli_affected_rows($conexao) >= 1) {
		return true;
	} else {
		return "Falha ao exibir informações";
	}
}
function excluirFornecedor($id){
	$conexao = getConnection();
	$sql = "DELETE FROM fornecedores where id = $id";
	$resultado = mysqli_query($conexao, $sql);
	if (mysqli_affected_rows($conexao) >= 1) {
		return true;
	} else {
		return "Falha ao excluir o fornecedor";
	}
}
function listarStatusCompra(){
	$conexao = getConnection();
	$sql = "SELECT * FROM status_compra";
	$resultado = mysqli_query($conexao, $sql);
	if (mysqli_affected_rows($conexao) >= 1){
		$status = array();
		while ($linha = mysqli_fetch_assoc($resultado)){
			array_push($status, $linha);
		}
		return $status;
	} else {
		return false;
	}
}
function listarStatusEntrega(){
	$conexao = getConnection();
	$sql = "SELECT * FROM status_entrega";
	$resultado = mysqli_query($conexao, $sql);
	if (mysqli_affected_rows($conexao) >= 1){
		$status = array();
		while ($linha = mysqli_fetch_assoc($resultado)){
			array_push($status, $linha);
		}
		return $status;
	} else {
		return false;
	}
}
function editarFornecedor($nome, $razao_social, $cnpj, $endereco, $telefone, $email, $formap, $id){
	$conexao = getConnection();
	$sql = "UPDATE fornecedores SET nome = '$nome', razao_social = '$razao_social', cnpj = '$cnpj', endereco = '$endereco',
	telefone = '$telefone', email = '$email', forma_pagamento = '$formap' where id = $id";
	$resultado = mysqli_query($conexao, $sql);
	if (mysqli_affected_rows($conexao) >= 1) {
		return true;
	} else {
		return "Falha ao editar o fornecedor";
	}
}
function listarComprasRealizadas(){
	$conexao = getConnection();
	$sql = "create or replace view vw_compras_realizadas as

	select

	usu.nome,
	usu.cpf,
	prod.titulo,
	prod.autor,
	prod.editora,
	'LV'|| ped.id as numero_pedido,
	ped.data_pedido,
	itped.quantidade,
	itped.preco


	from usuarios usu
	inner join pedidos ped on ped.usuarios_id = usu.id
	inner join itens_pedido itped on itped.pedidos_id = ped.id
	inner join produto prod on prod.id = itped.produto_id;";
	$resultado = mysqli_query($conexao, $sql);
	if (mysqli_affected_rows($conexao) >= 1){
		$compra = array();
		while ($linha = mysqli_fetch_assoc($resultado)){
			array_push($compra, $linha);
		}
		return $compra;
	} else {
		return false;
	}
}
function inserirFornecedor($nome, $razao_social, $cnpj, $endereco, $telefone, $email, $formap){
	$conexao = getConnection();
	$sql = "INSERT INTO fornecedores VALUES (NULL, '$nome', '$razao_social', '$cnpj', NULL, '$endereco', '$telefone', '$email', '$formap')";
	$resultado = mysqli_query($conexao, $sql);
	if (mysqli_affected_rows($conexao) >= 1) {
		return true;
	} else {
		return "Falha ao exibir informações";
	}
}
function pesquisarFornecedor($n){
	$conexao = getConnection();
	$sql = "SELECT * FROM fornecedores";
	$sql .= " WHERE (nome like '%$n%' or razao_social like '%$n%' or endereco like '%$n%' or telefone like '%$n%' or email like '%$n%' or forma_pagamento like '%$n%')";
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
function listarClienteId(){
	$conexao = getConnection();
	$sql = "SELECT * from perfil";
	$resultado = mysqli_query($conexao, $sql);
	if (mysqli_affected_rows($conexao) >= 1) {
		$arr = array();
		## Botar o resultado dentro de um array e retornar
		while ($linha = mysqli_fetch_assoc($resultado)){
			array_push($arr, $linha);
		}
		return $arr;
	}
}
function pesquisarCliente($n){
	$conexao = getConnection();
	$sql = "SELECT * FROM usuarios";
	$sql .= " WHERE (nome like '%$n%' or email like '%$n%' or cpf like '%$n%')";
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
	function editaStatusPerfil($perfil, $id){
		$conexao = getConnection();
		$sql = "UPDATE usuarios SET perfil_id = $perfil where id = $id";
		$resultado = mysqli_query($conexao, $sql);
		if (mysqli_affected_rows($conexao) >= 1) {
			return true;
		} else {
			return "Falha ao editar o fornecedor";
		}
	}
	function editaStatusAtivo($ativo, $id){
			$conexao = getConnection();
			$sql = "UPDATE usuarios SET ativo = $ativo where id = $id";
			$resultado = mysqli_query($conexao, $sql);
			if (mysqli_affected_rows($conexao) >= 1) {
				return true;
			} else {
				return "Falha ao editar o fornecedor";
			}
		}
