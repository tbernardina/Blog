<?php
// Arquivo somente para conexão com o banco de dados
$servername = "localhost";
$username = "u210937242_TJAdmin";
$password = "Thiagoreis2019_";
$database = "u210937242_Projeto0";

$conn = new mysqli($servername, $username, $password, $database);
$conn->query("SET time_zone = 'America/Sao_Paulo'");

if($conn->connect_error){
    die("Falha ao conectar ao banco de dados: " . $conn->connect_error);
}
