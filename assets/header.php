<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Header</title>
    <!-- Adicione uma tag <style> ou <link> para estilos CSS -->
    <style>
        /* Adicione seus estilos CSS aqui */
    </style>
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
                <li><a href="#" onclick="toggle()"> APOIE-ME</a></li>
                <li><a href="./assets/page/cadastro.php" target="_blank">CADASTRO</a></li>
                <li><a href="./assets/post-view.php" target="_blank">BLOG</a></li>
                <li><a href="./assets/page/login.php" target="_blank">LOGIN</a></li>
                <li><a href="#footer" target="_blank">CONTATO</a></li>
            </ul>
        </nav>
    </header> 
</body>
</html>
