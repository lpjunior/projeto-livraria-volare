<?php
session_start();
require_once 'serviceComentarios.php';
	if (isset($_POST['btn-comentar'])) {
    date_default_timezone_set('America/Sao_Paulo');
    $dataComentario = date('Y-m-d', time());
			if ($comentario = serviceInserirComentario($_SESSION['user_id'], $_GET['id'], $_POST['message'], $dataComentario){
        
			} else {
			}
		}
