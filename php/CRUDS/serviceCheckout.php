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
