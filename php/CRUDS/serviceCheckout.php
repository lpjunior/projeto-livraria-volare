<?php
require_once 'crud_checkout.php';
function serviceListarCheckout($id, $qtd){
  if ($checkout = listarCheckout($id, $qtd)){
    return $checkout;
  }
}
  function serviceNovoPedido($idUsuario){
    if ($checkout = novoPedido($idUsuario)){
      return $checkout;
    }
  }
  function serviceListarPedido($id){
    if ($checkout = listarPedido($id)){
      return $checkout;
    }
  }
  function serviceListarPedidoAdmin($idUsuario){
    if ($checkout = listarPedidoAdmin($idUsuario)){
      return $checkout;
    }
  }
  function serviceEditarPedido($statusCompra, $statusEntrega, $id){
    if ($pedido = editarPedido($statusCompra, $statusEntrega, $id)) {
      return $pedido;
    }
  }
  function serviceExcluirPedido($id){
    if ($pedido = excluirPedido($id)){
      return $pedido;
    }
  }
  	function servicePesquisarPedido($n){
      if ($pedido = pesquisarPedido($n)){
        return $pedido;
      }
    }
