<?php
session_start();
require_once 'conexao.php';
function registrarUsuario($nome, $sobrenome, $email, $cpf, $datanascimento, $genero, $senha, $cep, $end, $num, $complemento, $bairro, $cidade, $estado){
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
	$sql = "INSERT INTO usuarios VALUES (NULL, '$nome', '$sobrenome', '$email', '$cpf', '$datanascimento', 1, md5('$senha'), 1 , $genero, 1)";
	$resultado = mysqli_query($conexao, $sql);
	$id = mysqli_insert_id($conexao);
	$sql = "INSERT INTO endereco VALUES (NULL, '$cep', '$end', '$num', '$complemento', '$bairro', '$estado', '$cidade', $id, 1)";
	$resultado = mysqli_query($conexao, $sql);
	if (mysqli_affected_rows($conexao) >= 1) {
		return true;
	} else {
		return false;
	}
}
function logarUsuario($email, $senha){
	$conexao = getConnection();
	$email = mysqli_escape_string($conexao, $email);
	$senha = mysqli_escape_string($conexao, $senha);
	$sql = "SELECT nome, email, id FROM usuarios where email = '$email' and senha = md5('$senha')";
	$resultado = mysqli_query($conexao, $sql);
	if (mysqli_affected_rows($conexao) >= 1) {
		$_SESSION['user'] = mysqli_fetch_assoc($resultado);
		$_SESSION['user_id'] = $_SESSION['user']['id'];
		return true;
	} else {
		return false;
	}

}
function editarInformacoes($nome, $sobrenome, $email, $cpf, $datanascimento, $genero, $senha, $cep, $end, $num, $complemento, $bairro, $cidade, $estado, $id){
	$conexao = getConnection();
	date_default_timezone_set('America/Sao_Paulo');
	$datanascimento = implode('-',array_reverse(explode('/',$datanascimento)));));
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
	$sql = "UPDATE usuarios SET nome = '$nome', sobrenome = '$sobrenome', email = '$email', cpf = '$cpf, datanascimento = $datanascimento, senha = md5('$senha') where id = $id";
	$resultado = mysqli_query($conexao, $sql);
	$sql = "UPDATE endereco SET cep = '$cep', endereco = '$end', numero = '$num', complemento = '$complemento', bairro = '$bairro', estado = '$estado', cidade = '$cidade' where usuarios_id = $id";
	$resultado = mysqli_query($conexao, $sql);
	if (mysqli_affected_rows($conexao) >= 1) {
		return true;
	} else {
		return false;
	}
}
function listarUsuario($nome, $sobrenome, $email, $cpf, $datanascimento, $genero, $cep, $end, $num, $complemento, $bairro, $cidade, $estado, $limit){
	$conexao = getConnection();
	# Select do perfil do usuário
	$sql = "SELECT

usu.nome,
usu.sobrenome,
usu.email,
usu.cpf,
usu.datanascimento,
per.perfil,
ge.genero,
tel.numero as numero,
tipotel.tipo as tipo_telefone,
logs.datahora as ultimo_login,
ender.endereco,
ender.numero,
ender.complemento,
ender.bairro,
ender.cidade,
ender.estado,
ender.cep,
tipoend.tipo as tipo_endereco,
cat.categoria as interesses

from usuarios usu
inner join genero ge on ge.id = usu.genero_id
inner join perfil per on per.id = usu.perfil_id
left join telefone tel on tel.usuarios_id = usu.id
left join tipotelefone tipotel on tipotel.telefone_id = tel.id
left join login logs  on logs.id = usu.login_id
left join endereco ender on ender.usuarios_id = usu.id
left join tipoendereco tipoend	on tipoend.id = ender.tipoendereco_id
left join interesses inte on inte.usuarios_id = usu.id
left join categoria cat on cat.id = inte.categoria_id;";
if ($limit != NULL) {
	$sql .= " LIMIT $limit";
}
$resultado = mysqli_query($conexao, $sql);
if (mysqli_affected_rows($conexao) >= 1) {
	while ($linha = mysqli_fetch_assoc($resultado)){
		$arr[] = $linha;
	}
	return $arr;
}
}
function filtrarEmail($var){
	return filter_var($var, FILTER_SANITIZE_EMAIL);
}
function filtrarString($var){
	return filter_var($var, FILTER_SANITIZE_STRING);
}
function filtrarInt($var){
	return filter_var($var, FILTER_SANITIZE_NUMBER_INT);
}
