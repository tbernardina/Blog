<?
include("conexao.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titulo = $_POST['titulo'];
    $conteudo = $_POST['conteudo'];
    $autor = $_SESSION['id'];
    $anexos = $_POST['anexo'];

    // Verifica se tanto o título quanto o conteúdo não estão vazios
    // e faz a inserção do post ao banco de dados
    if (!empty($titulo) && !empty($conteudo)) {
        $sql = "INSERT INTO POSTS (TITULO, CONTEUDO, USER_ID) VALUES ('$titulo', '$conteudo', '$autor')";

        if ($conn->query($sql) === TRUE) {
            $mensagem = "Post inserido com sucesso.";
            header('location: ' . 'Home.php');
        } else {
            $mensagem = "Erro ao inserir post: " . $conn->error;
        }
    } else {
        $mensagem = "Por favor, preencha tanto o título quanto o conteúdo do post.";
    }
}
$conn->close();