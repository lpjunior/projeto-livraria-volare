<?php
require_once 'crud_carrinho.php';
# Inserir no carrinho
  function serviceInserirCarrinho($user_id, $id, $quant){
    if ($carrinho = inserirCarrinho($user_id, $id, $quant)){
      return $carrinho;
    }
  }
  # Aumentar o número de produtos reservados
  function serviceUpdateAdd($quant, $id){
    if ($carrinho = updateAdd($quant, $id)) {
      return $carrinho;
		}
  }
  # Deletar os produto reservados
  function serviceDelete($quant_total, $id){
    if (deleteCarrinho($quant_total, $id)){
      return $carrinho;
    }
  }
  # Alterar o número de produto reservados
  function serviceUpdateAlt($qtd, $id, $quant_total){
    if ($carrinho = updateAlt($qtd, $id, $quant_total)) {
    }
  }
  ## ID do usuário.
  function serviceListarCarrinho($id){
    if ($carrinho = listarCarrinho($id)) {
      return $carrinho;
    }
  }
  function serviceDetalhesLivroCarrinho($id){
    if ($carrinho = listarLivroCarrinho($id)) {
      return $carrinho;
    }
  }
