<?php
# Caso a sessão não tenha sido criado, crie
if (!isset($_SESSION)) {
  session_start();
}
require_once 'conexao.php';
require_once 'serviceCarrinho.php';

function listarCheckout($id, $qtd){
  $conexao = getConnection();
  $sql = "SELECT
  prod.titulo,
  itres.quantidade,
  usu.nome,
  usu.sobrenome,
  prod.preco

  from usuarios usu
  inner join itens_reservados itres on itres.usuarios_id = usu.id
  inner join produto prod on prod.id = itres.produto_id
  where usu.id = $id";
  // Se a variável quantidade for diferente de nulo, limite ela para 1
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
function listarPedido($id, $detalhesPedido){
  $conexao = getConnection();
  $sql = "select
  ped.id as pedido_id,
  'LV'|| ped.id as numero_pedido,
  ped.data_pedido,
  ped.id_status_compra,
  ped.id_status_entrega,
  sc.status_compra,
  se.status_entrega,
  end.destinatario,
  end.cep,
  end.estado,
  end.bairro,
  end.endereco,
  end.numero,
  end.complemento from usuarios usu
  inner join pedidos ped on ped.usuarios_id = usu.id
  inner join status_compra sc on sc.idstatus_compra = ped.id_status_compra
  inner join status_entrega se on se.idstatus_entrega = ped.id_status_entrega
  inner join endereco end on end.usuarios_id = usu.id";
  // Caso seja diferente de nulo, liste apenas um pedido com o ID do pedido
  if ($detalhesPedido != NULL){
    $sql .= " WHERE ped.id = $detalhesPedido and end.TipoEndereco_id = 1 order by data_pedido desc";
  }
  // Caso seja diferente de nulo, liste todos os pedidos do usuário com o ID
  if ($id != NULL){
  $sql .= " WHERE usu.id = $id and end.TipoEndereco_id = 1 order by data_pedido desc";
  }
  // Se os dois forem nulos, apenas listar ordenando pela data
  if ($id == NULL && $detalhesPedido == NULL){
    $sql .= " order by ped.data_pedido desc";
  }
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
// Função de listar pedido para a página do admin
function listarPedidoAdmin($id){
  $conexao = getConnection();
  $sql = "SELECT ped.*, sc.status_compra, se.status_entrega FROM pedidos ped
  inner join status_compra sc on ped.id_status_compra = sc.idstatus_compra
  inner join status_entrega se on ped.id_status_entrega = se.idstatus_entrega";
  // Se for diferente de nulo, liste um usuário específico
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
function listarItensPedidos($idPedido){
  $conexao = getConnection();
	$sql = "select
  itped.*, prod.titulo, ped.frete, it.nome from itens_pedido itped
  inner join produto prod on prod.id = itped.produto_id
  inner join imagemthumb it on it.produto_id = prod.id
  inner join pedidos ped on ped.id = itped.pedidos_id
  where ped.id = $idPedido";
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
function checkoutFinalizar($idProd, $quantidade, $usuarioID){
  $conexao = getConnection();
  $sql = "SELECT quantidade from itens_reservados where produto_id = $idProd and usuarios_id = $usuarioID";
  $resultado = mysqli_query($conexao, $sql);
  $linha = mysqli_fetch_assoc($resultado);
  if ($linha['quantidade'] == $quantidade){
    return true;
  } else {
    $sql = "UPDATE itens_reservados set quantidade = $quantidade where produto_id = $idProd";
    $resultado = mysqli_query($conexao, $sql);
    return true;
  }
}
