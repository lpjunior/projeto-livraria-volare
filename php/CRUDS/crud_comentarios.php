<?php
require_once 'conexao.php';
if (!isset($_SESSION)) {
	session_start();
}
  function inserirComentario($usuarioID, $produtoID, $comentario, $dataComentario){
    $conexao = getConnection();
		date_default_timezone_set('America/Sao_Paulo');
    $dataComentario = date('Y-m-d H:i', time());
    $sql = "INSERT INTO comentarios VALUES (NULL, $usuarioID, $produtoID, '$comentario', '$dataComentario')";
    if (mysqli_query($conexao, $sql)){
      return header('location: ../../produto?id='.$produtoID);
    } else {
			$_SESSION['ComentarioErro'] = "<script>alert('Falha ao comentar')</script>";
      return false;
    }
}
  function listarComentario($limit){
    $conexao = getConnection();
    $sql = "SELECT com.*, usu.nome from comentarios com inner join usuarios usu on com.usuarios_id = usu.id
		order by datacomentario asc";
    if ($limit != NULL){
      $sql .= " LIMIT $limit";
    }
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
  function excluirComentario($idComentario){
    $conexao = getConnection();
    $sql = "DELETE FROM comentarios WHERE id = $idComentario";
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
