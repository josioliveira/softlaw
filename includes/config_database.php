<?php
// Credenciais do banco de dados Mysql.
 
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root123@');
define('DB_NAME', 'projetoweb_softlaw');
 
// Abaixo é onde tento acessar o banco de dados.

$db = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
// Abaixo eu verifico a conexão.

if($db === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>