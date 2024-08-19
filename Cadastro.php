
<?php
include('conexao.php');
$mensagem = isset($_GET['mensagem']) ? $_GET['mensagem'] : '';
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link rel="stylesheet" href="css_cadastro.css">
    <link rel="stylesheet" href="navbar.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <script src="ScriptNavbar.js"></script>
</head>
<body>
    <header>
        <h1>Fórum</h1>
    </header>
    <nav>
        <div class="cent_nav">
            <span id='menu-toggle' class="material-symbols-outlined" onclick='showMenus()'>menu</span>
        </div>
        <a class='link_navbar' href="Home.php">Home</a>
        <a class='link_navbar' href="Login.php">Entrar</a>
    </nav>
    <div class="container">
        <h2>Cadastro</h2>
        <form method="post" action="ProcessarCadastro.php">
            <input type="text" name="nome" placeholder="Nome" required>
            <input type="text" name="sobrenome" placeholder="Sobrenome" required>
            <input type="text" name="nickname" placeholder="Nickname" required>
            <input type="password" name="senha" placeholder="Senha" required>          
            <input type="submit" name = 'submit'value="Cadastrar">
        </form>
        <div class="signup-link">
            <a href="Login.php">Já tem usuário? clique aqui!</a>
        </div>
        <div id="mensagem"><?php echo $mensagem;?></div>
    </div>
</body>
</html>
