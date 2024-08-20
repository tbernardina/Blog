<?php
include("conexao.php");
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titulo = $_POST['titulo'];
    $conteudo = $_POST['conteudo'];
    $autor = $_SESSION['id'];
    $anexos = $_FILES['anexo'];

    $imagem = explode('.', $anexos['name']);
    if($imagem[sizeof($imagem) -1] = '.jpeg' || $imagem[sizeof($imagem) -2] = '.png') {
        move_uploaded_file($anexos['tmp_name'], 'imagens/'.$anexos['name']);

    }else {
        $mensagem = 'Esse arquivo não foi suportado pelo sistema.';
        header('Location: CriarPost.php?mensagem=' . urldecode($mensagem));
        exit();
    }

    // Verifica se tanto o título quanto o conteúdo não estão vazios e faz a inserção do post ao banco de dados
    if (!empty($titulo) && !empty($conteudo)) {
        $sql = "INSERT INTO POSTS (TITULO, CONTEUDO, ANEXOS, USER_ID) VALUES ('$titulo', '$conteudo', '".$anexos['name']."', '$autor')";

        if ($conn->query($sql) === TRUE) {
            $mensagem = "Post inserido com sucesso.";
        } else {
            $mensagem = "Erro ao inserir post: " . $conn->error;
        }
    } else {
        $mensagem = "Por favor, preencha tanto o título quanto o conteúdo do post.";
    }
    $conn->close();
    header('location: ' . 'Home.php');
    exit();
}
