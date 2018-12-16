<?php
require_once 'conexao.php';
require_once 'serviceCarrinho.php';
require_once 'serviceBook.php';
if(!isset($_SESSION)){
    session_start();
}
if(isset($_POST["quantity"]) && $_POST['quantity'] != 0 && !is_null($_POST['quantity'])){
    $quant = $_POST["quantity"];
}
else{
    $quant = 1;
}
# Verifica se existe a sessão de carrinho, caso não exista é criada
if(!isset($_SESSION['carrinho'])) {
    $_SESSION['carrinho'] = array();
}
if(isset($_GET['id'])){
    $id = intval($_GET['id']);
  # Array que joga pros itens reservados no banco
  $carrinho_info = array('id' => $id, 'qtd' => $quant);
  ## Produto que vai para o carrinho
}
if(isset($_GET['acao'])) {
    # Adiciona o produto
    if($_GET['acao'] == 'add') {
        if(!isset($_SESSION['carrinho'][$id])) {
            # Caso o produto não exista no carrinho, bote ele no carrinho
            $_SESSION['carrinho'][$id] = $quant;
            # Se o usuário estiver logado, mandar pro banco o item reservado.
            if (isset($_SESSION['user_id'])){
            $user_id = $_SESSION['user_id'];
            serviceInserirCarrinho($user_id, $id, $quant);
            }
        } else {
          # Caso o produto esteja no carrinho, aumente a quantidade dele.
            $_SESSION['carrinho'][$id] += $quant;
            # Se o usuário estiver logado, somar com a quantidade da reserva no banco.
            if (isset($_SESSION['user_id'])){
              serviceUpdateAdd($quant, $id);
            }
        }
        $quant_total = $_SESSION['carrinho'][$id];
        $_SESSION['produto'][$id] = serviceDetalhesLivroCarrinho($id);
        $_SESSION['produto'][$id]['qtd'] = $quant_total;
        header("Location: ../../carrinho");
        die();
    }
    # Remove o produto
    if($_GET['acao'] == 'del') {
        $id = intval($_GET['id']);
        # Se o item existir no carrinho
        if(isset($_SESSION['carrinho'][$id])) {
          $quant_total = $_SESSION['carrinho'][$id];
          # Retire o item do carrinho
            unset($_SESSION['carrinho'][$id]);
            # Se o usuário estiver logado, retire dos itens reservados, e aumente o estoque.
            unset($_SESSION['produto'][$id]);
            if (isset($_SESSION['user_id'])){
              # Pegar a quantidade total do carrinho
            serviceDelete($quant_total, $id);
          }
        }
        header("Location: testeCarrinho.php");
        die();
    }
    # Altera quantidade
    if($_GET['acao'] == 'atu') {
        if(is_array($carrinho_info)) {
                $quant_total = $_SESSION['carrinho'][$id];
                $id = intval($carrinho_info['id']);
                $qtd = intval($carrinho_info['qtd']);
                if($qtd != 0) {
                    $_SESSION['carrinho'][$id] = $qtd;
                    # Se o usuário estiver logado, mandar pro banco o item reservado.
                    if (isset($_SESSION['user_id'])){
                      serviceUpdateAlt($qtd, $id, $quant_total);
                    }
                } else {
                    unset($_SESSION['carrinho'][$id]);
            }
        }
        $quant_total = $_SESSION['carrinho'][$id];
        $_SESSION['produto'][$id] = serviceDetalhesLivroCarrinho($id);
        $_SESSION['produto'][$id]['qtd'] = $quant_total;
        header("Location: ../../carrinho");
        die();
    }
}
