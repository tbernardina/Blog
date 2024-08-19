<?php 
include("start.php"); 
include("conexao.php");
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $titulo = $_POST['titulo'];
        $conteudo = $_POST['conteudo'];
        $autor = $_SESSION['id'];

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

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Post</title>
    <link rel="stylesheet" href="css_criarpost.css">
    <link rel="stylesheet" href="navbar.css">
</head>
<body>
    <header>
        <h1>Criar Post</h1>
    </header>
    <nav>
        <a class='link_navbar' href="Home.php">Home</a>
        <a class='link_navbar' href="Logout.php">Sair</a>
        <strong> Bem vindo, <?php echo $_SESSION['nome'] ?></strong>

    </nav>
    <section>
        <h2>Novo Post</h2>
        <form id="postForm" method="POST">
            <label for="titulo">Título:</label><br>
            <input type="text" id="titulo" name="titulo"><br>
            <label for="conteudo">Conteúdo:</label><br>
            <textarea id="conteudo" name="conteudo"></textarea><br>
            <label for="autor">Autor:</label><br>
            <input type="text" id="autor" name="autor" value="<?php echo $_SESSION['nome_C']?>" disabled><br><br>
            <input type="submit" value="Postar">
        </form>
        <div id='mensagem_post'><?php if(isset($mensagem)) {echo $mensagem;} ?></div>
    </section>
</body>
</html>
