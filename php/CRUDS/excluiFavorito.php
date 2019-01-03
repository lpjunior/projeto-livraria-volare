<?php
session_start();
require_once 'serviceUsuario.php';
	if (isset($_GET['id'])) {
			if ($favorito = serviceExcluirItemDesejado($_GET['id'])) {
        if ($favorito == true){
        header('location: ../../user');
      } else {
        header('location: ../../user');
      }
		}
  } else {
    header('location: ../../user');
  }
