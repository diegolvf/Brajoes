<?php
// inicia a sessão.
include('./page/config.php');

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/welcome.css"> 
    <title>Bem-Vindo</title>
    <style>



    </style>    
</head>
<body>

<header class="header-welcome">
  <div class="header-wel">
       
  <h1>Bem-Vindo, <?php echo isset($_SESSION['username']) ? $_SESSION['username'] : "Laerte"; ?></h1>
  </div>

  <a href="../index.php" target="_blank">
      <img class="logo_welcome" src="./img/logo.png" alt="logo">
    </a>

  <h2>Hoje, <?php echo isset($_SESSION['hoje']) ? $_SESSION['hoje'] : date("d/m/Y"); ?></h2>

  
</header>
            
<section class="hero-section">
    <div class="card-grid" target="_blank">
      <a class="card" href="#">
        <div class="card__background" style="background-image: url(./img/img-post.png)"></div>
        <div class="card__content">
          <h3 class="card__heading">Criação da postagem</h3>
          <div class="card__buttons">
            <button onclick="window.open('./form_post.html', '_blank')">Criar Post</button>
            <button onclick="window.open('./form_post.html', '_blank')">Criar Event</button>
          </div>
      </div>
      </a>
      <a class="card" href="#" target="_blank">
        <div class="card__background" style="background-image: url(./img/img-edicao.png)"></div>
        <div class="card__content">
          <h3 class="card__heading">Edição de Postagem</h3>
          <div class="card__buttons">
            <button onclick="window.open('./select_post.php', '_blank')">Edição Post</button>
            <button onclick="window.open('./select_post.php', '_blank')">Edição Event</button>
          </div>        
        </div>
      </a>
      <a class="card" href="./post-view.php" target="_blank">
        <div class="card__background" style="background-image: url(./img/help-brajoes.png)"></div>
        <div class="card__content">
          <h3 class="card__heading">View postagem</h3>
        </div>
      </li>
      <a class="card" href="./list-members.php" target="_blank">
        <div class="card__background" style="background-image: url(./img/img-members.png)"></div>
        <div class="card__content">
          <h3 class="card__heading">Listagem de membros</h3>
        </div>
      </a>
    <div>
  </section>

  <footer class="footer">
    <a class="button button-logout" href="./page/logout.php">Logout</a>
  </footer>

  
</body>
</html>

