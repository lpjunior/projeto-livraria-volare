<?php
require_once 'crud_comentarios.php';
function serviceInserirComentario($usuarioID, $produtoID, $comentario, $dataComentario){
  if ($comentarios = inserirComentario($usuarioID, $produtoID, $comentario, $dataComentario)){
    return $comentarios;
  }
}
function serviceListarComentarios($limit){
  if ($comentarios = listarComentario($limit)){
    return $comentarios;
  }
}
function serviceExcluirComentario($idComentario){
  if ($comentarios = excluirComentario($idComentario)){
    return $comentarios;
  }
}
function serviceEditarComentario($usuarioID, $produtoID, $comentario, $dataComentario){
  if ($comentarios = editarComentario($usuarioID, $produtoID, $comentario, $dataComentario)){
    return $comentarios;
  }
}
