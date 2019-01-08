<?php
session_start();
require_once 'serviceUsuario.php';
// Caso o botão de checar cpf seja pressionado
if (isset($_POST['btn_cadastrar_cpf'])) {
   // Função para checar se o CPF já está no banco de dados
  $cpf = serviceChecarCpf($_POST['txtCPF']);
  $_SESSION['cpf'] = $cpf;
  header('location: ../../entrar.php');
}
