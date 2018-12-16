<?php
	## Conexão do banco de dados
	define("SERVER", "z1ntn1zv0f1qbh8u.cbetxkdyhwsb.us-east-1.rds.amazonaws.com");
	define("USER", "p8wzbq4q2lf0b40o");
	define("PASS", "smtr52bn1z95f2hm");
	define("DB", "ec3ts07mt1bukxi7");
	define("PORT", 3306);
	## Função para fazer a conexão
	function getConnection() {
		$link = mysqli_connect(SERVER, USER, PASS, DB, PORT) or die("Erro ao abrir a conexão");
		mysqli_set_charset($link, "utf8");
		return $link;
	}
