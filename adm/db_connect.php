<?php
// conexão com banco de dados
$servername = "localhost";
$username = "root";
$password = "benecarol";
$db_name ="ec3ts07mt1bukxi7";

$connect = mysqli_connect($servername, $username, $password, $db_name);

if(mysqli_connect_error()){
echo "falha na conexão : " .mysqli_connect_error();
}
?>