<?php
require_once 'conexao.php';
function registrarUsuario($nome, $sobrenome, $email, $cpf, $datanascimento, $genero, $senha, $cep, $end, $num, $complemento, $bairro, $cidade, $estado){
	$datanascimento = date('Y-m-d', strtotime($datanascimento));
	$conexao = getConnection();
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
	$sql = "SELECT nome, email, id FROM usuarios where email = '$email' and senha = md5('$senha')";
	$resultado = mysqli_query($conexao, $sql);
	if (mysqli_affected_rows($conexao) >= 1) {
		return mysqli_fetch_assoc($resultado);
	} else {
		return false;
	}

}
function editarInformacoes($nome, $sobrenome, $email, $cpf, $datanascimento, $genero, $senha, $cep, $end, $num, $complemento, $bairro, $cidade, $estado, $id){
	$conexao = getConnection();
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
left join categoria cat on cat.id = inte.categoria_id;"
if (isset($limit)) {
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
