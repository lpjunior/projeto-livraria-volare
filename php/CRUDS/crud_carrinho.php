<?php
if (!isset($_SESSION)) {
	session_start();
}
require_once 'conexao.php';
# Inserir nos produtos reservados
function inserirCarrinho($user_id, $id, $quant){
	$conexao = getConnection();
  $sql = "INSERT INTO itens_reservados values ($user_id, $id, $quant)";
  $resultado = mysqli_query($conexao, $sql);
	$sql = "UPDATE produto set quantidade = quantidade - $quant where id = $id";
	$resultado = mysqli_query($conexao, $sql);
	if (mysqli_affected_rows($conexao) >= 1) {
		return true;
	} else {
		return "Falha ao adicionar ao carrinho";
	}
}
# Aumentar o número de produtos reservados
function updateAdd($quant, $id){
  $conexao = getConnection();
  $sql = "update itens_reservados set quantidade = quantidade + $quant where produto_id = $id";
  $resultado = mysqli_query($conexao, $sql);
  $sql = "update produto set quantidade = quantidade - $quant where id = $id";
  $resultado = mysqli_query($conexao, $sql);
  if (mysqli_affected_rows($conexao) >= 1) {
		return true;
	} else {
		return 'Falha em botar produtos no carrinho';
	}
}
# Deletar os produto reservados
function deleteCarrinho($quant_total, $id){
  $conexao = getConnection();
  $sql = "update produto set quantidade = quantidade + $quant_total where id = $id";
  $resultado = mysqli_query($conexao, $sql);
  $sql = "DELETE FROM itens_reservados where produto_id = $id";
  $resultado = mysqli_query($conexao, $sql);
  if (mysqli_affected_rows($conexao) >= 1) {
		return true;
	} else {
		return "Falha em deletar o carrinho";
	}
}
# Alterar o número de produto reservados
function updateAlt($qtd, $id, $quant_total){
	$conexao = getConnection();
  $sql = "update itens_reservados set quantidade = $qtd where produto_id = $id";
  $resultado = mysqli_query($conexao, $sql);
  $sql = "update produto set quantidade = quantidade + $quant_total - $qtd where id = $id";
  $resultado = mysqli_query($conexao, $sql);
  if (mysqli_affected_rows($conexao) >= 1) {
		return true;
	} else {
		return 'Falha ao alterar o número de itens do carrinho';
	}
}
function listarCarrinho($id){
  $conexao = getConnection();
  $sql = "SELECT prod.id, prod.peso, usu.nome, prod.titulo, itres.quantidade, prod.preco from usuarios usu
  inner join itens_reservados itres on itres.usuarios_id = usu.id
  inner join produto prod on prod.id = itres.produto_id
	where itres.usuarios_id = $id";
  $resultado = mysqli_query($conexao, $sql);
	$arr = NULL;
  if (mysqli_affected_rows($conexao) >= 1) {
		while ($linha = mysqli_fetch_assoc($resultado)){
			$arr[] = $linha;
		}
		return $arr;
	} else {
		return "Falha ao listar o carrinho";
	}
}
function listarLivroCarrinho($id){
	$conexao = getConnection();
	$sql = "SELECT titulo, preco from produto WHERE id = $id";
	$resultado = mysqli_query($conexao, $sql);
	$arr = array();
	if (mysqli_affected_rows($conexao) >= 1) {
		while ($linha = mysqli_fetch_assoc($resultado)){
			array_push($arr, $linha);
		}
		return $arr;
	} else {
		return "Falha ao listar o carrinho";
	}
}
