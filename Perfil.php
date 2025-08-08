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
        <link rel="stylesheet" href="navbar.css">
        <?php 
        $select_perfil = "SELECT * FROM u210937242_usuario WHERE USER_ID =" . $_SESSION['id'];
        $resultado = $conn->query($select_perfil) or die("Falha na execução do código SQL: " . $conn->connect_error) ;
        $perfil = $resultado->fetch_assoc();
        ?>
    </head>
    <body>
        <header>
            <nav>
                <a class="logo" href="Home.php">Fórum</a>
                <div class="mobile-menu">
                    <div class="line1"></div>
                    <div class="line2"></div>
                    <div class="line3"></div>
                    <div class="line4"></div>
                </div>
                <ul class="nav-list">
                    <li><a href="Login.html">Início</a></li>
                    <li><a href="CriarPost.php">Criar Post</a></li>
                    <li class="search-bar">
                        <form action="buscar.php" method="get">
                            <input type="text" name="q" placeholder="Buscar..." aria-label="Pesquisar">
                            <button type="submit"><i class="bx bx-search"></i></button>
                </ul>
            </nav>
        </header>
        <main>
            <section>
                <div>
                    <label for="nome">Nome:</label>
                    <input id="nome" type="text" value='<?php echo $perfil['NOME']; ?>' disabled>
                </div>
                <div>
                    <label for="sobrenome">Sobrenome:</label>
                    <input id="nickname" type="text" value='<?php echo $perfil['SOBRENOME'];?>' disabled>
                </div>
                <div>
                    <label for="nickname">Usuário:</label>
                    <input id="nickname" type="text" placeholder='<?php echo $perfil['NICKNAME']; ?>'>
                </div>
                <div>
                    <label id="senha" for="senha">Senha:</label>
                    <input id="senha" type="text" placeholder="Senha">
                </div>
                <div>
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
            <section>
                <h2>Suas postagens</h2>
                <?php
                $slct = "SELECT p.*, u.NOME, u.SOBRENOME FROM u210937242_posts p JOIN u210937242_usuario u ON p.USER_ID = u.USER_ID WHERE P.USER_ID = " . $_SESSION['id'];
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
                                <input type="text" name="conteudo_C" placeholder="Comente aqui" required>
                                <input type="submit" value="Enviar">
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
    </body>
</html>