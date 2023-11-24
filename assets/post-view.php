<?php
// Conexão com banco de dados
include('db_connection.php');

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Erro na conexão com o banco de dados: " . $conn->connect_error);
}

// Consulta SQL para buscar os posts
$sql = "SELECT * FROM posts ORDER BY date DESC";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/post-view.css">
    <link rel="stylesheet" href="./css/footer.css">
    <link href="https://fonts.cdnfonts.com/css/poppins" rel="stylesheet">
    <link rel="icon" type="image/png" sizes="48x48" href="./img/favicon.ico">
    <title>Página de Posts</title>
</head>
<body>
    <header class="active">
        <img id="logo-post" src="./img/logo.png" alt="Logo Brajoes página de edição posts">
        <nav>
            <div class="menu-toggle">
                <span id="span-1"></span> <!--Spans (linhas) que formam os três tracinhos e o X do menu mobile-->
                <span id="span-2"></span> <!--Spans (linhas) que formam os três tracinhos e o X do menu mobile-->
                <span id="span-3"></span> <!--Spans (linhas) que formam os três tracinhos e o X do menu mobile-->
            </div>

            <ul>
                <li><a href="../index.php" target="_blank">HOME</a></li>
                <li><a href="#" onclick="toggle()"> APOIE-ME</a></li>
                <li><a href="./assets/page/cadastro.php" target="_blank">CADASTRO</a></li>
                <li><a href="./assets/page/login.php" target="_blank">LOGIN</a></li>
                <li><a href="#footer" target="_blank">CONTATO</a></li>
            </ul>
        </nav>
    </header> 
    <main>
        <div class = "post-container">
            <div id = "introducao">
                <h1>Seja Bem Vindo a Seção de Posts</h1>
                <p>Aqui você poderá encontrar conteúdo relevante sobre o universo dos G.I.Joes, Comandos em Ação, Falcon, Action Figures e muito mais!</p>
                <p>Não deixe de conferir as novidades, notícias e curiosidades de todo o universo G.I.Joe!</p>
            </div>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {

                     //Container com as informações dos posts.
                    
                    echo "<div class='post'>"; //Início do container com as informações do posts.

                        //Exibe o título do post.
                        echo "<h2 class='title'>" . $row["title"] . "</h2>";


                        //Exibe a data e horáio da criação do post.
                        echo "<p class='date'>Data de Criação: " . date('d/m/Y H:i:s', strtotime($row["date"])) . "</p>";

                        //Exibe o conteúdo dos posts.
                        echo "<div class='content'>" . $row["content"] . "</div>";
                        
                    echo "</div>"; //Fim do container com as informações dos posts.
                    
                    echo "<hr>"; //Linha separatória de post
                }
            } else {
                echo "Nenhum post encontrado."; //Se a consulta não retornar nenhum resultado.
            }
            ?>
            <?php
            $conn->close(); //Fechando a conexão com o banco de dados.
            ?>
        </div>
    </main>
    <?php include "../assets/footer.php";?>
</body>
<script src="./js/menu-toggle.js"></script> <!--Script de ação do menu mobile (hambúrguer)-->
</html>