<?php
include('conexao.php');
$mensagem = "";
// Inserir usuário no banco de dados
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $nickname = $_POST['nickname'];
        $nome = $_POST['nome'];
        $sobrenome = $_POST['sobrenome'];
        $senha = $_POST['senha'];

        $insert = "INSERT INTO USUARIO (NOME, SOBRENOME, SENHA, NICKNAME) VALUES ('$nome', '$sobrenome', '$senha', '$nickname')";

        if ($conn->query($insert) === TRUE) {
            $mensagem = "Usuário cadastrado com sucesso!";
        } else {
            $mensagem = "Erro ao cadastrar usuário: " . $conn->error;
        }
    }
header('Location: Cadastro.php?mensagem=' . urlencode($mensagem));
exit();
$conn->close();
