<?php
// Arquivo somente para conexão com o banco de dados
$servername = "localhost";
$username = "root";
$password = "";
$database = "portifolio0";

$conn = new mysqli($servername, $username, $password, $database);

if($conn->connect_error){
    die("Falha ao conectar ao banco de dados: " . $conn->connect_error);
}
//Comentário teste para verificação do script do servidor
