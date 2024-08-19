<?php
include("conexao.php");
// Verifica o usuário e senha no banco de dados
if(isset($_POST['nickname']) || isset($_POST['senha'])){
    if(strlen($_POST['nickname']) == 0){
        echo "Preencha seu nome de usuário";
    }
    else if(strlen($_POST['senha']) == 0){
        echo "Preencha sua senha";
    } else{
        $nickname = $conn->real_escape_string($_POST['nickname']);
        $senha = $conn->real_escape_string($_POST['senha']);

        $select_cadastro = "SELECT * FROM USUARIO WHERE NICKNAME = '$nickname' AND SENHA = '$senha'";
        $sql_query = $conn->query($select_cadastro) or die("Falha na execução do código SQL: " . $conn->connect_error);

        $resultado = $sql_query->num_rows;

        if($resultado == 1){
            $usuario = $sql_query->fetch_assoc();
            if(!isset($_SESSION)){
                session_start();
            }
            $nome_completo = $usuario["NOME"] . " " . $usuario["SOBRENOME"]; 
            $_SESSION['id'] = $usuario['USER_ID'];
            $_SESSION['nome'] = $usuario['NICKNAME'];
            $_SESSION['nome_C'] = $nome_completo;

            header("Location: Home.php");
        } else{
            $mensagem = "Falha no login, usuário ou senha incorretos";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css_login.css">
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
        <h2>Login</h2>
        <form id="loginForm"  method="post">
            <input type="text" name="nickname" placeholder="Usuário" required>
            <input type="password" name="senha" placeholder="Senha" required>
            <input type="submit" name="submit" value="Logar">
        </form>
        <div class="signup-link">
            <a href="Cadastro.php">Cadastre-se aqui</a>
        </div>
        <?php if(isset($mensagem)) {echo $mensagem; }?>
    </div>
</body>
</html>
