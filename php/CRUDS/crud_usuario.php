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
	$sql = "INSERT INTO endereco VALUES (NULL, '$cep', '$end', '$num', '$complemento', '$bairro', '$estado', '$cidade', $id, 1)";
	$resultado = mysqli_query($conexao, $sql);
	$sql = "INSERT INTO telefone VALUES (NULL, $telefone, $id, 1)";
	$resultado = mysqli_query($conexao, $sql);
	$sql = "INSERT INTO interesses VALUES";
	$cont = 1;
	foreach ($interesse as $i) {
		if (count($interesse) == $cont){
		$sql .= " ($id, $i)";
	} else {
		$cont++;
		$sql .= " ($id, $i),";
	}
	}
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
	## Caso tenha achado algum usuário com esse email e senha, pegue os dados e guarde na sessão
	if (mysqli_affected_rows($conexao) >= 1) {
		$_SESSION['user'] = mysqli_fetch_assoc($resultado);
		$_SESSION['user_id'] = $_SESSION['user']['id'];
		## Se esse usuário, quando deslogado estiver com algum item no carrinho, coloque no banco de dados
		if (isset($_SESSION['produto'])){
			$carrinho = $_SESSION['produto'];
			$idUsuario = $_SESSION['user_id'];
			## Foreach para colocar todos os produtos para o banco de dados
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
				## Se o insert não for, quer dizer que o item já está no banco, então faça o update.
					#################### FAZER NA PROCEDURE #######################
				/*if (mysqli_affected_rows($conexao) <= 1){
					$sql = "UPDATE itens_reservados SET quantidade = quantidade + $qtd where produto_id = $b";
					$resultado = mysqli_query($conexao, $sql);
				}*/
				## Abaixar o número no estoque
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
function listarUsuario($limit, $id){
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
ender.endereco,
ender.numero,
ender.complemento,
ender.bairro,
ender.cidade,
ender.estado,
ender.cep,
tel.numero as telefone,
tipoend.tipo as tipo_endereco,
cat.categoria as interesses

from usuarios usu
inner join genero ge on ge.id = usu.genero_id
inner join perfil per on per.id = usu.perfil_id
inner join telefone tel on usu.id = tel.usuarios_id
left join endereco ender on ender.usuarios_id = usu.id
left join tipoendereco tipoend	on tipoend.id = ender.tipoendereco_id
left join interesses inte on inte.usuarios_id = usu.id
left join categoria cat on cat.id = inte.categoria_id";
if ($limit != NULL) {
	$sql .= " LIMIT $limit";
}
if ($id != NULL){
	$sql .= " WHERE usu.id = $id";
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
