<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
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

        $select_cadastro = "SELECT * FROM u210937242_usuario WHERE NICKNAME = '$nickname' AND SENHA = '$senha'";
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
            header("Location: Login.html?MensagemDepuracao=" . urlencode($mensagem));
        }
    }
    $conn->close();
}
?>