<?php
include("conexao.php");
$mensagem = isset($_GET['mensagem']) ? $_GET['mensagem'] : '';
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css_login.css">
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
            <span id='menu-toggle' class="material-symbols-outlined" onClick='showMenus()'>menu</span>
        </div>
        <a class='link_navbar' href="Home.php">Home</a>
        <a class='link_navbar' href="Login.php">Entrar</a>
    </nav>
    <div class="container">
        <h2>Login</h2>
        <form id="loginForm"  method="post" action="ProcessarLogin.php">
            <input type="text" name="nickname" placeholder="Usuário" required>
            <input type="password" name="senha" placeholder="Senha" required>
            <input type="submit" name="submit" value="Logar">
        </form>
        <div class="signup-link">
            <a href="Cadastro.php">Cadastre-se aqui</a>
        </div>
        <?php echo $mensagem;?>
    </div>
</body>
</html>
