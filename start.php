<?php
if(!isset($_SESSION)){
    session_start();
} 

if(!isset($_SESSION['id'])){
    die('Acesso negado, faça login primeiro. <p><a href=\'Login.php\'> Logar </a></p>');
}
?>