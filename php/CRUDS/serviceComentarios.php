<?php
require_once 'crud_comentarios.php';
function serviceInserirComentario($usuarioID, $produtoID, $comentario, $dataComentario){
  if ($comentarios = inserirComentario($usuarioID, $produtoID, $comentario, $dataComentario)){
    return $comentarios;
  }
}
function serviceListarComentarios(){
  if ($comentarios = listarComentario()){
    return $comentarios;
  }
}
function serviceExcluirComentario($id){
  if ($comentarios = excluirComentario($id)){
    return $comentarios;
  }
}
function serviceEditarComentario($usuarioID, $produtoID, $comentario, $dataComentario){
  if ($comentarios = editarComentario($usuarioID, $produtoID, $comentario, $dataComentario)){
    return $comentarios;
  }
}
