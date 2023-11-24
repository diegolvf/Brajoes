<?php
// Configuração do banco de dados
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "brajoes";

// Conexão com o banco de dados
$conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Consulta para obter os produtos cadastrados
$sql = $conn->query("SELECT * FROM eventos ORDER BY dma DESC");
$evento = $sql->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="jie.css">
    <link rel="stylesheet" href="view_event.css">
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Montserrat&amp;display=swap"rel="stylesheet'>
    <link rel='stylesheet' href= https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css>
    <link rel="shortcut icon" type="imagex/png" href="..//icon/favicon.ico">
    <title>Teste</title>
</head>
<body>
    <header class="header">
        <a href="./index.php" class="logo">BRAJOES</a>
        <nav class="navbar">
        <a href="./sobre.html">SOBRE NÓS</a>
        <a href="#footer">CONTATO</a>
        <a href="./view_event.php">EVENTOS</a>
        <a href="#">LOGIN</a>
        </nav>
    </header>
    <main>
      <section>
      <h1 class="teste">TODOS EVENTOS</h1>  
          <?php foreach ($evento as $evento) : ?>
              <div class="container-event">
                  <div class="container-img-p">
                      <div class="img-view">
                          
                          <img src="../../BancoImgEvent/<?php echo $evento['imagem']; ?>" alt="Banner">
                      </div>
                          <p for="date"> Dia Do Evento : <?php echo $evento['dma']; ?></p>
                      <div class="cont">
                              <p for="text">Rua: <?php echo $evento['endereco'] . "&nbsp;" . "N°" . $evento['numEndereco']?></p>
                              <p for="text">Bairro: <?php echo $evento['bairro'] ?></p>
                              <p for="text"><?php echo $evento['cidade'] . "/" . $evento['uf'] . "&nbsp;" . $evento['pais']?></p>   
                      </div>   
                  </div>          
                  <div class="container-view">          
                      <h1>EVENTOS</h1>
                          <h2 for="text"><?php echo $evento['title']?> </h1>
                          <p for="text"><?php echo $evento['cont']; ?></p>
                  </div> 
              </div>
          <?php endforeach; ?>
      </section>
    </main>  
    
    <footer id="footer">
    <div class="footer-content">
      <div class="contato">
          <h2>Contato</h2>
          <ul>
            <li><a href="">brajoes@gmail.com</a></li>
          </ul>
          
        </div>
      
      <div>
          <h2>Informações</h2>
          <ul>
            <li><a href="">Politica de privacidade</a></li>
            <li><a href="">Termo de Uso</a></li>
          </ul>
        </div>
        
    <div class="redes-footer">
      <h2>Redes sociais</h2>
      <ul class="lista-sociais-footer">
        <li><a href=""><img src="./img/Img/LogoRedeSocial/Facebook.svg" alt="" srcset=""></a></li>
        <li><a href=""><img src="./img/Img/LogoRedeSocial/Instagram.svg" alt="" srcset=""></a></li>
        <li><a href=""><img src="./img/Img/LogoRedeSocial/Youtube.svg" alt="" srcset=""></a></li>
        <li><a href=""><img src="./img/Img/LogoRedeSocial/Tiktok.svg" alt="" srcset=""></a></li>
      </ul>
    </div>
  </div>
      <p class="copy">&copy; 2023 Brajoes. Todos os direitos reservados.</p>
      <span>✔ Desenvolvida pela turma de tecnico de informatica para internet / Senac-SOROCABA.</span>
  </footer>

    <script src="script.js"></script>

</body>
</html>
