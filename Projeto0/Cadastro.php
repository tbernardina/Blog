
<?php
include('conexao.php');
// Inserir usuário no banco de dados
//     if($_SERVER["REQUEST_METHOD"] == "POST") {
//         $nickname = $_POST['nickname'];
//         $nome = $_POST['nome'];
//         $sobrenome = $_POST['sobrenome'];
//         $senha = $_POST['senha'];

//         $insert = "INSERT INTO USUARIO (NOME, SOBRENOME, SENHA, NICKNAME) VALUES ('$nome', '$sobrenome', '$senha', '$nickname')";

//         if ($conn->query($insert) === TRUE) {
//             $mensagem = "Usuário cadastrado com sucesso!";
//         } else {
//             $mensagem = "Erro ao cadastrar usuário: " . $conn->error;
//         }
//     }
// $conn->close();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link rel="stylesheet" href="css_cadastro.css">
    <link rel="stylesheet" href="navbar.css">
</head>
<body>
    <header>
        <h1>Fórum</h1>
    </header>
    <nav>
        <a class='link_navbar' href="Home.php">Home</a>
        <a class='link_navbar' href="Login.php">Entrar</a>
    </nav>
    <div class="container">
        <h2>Cadastro</h2>
        <form method="post">
            <input type="text" name="nome" placeholder="Nome" required>
            <input type="text" name="sobrenome" placeholder="Sobrenome" required>
            <input type="text" name="nickname" placeholder="Nickname" required>
            <input type="password" name="senha" placeholder="Senha" required>          
            <input type="submit" value="Cadastrar">
        </form>
        <div class="signup-link">
            <a href="Login.php">Já tem usuário? clique aqui!</a>
        </div>
        <div id="mensagem"><?php echo $mensagem ?></div>
    </div>
</body>
</html>
