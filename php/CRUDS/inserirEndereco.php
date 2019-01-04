<?php
require_once 'serviceUsuario.php';
if (!isset($_SESSION)){
session_start();
}
	if (isset($_POST['btn-enviar'])) {
			if ($endereco = serviceInserirEndereço($_POST['txtCEP'], $_POST['txtEndCobr'], $_POST['txtNum'], $_POST['txtComplemento'],
      $_POST['txtBairro'], $_POST['txtEstado'], $_POST['txtCidade'], $_POST['idestinatario'], $_GET['end'])) {
					if ($endereco == true){
            header('location: ../../user?inserir=true');
					} else {
            header('location: ../../user?inserir=false');
          }
			} else {
				return $endereco;
			}
		}
