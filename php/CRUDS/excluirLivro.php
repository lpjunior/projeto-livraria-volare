<?php
session_start();
require_once 'serviceBook.php';
	if (isset($_GET['id'])) {
			if ($livro = serviceExcluir($_GET['id'])){
				echo $livro;
			} else {
				echo $livro;
			}
}
