<?php
include("start.php");
include("conexao.php");
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meu Fórum</title>
    <link rel="stylesheet" href="css_login.css"> 
    <link rel="stylesheet" href="navbar.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap">
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
            <strong class='nome_navbar'> Bem-vindo, <?php echo $_SESSION['nome'] ?></strong>
        </div>
        <a class='link_navbar' href="Home.php">Home</a>
        <a class='link_navbar' href="Login.html">Entrar</a>
        <a class='link_navbar' href="CriarPost.php">Criar Post</a>
        <a class='link_navbar' href="Logout.php">Sair</a>
    </nav>
    <div class="wrapper"> 
        <section>
            <h2>Últimas postagens</h2>
            <?php
            // Consulta para obter os posts do banco de dados
            $slct = "SELECT p.*, u.NOME, u.SOBRENOME FROM POSTS p JOIN USUARIO u ON p.USER_ID = u.USER_ID";
            $result = $conn->query($slct);

            if ($result->num_rows > 0) {
                // Loop através de cada linha do resultado da consulta
                while ($row = $result->fetch_assoc()) {
            ?>
                <article>
                    <h3><?php echo $row['TITULO']; ?></h3>
                    <div><?php echo $row['DATA_PUBLICACAO'] ?></div>
                    <div class="ImagemAnexo">
                        <?php
                        // Código de exibição das imagens anexadas
                        $CaminhoImagem = "Imagens/".$row['ANEXOS']; 
                        if(file_exists("Imagens/".$row['ANEXOS'])){echo "<img class='ImagemAnexos' src='$CaminhoImagem' alt='Imagem'>";};
                        ?>
                    </div>
                    <p><?php echo $row['CONTEUDO']; ?></p>
                    <p>Autor: <?php echo $row['NOME'] . " " . $row['SOBRENOME']; ?></p>
                    <form method="post" action="CriarComentário.php">
                        <input type="hidden" name="postId" value="<?php echo $row['POST_ID']; ?>">
                        <div class="input-box">
                            <input type="text" name="conteudo_C" placeholder="Comente aqui" required>
                            <i class='bx bxs-comment'></i>
                        </div>
                        <button type="submit" name="submit_comment" class="btn">Enviar</button>                        
                    </form><br>
                    <ul class="comments" id="comments_<?php echo $row['POST_ID']; ?>">
                        <?php
                        $postId = $row['POST_ID'];
                        $slct_coment = "SELECT c.*, u.NOME, u.SOBRENOME FROM COMENTARIO c JOIN USUARIO u ON c.USER_ID = u.USER_ID WHERE c.POST_ID = '$postId'";
                        $result_coment = $conn->query($slct_coment);

                        if ($result_coment->num_rows > 0) {
                            while ($row_coment = $result_coment->fetch_assoc()) {
                                echo "<li>" . $row_coment['CONTEUDO'] . " - " . $row_coment['NOME'] . "</li>";
                            }
                        }
                        ?>
                    </ul>
                </article>
            <?php
                }
            }
            ?>
        </section>
    </div>
    <script>
        // Requisição AJAX para enviar comentários
        $(document).ready(function() {
            $('form').submit(function(e) {
                e.preventDefault(); // Previne a submissão padrão do formulário
                var form = $(this);
                var postId = form.find('input[name="postId"]').val();
                var conteudo_C = form.find('input[name="conteudo_C"]').val();

                $.ajax({
                    type: "POST",
                    url: "CriarComentário.php",
                    data: {
                        postId: postId,
                        conteudo_C: conteudo_C,
                        submit_comment: true // Para identificar que o comentário está sendo enviado
                    },
                    success: function(response) {
                        $('#comments_' + postId).append('<li>' + conteudo_C + ' - Você</li>');
                        form.find('input[name="conteudo_C"]').val(''); // Limpa o campo de texto
                    },
                    error: function(xhr, status, error) {
                        alert("Houve um erro ao enviar o comentário. Tente novamente.");
                    }
                });
            });
        });
    </script>
</body>
</html>
