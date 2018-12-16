<?php
require_once 'serviceUsuario.php';
if (isset($_POST['btn_cadastrar_cpf'])) {
  $cpf = serviceChecarCpf($_POST['txtCPF']);
  $_SESSION['cpf'] = $cpf;
  header('location: ../../entrar');
}
