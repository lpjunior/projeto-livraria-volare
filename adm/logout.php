<?php
// Só poder entrar quando logado
session_start();
session_unset();
session_destroy();
header('Location: adm.php');


?>
