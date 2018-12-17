<?php
require_once 'crud_comentarios.php';
function serviceInserirComentario(){
  if ($comentarios = inserirComentario()){
    return $comentarios;
  }
}
function serviceListarComentarios(){
  if ($comentarios = inserirComentario()){
    return $comentarios;
  }
}
function serviceExcluirComentario($id){
  if ($comentarios = excluirComentario($id)){
    return $comentarios;
  }
}
function serviceEditarComentario(){
  if ($comentarios = inserirComentario()){
    return $comentarios;
  }
}
