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
    <link rel="stylesheet" href="navbar.css">
    <link rel="stylesheet" href="css_home.css">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap">

</head>

<body>
    <header>
        <nav>
            <a class="logo" href="Home.php">Fórum</a>
            <div class="mobile-menu">
                <div class="line1"></div>
                <div class="line2"></div>
                <div class="line3"></div>
            </div>
            <ul class="nav-list">
                <li class="welcome-message"><strong>Bem vindo, <?php echo $_SESSION['nome']; ?></strong></li>
                <li><a href="Login.html">Início</a></li>
                <li><a href="CriarPost.php">Criar Post</a></li>
                <li><a href="Logout.php">Sair</a></li>
            </ul>
        </nav>
    </header>
    <main>
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
                            <div class="data"><?php echo $row['DATA_PUBLICACAO']; ?></div>
                        </div>
                        <div class="ImagemAnexo">
                            <?php
                            $CaminhoImagem = "Imagens/" . $row['ANEXOS'];
                            if (file_exists($CaminhoImagem)) {
                                echo "<img class='ImagemAnexos' src='$CaminhoImagem' alt='Imagem'>";
                            }else{echo ' ';};
                            ?>
                        </div>
                        <p><?php echo $row['CONTEUDO']; ?></p>
                        <p>Autor: <?php echo $row['NOME'] . " " . $row['SOBRENOME']; ?></p>
                        <form method="post" action="CriarComentario.php">
                            <input type="hidden" name="postId" value="<?php echo $row['POST_ID']; ?>">
                            <input type="text" name="conteudo_C" placeholder="Comente aqui">
                            <input type="submit" name="submit_comment" value="Enviar">
                        </form><br>
                        <!-- SEÇÃO DE COMENTÁRIOS -->
                        <ul class="comments" id="comments_<?php echo $row['POST_ID']; ?>">
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
                    </article>
            <?php
                }
            }
            ?>
        </section>
    </main>

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
                    url: "CriarComentario.php",
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
    <script src="mobile-navbar.js"></script>
</body>

</html>
