<?php
// Arquivo somente para conexão com o banco de dados
$servername = "localhost";
$username = "u210937242_";
$password = "";
$database = "projeto0";

$conn = new mysqli($servername, $username, $password, $database);

if($conn->connect_error){
    die("Falha ao conectar ao banco de dados: " . $conn->connect_error);
}
