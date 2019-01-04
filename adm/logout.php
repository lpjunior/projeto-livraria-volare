<?php
// Só poder entrar quando logado
if (isset($_SESSION['user'])){
session_start();
session_unset();
session_destroy();
header('Location: adm.php');
} else {
  header('location: adm.php');
}
