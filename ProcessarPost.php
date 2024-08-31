<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include("conexao.php");
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titulo = $_POST['titulo'];
    $conteudo = $_POST['conteudo'];
    $autor = $_SESSION['id'];
    $anexos = $_FILES['anexo'];
// Código de anexo de imagens
    if(isset($anexos) && !empty($anexos['name'])){
        $imagem = strtolower(pathinfo($anexos['name'], PATHINFO_EXTENSION)); //Captura o formato do anexo e verifica se está na lista de formatos válidos
        if($imagem == 'jpg' || $imagem == 'png' || $imagem == 'jpeg') {
            move_uploaded_file($anexos['tmp_name'], 'imagens/'.$anexos['name']); //Move o anexo para a pasta "imagens"
        }else {
            $mensagem = 'Esse arquivo não foi suportado pelo sistema.';
            header('Location: CriarPost.php?MensagemDepuracao=' . urldecode($mensagem));
            exit();
        }
    }
// Código de anexo de imagens
// Código de insert dos posts criados
    if (!empty($titulo) && !empty($conteudo)) { // Verifica se tanto o título quanto o conteúdo não estão vazios e faz a inserção do post ao banco de dados
        $sql = "INSERT INTO u210937242_posts (TITULO, CONTEUDO, ANEXOS, USER_ID, DATA_PUBLICACAO) VALUES ('$titulo', '$conteudo', '".$anexos['name']."', '$autor', CONVERT_TZ(NOW(), @@global.time_zone, 'America/Sao_Paulo')git)"; // Query de insert das informações dos posts
        if ($conn->query($sql) === TRUE) {
            header('location: Home.php');
            exit();
        } else {
            $mensagem = "Erro ao inserir post: " . $conn->error;
        }
    } else {
        $mensagem = "Por favor, preencha tanto o título quanto o conteúdo do post.";
    }
// Código de insert dos posts criados
    $conn->close();
    header("Location: CriaPost.php?MensagemDepuracao= " . urlencode($mensagem));
    exit();
}
