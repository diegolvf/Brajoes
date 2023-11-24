<?php
// Conexão com banco de dados
include('db_connection.php');

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Erro na conexão com o banco de dados: " . $conn->connect_error); //Destrói a conexão com o banco de dados.
}

// Consulta SQL para buscar os posts através do método SELECT
$sql = "SELECT * FROM posts ORDER BY date DESC";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/select_post.css">
    <link rel="stylesheet" href="./css/header.css">
    <link rel="stylesheet" href="./css/footer.css">
    <link href="https://fonts.cdnfonts.com/css/poppins" rel="stylesheet">
    <link rel="icon" type="image/png" sizes="48x48" href="./img/favicon.ico">
    <link href="https://fonts.cdnfonts.com/css/poppins" rel="stylesheet">
    <script src="./js/delete_post_confirm.js" defer></script>
    
    <title>Select Posts</title>
</head>
<body>
    <header class="active">
        <img id="logo-post" src="./img/logo.png" alt="Logo Brajoes página de edição posts">
        <nav>
            <div class="menu-toggle">
                <span id="span-1"></span>
                <span id="span-2"></span>
                <span id="span-3"></span>
            </div>

            <ul>
                <li><a href="../index.php" target="_blank">HOME</a></li>
                <li><a href="./welcome.php" target="_blank">ADMINISTRADOR</a></li>
            </ul>
        </nav>
    </header> 
    <main>
        <div class = "post-container">
            <div id = "introducao">
                <h1>Seção de Edição de Posts</h1>
                <p>Aqui você poderá visualizar e editar o conteúdo das postagens do site.</p>
            </div>
            <?php
                if ($result->num_rows > 0) {;
                    while ($row = $result->fetch_assoc()) {

                        //Container com as informações do posts.

                        echo "<div class='post'>"; //Início do container com as informações do posts.
                        
                            //Exibe o título do post.
                            echo "<h2 class='title'>" . $row["title"] . "</h2>";

                            //Exibe a data e horáio da criação do post. 
                            echo "<p class='date'>Data de Criação: " . date('d/m/Y H:i:s', strtotime($row["date"])) . "</p>";
                            
                            //Exibe o conteúdo dos posts.
                            echo "<div class='content'>" . $row["content"] . "</div>";
                                
                            //Início do container dos botões edit e delete do post.
                            
                            echo "<div class='button-container'>"; //início do container dos botões.

                                    echo "<a href='edit_post.php?id=" . $row["id"] . "'><button class='button_edit'>Edit Post</button></a>";

                                    echo "<a href='javascript:void(0);' onclick='confirmDelete(" . $row["id"] . ")'><button class='button_delete'>Delete Post</button></a>";

                            echo "</div>"; //fim do container dos botões.

                        echo "</div>"; //Fim do container com as informações dos posts. 

                        //Linha separatória de post
                        echo "<hr>";
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
    <?php include "footer.php";?>
</body>
<script src="./js/menu-toggle.js"></script> <!--Script de ação do menu mobile (hambúrguer)-->
</html>