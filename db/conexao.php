<?php

$host = 'localhost';
$username = 'root';
$password = '';
$database = 'foodclub';

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error){ 
    
    die("A conexão falhou: " . $conn->connect_error);
}

?>