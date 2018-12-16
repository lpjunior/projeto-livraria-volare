<?php
session_start();
require_once 'serviceBook.php';
	if (isset($_POST['livro-excluir'])) {
			if ($livro = serviceExcluir($_POST['id'])){
				echo $livro;
			} else {
				echo $livro;
			}
}
