<?php
session_start();
require_once 'conexao.php';
## Registrar Cliente
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
	$sql = "INSERT INTO usuarios VALUES (NULL, '$nome', '$sobrenome', '$email', '$cpf', '$datanascimento', 1, md5('$senha'), 1 , $genero)";
	$resultado = mysqli_query($conexao, $sql);
	$id = mysqli_insert_id($conexao);
	$sql = "INSERT INTO endereco VALUES (NULL, '$cep', '$end', '$num', '$complemento', '$bairro', '$estado', '$cidade', $id, 1)";
	$resultado = mysqli_query($conexao, $sql);
	if (mysqli_affected_rows($conexao) >= 1) {
		return header('location: ../../entrar');
	} else {
		return "Falha ao registrar";
	}
}
## Logar Usuário
function logarUsuario($email, $senha){
	$conexao = getConnection();
	$email = mysqli_escape_string($conexao, $email);
	$senha = mysqli_escape_string($conexao, $senha);
	$sql = "SELECT nome, email, id FROM usuarios where email = '$email' and senha = md5('$senha')";
	$resultado = mysqli_query($conexao, $sql);
	## Caso tenha achado algum resultado, pegue os dados e guarde na sessão
	if (mysqli_affected_rows($conexao) >= 1) {
		$_SESSION['user'] = mysqli_fetch_assoc($resultado);
		$_SESSION['user_id'] = $_SESSION['user']['id'];
		## Caso tenha algum produto no carrinho quando o usuário logar, jogue para o banco de dados
		if (isset($_SESSION['produto'])){
			$carrinho = $_SESSION['produto'];
			$idUsuario = $_SESSION['user_id'];
			## Foreach para jogar todos os produtos para o banco de dados
			foreach ($carrinho as $b => $i) {
				$qtd = $i['qtd'];
				$sql = "INSERT INTO itens_reservados VALUES ($idUsuario, $b, $qtd)";
				$resultado = mysqli_query($conexao, $sql);
				## Se não conseguir dar insert, o produto já está no banco. Realizar o update na tabela do carrinho
				if (mysqli_affected_rows($conexao) <= 1){
					$sql = "UPDATE itens_reservados SET quantidade = quantidade + $qtd where produto_id = $b";
					$resultado = mysqli_query($conexao, $sql);
				}
				$sql = "UPDATE produto set quantidade = quantidade - $qtd where id = $b";
				$resultado = mysqli_query($conexao, $sql);
			}
		}
		return true;
	} else {
		return "Falha ao logar";
	}

}
## Editar informações do cliente
function editarInformacoes($nome, $sobrenome, $email, $cpf, $datanascimento, $genero, $senha, $cep, $end, $num, $complemento, $bairro, $cidade, $estado, $id){
	$conexao = getConnection();
	date_default_timezone_set('America/Sao_Paulo');
	$datanascimento = implode('-',array_reverse(explode('/',$datanascimento)));
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
	$sql = "UPDATE usuarios SET nome = '$nome', sobrenome = '$sobrenome', email = '$email', cpf = '$cpf', datanascimento = '$datanascimento', senha = md5('$senha') where id = $id";
	$resultado = mysqli_query($conexao, $sql);
	$sql = "UPDATE endereco SET cep = '$cep', endereco = '$end', numero = '$num', complemento = '$complemento', bairro = '$bairro', estado = '$estado', cidade = '$cidade' where usuarios_id = $id";
	$resultado = mysqli_query($conexao, $sql);
	if (mysqli_affected_rows($conexao) >= 1) {
		return true;
	} else {
		return "<script>alert('Falha ao editar informações')</script>";
	}
}
## Perfil do usuário
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
## Filtros para o cadastro
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
## Cadastro de admin

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
