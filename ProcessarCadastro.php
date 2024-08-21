<?php
include('conexao.php');
// Inserir usuário no banco de dados
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $nickname = $_POST['nickname'];
        $nome = $_POST['nome'];
        $sobrenome = $_POST['sobrenome'];
        $senha = $_POST['senha'];
// Código de insert dos usuários cadastrados
        $insert = "INSERT INTO USUARIO (NOME, SOBRENOME, SENHA, NICKNAME) VALUES ('$nome', '$sobrenome', '$senha', '$nickname')"; // Query de insert das informações do usuário
        if ($conn->query($insert) === TRUE) {
            $mensagem = "Usuário cadastrado com sucesso!";
            header("Location: Login.html?MensagemDepuracao= ".urlencode($mensagem));
        } else {
            $mensagem = "Erro ao cadastrar usuário: " . $conn->error;
            header("Location: Cadastro.html?MensagemDepuracao=" . urlencode($mensagem));
            exit();
        }
// Código de insert dos usuários cadastrados
        $conn->close();
    }
