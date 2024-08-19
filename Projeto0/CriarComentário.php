<?php
include("start.php");
include("conexao.php");
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['conteudo_C'])) {
    $IDPOST = $_POST['postId'];
    $AUTOR = $_SESSION['id'];
    $CONTEUDO = $conn->real_escape_string($_POST['conteudo_C']); // Prevenir injeção de SQL

    $insert_coment = "INSERT INTO COMENTARIO (POST_ID, USER_ID, CONTEUDO) VALUES ('$IDPOST', '$AUTOR', '$CONTEUDO')";
    $conn->query($insert_coment);

    header("Location: " . "home.php");
    exit();
}