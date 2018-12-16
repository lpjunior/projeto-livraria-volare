<script scr="facebook-sdk.js"></script>
<?php
session_start();
if (isset($_SESSION['user']) || isset($_SESSION['token_face'])) {
	session_unset();
	session_destroy();
	echo "<script>FB.logout();</script>";
	header('location: ../../home');
} else {
	header('location: ../../home');
}
