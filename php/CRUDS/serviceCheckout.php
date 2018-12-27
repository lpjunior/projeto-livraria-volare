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
  function serviceListarPedido($idUsuario){
    if ($checkout = listarPedido($idUsuario)){
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
