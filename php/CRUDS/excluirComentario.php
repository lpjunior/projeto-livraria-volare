<?php
session_start();
require_once 'serviceComentarios.php';
	if (isset($_POST['btn-excluir'])) {
			if ($comentario = serviceExcluirComentario($_POST['btn-excluir'], $_POST['produtoID'])){
        if ($comentario == true){
        $prodId = $_POST['produtoID'];
        header("location: ../../produto.php?id=$prodId");
      } else {
        header("location: ../../produto.php?id=$prodId");
      }
		}
  }
