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
    <link rel="stylesheet" href="css_home.css">
    <link rel="stylesheet" href="navbar.css">
    <script src="ScriptNavbar.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css">
</head>

<body>
    <header class="header">
        <a href="Home.php" class="logo">Fórum1</a>
        <nav class="navbar">
            <a class='link_navbar' href="Home.php">Home</a>
            <a class='link_navbar' href="Login.html">Entrar</a>
            <a class='link_navbar' href="CriarPost.php">Criar Post</a>
            <a class='link_navbar' href="Logout.php">Sair</a>
        </nav>
    </header>

    <!-- SEÇÃO DE POSTS -->
    <section>
        <h2>Últimas postagens</h2>
        <?php
        $slct = "SELECT p.*, u.NOME, u.SOBRENOME FROM u210937242_posts p JOIN u210937242_usuario u ON p.USER_ID = u.USER_ID";
        $result = $conn->query($slct);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
        ?>
                <article>
                    <div class="TituloPost">
                        <h3><?php echo $row['TITULO']; ?></h3>
                        <div class="data"><?php echo $row['DATA_PUBLICACAO'] ?></div>
                    </div>
                    <div class="ImagemAnexo">
                        <?php 
                        $CaminhoImagem = "Imagens/" . $row['ANEXOS'];
                        if (file_exists("Imagens/" . $row['ANEXOS'])) {
                            echo "<img class='ImagemAnexos' src='$CaminhoImagem' alt='Imagem'>";
                        };
                        ?>
                    </div>
                    <p><?php echo $row['CONTEUDO']; ?></p>
                    <p>Autor: <?php echo $row['NOME'] . " " . $row['SOBRENOME']; ?></p>
                    <form method="post" action="CriarComentário.php">
                        <input type="hidden" name="postId" value="<?php echo $row['POST_ID']; ?>">
                        <input type="text" name="conteudo_C" placeholder="Comente aqui">
                        <input type="submit" name="submit_comment" value="Enviar">
                    </form><br>
                    <!-- SEÇÃO DE POSTS -->
                    <ul class="comments" id="comments_<?php echo $row['POST_ID']; ?>">
                        <!-- SEÇÃO DE COMENTÁRIOS -->
                        <?php
                        $postId = $row['POST_ID'];
                        $slct_coment = "SELECT c.*, u.NOME, u.SOBRENOME FROM u210937242_comentario c JOIN u210937242_usuario u ON c.USER_ID = u.USER_ID WHERE c.POST_ID = '$postId'";
                        $result_coment = $conn->query($slct_coment);

                        if ($result_coment->num_rows > 0) {
                            while ($row_coment = $result_coment->fetch_assoc()) {
                                echo "<li>" . $row_coment['CONTEUDO'] . " - " . $row_coment['NOME'] . "</li>";
                            }
                        }
                        ?>
                    </ul>
                    <!-- SEÇÃO DE COMENTÁRIOS -->
                </article>
        <?php
            }
        }
        ?>
    </section>
    <div class="overlay" id="overlay">
            <img src="" alt="Imagem Ampliada" id="zoomedImage">
    </div>
    <script>
        const images = document.querySelectorAll('.ImagemAnexos');
        const overlay = document.getElementById('overlay');
        const zoomedImage = document.getElementById('zoomedImage');

        images.forEach(image => {
            image.addEventListener('click', () => {
                zoomedImage.src = image.src;
                overlay.style.display = 'flex';
            });
        });

        overlay.addEventListener('click', () => {
            overlay.style.display = 'none';
        });
        $(document).ready(function() {
            $('form').submit(function(e) {
                e.preventDefault();
                var form = $(this);
                var postId = form.find('input[name="postId"]').val();
                var conteudo_C = form.find('input[name="conteudo_C"]').val();

                $.ajax({
                    type: "POST",
                    url: "CriarComentário.php",
                    data: {
                        postId: postId,
                        conteudo_C: conteudo_C,
                        submit_comment: true
                    },
                    success: function(response) {
                        $('#comments_' + postId).append('<li>' + conteudo_C + ' - Você</li>');
                        form.find('input[name="conteudo_C"]').val('');
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