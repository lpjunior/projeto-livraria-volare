<?php
  function inserirComentario($usuarioID, $produtoID, $comentario, $dataComentario){
    $conexao = getConnection();
    $sql = "INSERT INTO comentarios VALUES (NULL, $usuariosID, $produtoID, $comentario, $dataComentario)";
    if (mysqli_query($conexao, $sql)){
      return true;
    } else {
      return false;
    }
}
  function listarComentario(){
    $conexao = getConnection();
    $sql = "SELECT comentario, data_comentario from comentarios order by data_comentario asc";
    $resultado = mysqli_query($conexao, $sql);
    if (mysqli_affected_rows($conexao) >= 1) {
      $comentario = array();
      while($linha = mysqli_fetch_assoc($resultado)){
        array_push($comentario, $linha);
      }
      return $comentario;
    } else {
      return false;
    }
}
  function excluirComentario($id){
    $conexao = getConnection();
    $sql = "DELETE FROM comentario WHERE id = $id";
    if (mysqli_query($conexao, $sql)){
      return true;
    } else {
      return false;
    }
}
  function editarComentario($usuarioID, $produtoID, $comentario){
    $conexao = getConnection();
    $sql = "UPDATE comentarios SET comentario = $comentario";
    if (mysqli_query($conexao, $sql)){
      return true;
    } else {
      return false;
    }
  }
