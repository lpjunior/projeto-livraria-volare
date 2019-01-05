<?php
// Só poder entrar quando logado
session_start();
if (isset($_SESSION['user'])){
session_unset();
session_destroy();
header('Location: adm.php');
} else {
  header('Location: adm.php');
}
