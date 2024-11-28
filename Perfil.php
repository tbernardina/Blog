<?php
include("start.php");
include("conexao.php");
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php 
    $select_perfil = "SELECT * FROM u210937242_usuario WHERE USER_ID =" . $_SESSION['id'];
    $resultado = $conn->query($select_perfil) or die("Falha na execução do código SQL: " . $conn->connect_error) ;
    $perfil = $resultado->fetch_assoc();
    ?>
</head>
<body>
    <section>
        <div>
            <label for="nome">Nome:</label>
            <input id="nome" type="text" value='<?php echo $perfil['NOME']; ?>' disabled>
            <label for="sobrenome">Sobrenome:</label>
            <input id="nickname" type="text" value='<?php echo $perfil['SOBRENOME'];?>' disabled>
            <label for="nickname">Usuário:</label>
            <input id="nickname" type="text" placeholder='<?php echo $perfil['NICKNAME']; ?>'>
            <label id="senha" for="senha">Senha:</label>
            <input id="senha" type="text" placeholder="Senha">
            <label id="confirmarSenha" for="senha">Confirmar senha:</label>
            <input id="confirmarSenha" type="text" placeholder="Confirmar senha">
        </div>
        <div>
            <label for="ImagemPerfil">Foto de Perfil:</label>
            <?php
                $CaminhoImagem = "Imagens/" . $perfil['PERFIL_IMG'];
                if (file_exists($CaminhoImagem)) {
                    echo "<img class='ImagemPerfil' src='$CaminhoImagem' alt='Imagem'>";
                }else{echo ' ';};
            ?>
            <input type="file">
        </div>
    </section>
</body>
</html>