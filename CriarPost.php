<?php 
include("start.php"); 
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Post</title>
    <link rel="stylesheet" href="css_criarpost.css">
    <link rel="stylesheet" href="navbar.css">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css">
    <script src="ScriptNavbar.js"></script>
    <script src="ScriptMensagem.js"></script>
</head>
<body>
<header class="header">
    <a href="Home.php" class="logo">Fórum</a>
    <nav class="navbar">
        <strong class="nome_navbar">Bem vindo, <?php echo $_SESSION['nome']; ?></strong>
        <a class="link_navbar" href="Home.php">Home</a>
        <a class="link_navbar" href="Logout.php">Sair</a>
    </nav>
</header>
    <section>
        <h2>Novo Post</h2>
        <form id="postForm" method="POST" action="ProcessarPost.php" enctype="multipart/form-data">
            <label for="titulo">Título:</label><br>
            <input type="text" id="titulo" name="titulo"><br>
            <label for="conteudo">Conteúdo:</label><br>
            <textarea id="conteudo" name="conteudo"></textarea><br>
            <div class="anexos">
                <input type="file" id="file" name="anexo" accept="image/*">
                <label for="file">Escolher arquivo</label>
            </div>
            <label for="autor">Autor:</label><br>
            <input type="text" id="autor" name="autor" value="<?php echo $_SESSION['nome_C']?>" disabled><br><br>
            <input type="submit" value="Postar">
        </form>
        <div id='MensagemDepuracao'></div>
        <script>ExibirMensagem();</script>
    </section>
</body>
</html>
