<?php
session_start();
require_once 'serviceComentarios.php';
	if (isset($_POST['btn-comentar'])) {
		$dataComentario = NULL;
			if ($comentario = serviceInserirComentario($_SESSION['user_id'], $_GET['id'], $_POST['message'], $dataComentario)){
				return $comentario;
			} else {
				return $comentario;
			}
		}
