<?php
if (!isset($_SESSION)) {
  session_start();
}
require_once 'conexao.php';
require_once 'serviceCarrinho.php';
listarCheckout(4, 1);
function listarCheckout($id, $qtd){
  $conexao = getConnection();
  $sql = "SELECT
  prod.titulo,
  itres.quantidade,
  usu.nome,
  usu.sobrenome,
  ender.endereco,
  ender.numero,
  ender.complemento,
  ender.bairro,
  ender.cidade,
  ender.estado,
  ender.cep,
  prod.preco

  from usuarios usu
  left join endereco ender on ender.usuarios_id = usu.id
  inner join itens_reservados itres on itres.usuarios_id = usu.id
  inner join produto prod on prod.id = itres.produto_id
  where usu.id = $id";
  if ($qtd != NULL){
    $sql .= " LIMIT 1";
  }
  $resultado = mysqli_query($conexao, $sql);
  $checkout = array();
  if (mysqli_affected_rows($conexao) >= 1){
    while($linha = mysqli_fetch_assoc($resultado)){
      array_push($checkout, $linha);
    }
    return $checkout;
  } # fim do if
}
function novoPedido($idUsuario){
  $conexao = getConnection();
  date_default_timezone_set('America/Sao_Paulo');
  $date = date('Y-m-d');
  $sql = "INSERT INTO pedidos VALUES (NULL, $idUsuario, $date, 1, 1)";
  $resultado = mysqli_query($conexao, $sql);
  ## Função para pegar o id do pedido
  $idPedido = mysqli_insert_id($conexao);
  ## Se o pedido for feito, popular a tabela dos itens do pedido
  if (mysqli_affected_rows($conexao) >= 1) {
    $carrinho = serviceListarCarrinho($idUsuario);
    foreach ($carrinho as $i) {
      ## Informações para botar na tabela
      $qtd = $i['quantidade'];
      $preco = $i['preco'];
      $idProduto = $i['id'];
      ## Insert na tabela dos itens do pedido
      $sql = "INSERT INTO itens_pedido VALUES ($idPedido, $idProduto, $qtd, $preco)";
      $resultado = mysqli_query($conexao, $sql);
      ## Se a tabela já está populada com um livro, atualize a tabela.
      if (mysqli_affected_rows($conexao) == 0){
        $sql = "UPDATE itens_pedido SET quantidade = $qtd, set preco = $preco";
        $resultado = mysqli_query($conexao, $sql);
      }
      if (mysqli_affected_rows($conexao) >= 1) {
        return true;
      } else {
        return false;
      }
    }
  }
}
function listarPedido($id){
  $conexao = getConnection();
  $sql = "select

  usu.nome,
  usu.cpf,
  'LV'|| ped.id as numero_pedido,
  ped.data_pedido,
  itped.preco


  from usuarios usu
  inner join pedidos ped on ped.usuarios_id = usu.id
  inner join itens_pedido itped on itped.pedidos_id = ped.id
  inner join produto prod on prod.id = itped.produto_id
  WHERE ped.id = $id";
  $resultado = mysqli_query($conexao, $sql);
  if (mysqli_affected_rows($conexao) >= 1){
    $pedido = array();
    while ($linha = mysqli_fetch_assoc($resultado)){
      array_push($pedido, $linha);
    }
    return $pedido;
  } else {
    return false;
  }
}
function excluirPedido($id){
  $conexao = getConnection();
  $sql = "DELETE FROM pedidos where id = $id";
  $resultado = mysqli_query($conexao, $sql);
  if (mysqli_affected_rows($conexao) >= 1) {
    return true;
  } else {
    return "Falha ao excluir o pedido";
  }
}
function listarPedidoAdmin($id){
  $conexao = getConnection();
  $sql = "SELECT * FROM pedidos";
  if ($id != NULL){
    $sql .= " WHERE id = $id";
  }
  $resultado = mysqli_query($conexao, $sql);
  if (mysqli_affected_rows($conexao) >= 1){
    $pedidos = array();
    while ($linha = mysqli_fetch_assoc($resultado)){
      array_push($pedidos, $linha);
    }
    return $pedidos;
  } else {
    return false;
  }
}
function editarPedido($statusCompra, $statusEntrega, $id){
  $conexao = getConnection();
  $sql = "UPDATE pedidos SET id_status_compra = $statusCompra, id_status_entrega = $statusEntrega where id = $id";
  $resultado = mysqli_query($conexao, $sql);
  if (mysqli_affected_rows($conexao) >= 1) {
    return true;
  } else {
    return "Falha ao editar o pedido";
  }
}
function pesquisarPedido($n){
	$conexao = getConnection();
	$sql = "SELECT * FROM pedidos";
	$sql .= " WHERE (usuarios_id like '$n')";
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
