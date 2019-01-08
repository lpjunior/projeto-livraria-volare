<script scr="facebook-sdk.js"></script>
<?php
session_start();
if (isset($_SESSION['user']) || isset($_SESSION['token_face'])) {
	## Quebra a sessão e desloga do login do facebook.
	session_unset();
	session_destroy();
	echo "<script>FB.logout();</script>";
	header('location: ../../index.php');
} else {
	header('location: ../../index.php');
}
