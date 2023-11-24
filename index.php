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
$sql = $conn->query("SELECT * FROM eventos ORDER BY dma DESC LIMIT 1");
$evento = $sql->fetchAll(PDO::FETCH_ASSOC);

?>



<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/css-inicial/style.css">
    <link rel="stylesheet" href="./assets/css/css-inicial/jie.css">
    <link rel="stylesheet" href="./assets/css/css-inicial/lightbox.css">
    <link rel="stylesheet" href="./assets/css/event.css">
    <link rel="stylesheet" href="./assets/css/footer.css">
    <link rel="stylesheet" href="./assets/css/header.css">
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Montserrat&amp;display=swap"rel="stylesheet'>
    <link rel='stylesheet' href= https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css>
    <link rel="shortcut icon" type="imagex/png" href="..//icon/favicon.ico">

    <title>BRAJOES</title>
</head>
<body >
    
    <?php include "./assets/header.php";?>

    <div id="popup">
        <h2>VOCÊ CURTE O BRAJOES?</h2>
        <p>Seja um apoiador do nosso fã clube! Sua doação nos ajuda a manter nossa paixão viva. Contribua hoje!<br>
            PIX - brajoesfãclube@gmail.com</p>
            <a href="#" onclick="toggle()">FECHAR</a>
    </div>
    <div id="blur">
        
        
        
        
        <section class="home">
        <div><img class="background_img" src="./assets/img/brush/brush green 3.png" alt="background_img" ></div>
        <div class="home-content">
        <h1>YO JOE!</h1>
        <h3>Seja bem-vindo.</h3>
        <p>Bem-vindo à casa da nostalgia, aventura e camaradagem no universo G.I. Joe, Comandos em Ação e Falcon no Brasil.
            Somos mais do que um fã clube; somos uma família unida pelo amor compartilhado por essas
            três franquias icônicas que moldaram a infância e continuam a inspirar gerações.</p>
        <div class="btn-box">
            <a href="#">Cadastre-se</a>
        
        </div>
        </div>
        
        <div class="home-sci">
        <a href="https://www.facebook.com/groups/145357202311462/" target="_blank"><i class="fa-brands fa-facebook"></i></a>
        <a href="https://www.youtube.com/@canalbrajoes681" target="_blank"><i class="fa-brands fa-youtube"></i></a>
        <a href="https://www.instagram.com/yojoeoficial/" target="_blank"><i class="fa-brands fa-instagram"></i></a>
        </div>
        </section>
        <section id="sobrenos" class="about">
            <div class="content">
                <img src="./assets/img/brush/green brush 2.png">
                <div class="text">
                <h1>Sobre Nós</h1>
                <h5>Fã Clube Brasileiro — G.I.Joe, Comandos em Ação e Falcon.</h5>
                <p>No final dos anos de 1990, a vida de muitos jovens mudaria com o advento da internet, trazendo informações do mundo todo direto para a tela do computador e para as mentes sedentas por conhecimento, saudosismo e novidades!</p>
                    <p>Com a ajuda das ferramentas de busca, ainda incipientes, a Word Wide Web era um mar de oportunidades a ser explorado! Através do Altavista ou do Cadê? (o Google ainda estava em desenvolvimento) era possível encontrar coisas incríveis e se conectar a pessoas de várias partes do mundo. </p>
        
                    <button type="button" class="btn-contato"><a href="./assets/page/pages-home/sobre.html">Saiba Mais</a></button>
                </div>
            </div>
        </section>
        <section id="50anos" class="gie-section">
            <div class="content">
                <div id="gijoe" class="text">
                <h1>G.I. JOE 50 ANOS</h1>
                <h5></h5>
                <p>Quem tem mais ou menos a minha idade (sou da excelente safra de 1975), viveu uma época estranha chamada Anos 80.
                Foi uma época em que ainda sentíamos um pouco das loucuras dos anos 70 em vários movimentos culturais e uma época
                que começamos a absorver mais e mais da cultura dos EUA por conta de nosso alinhamento político,
                pois os governos militares ainda tinham tudo contra os comunistas da URSS.</p>
                <a href="./assets/page/pages-home/gijoe.html"><button type="button" >Veja mais</button></a>
                </div>
                <img class="gie-img" src="./assets/img/animate.gif">
            </div>
        </section>
        <!--
            evento
         -->
         <section class="about-evento">
            <?php foreach ($evento as $evento) : ?>
                <div class="container-event">
                    <div class="container-img-p">
                        <div class="img-view">
                            <img src="./assets/BancoImgEvent/<?php echo $evento['imagem']; ?>" alt="Banner">
                        </div>
                            <p for="date"> Dia Do Evento : <?php echo $evento['dma']; ?></p>
                        <div class="cont">
                                <p for="text">Rua: <?php echo $evento['endereco'] . "&nbsp;" . "N°" . $evento['numEndereco'] . "&nbsp;" . "&nbsp;"?></p>
                                <p for="text">Bairro: <?php echo $evento['bairro'] . "&nbsp;" . "&nbsp;"?></p>
                                <p for="text"><?php echo $evento['cidade'] . "/" . $evento['uf'] . "&nbsp;" . $evento['pais']?></p>
                        </div>
                    </div>
                    <div class="container-view">
                        <h1>EVENTOS</h1>
                            <h2 for="text"><?php echo $evento['title']?> </h1>
                            <p for="text"><?php echo $evento['cont']; ?></p>
                        <a href="./view_event.php"><button type="button">Veja mais</button></a>
                    </div>
                </div>
            <?php endforeach; ?>
        </section>
         <!-- final evento -->
        <!-- <div id="contato" class="contact-form">
            <h1>Nos contate.</h1>
            <div class="container">
                <div class="main">
                    <div class="content-form">
                        <h2>Envie uma mensagem.</h2>
                        <form action="#" method="post">
                        <input type="text" name="name" placeholder="Seu nome.">
                        <input type="email" name="email" placeholder="Seu email.">
                        <textarea name="message" placeholder="Digite sua mensagem."></textarea>
                        <button type="submit" class="btn">Enviar <i class="fas fa-paper-plane"></i></button>
                    </form>
                </div>
                <div class="form-img">
                    <img src="/brush/green brush.png" alt="">
                </div>
            </div>
        </div> -->
        
        </div>
        <!-- galeria -->
        <div class="galeria">
        <div class="gallery">
            <a href="./assets/img/galeria/img (1).jpg" data-lightbox="models" data-title="Legenda 1">
                <img src="./assets/img/galeria/img (1).jpg">
            </a>
            <a href="./assets/img/galeria/img (4).jpg" data-lightbox="models" data-title="Legenda 2">
                <img src="./assets/img/galeria/img (4).jpg">
            </a>
            <a href="./assets/img/galeria/img (2).jpg" data-lightbox="models" data-title="Legenda 3">
                <img src="./assets/img/galeria/img (2).jpg">
            </a>
            <a href="./assets/img/galeria/img (3).jpg" data-lightbox="models" data-title="Legenda 4">
                <img src="./assets/img/galeria/img (3).jpg">
            </a>
            <a href="./assets/img/galeria/img (7).jpg" data-lightbox="models" data-title="Legenda 5">
                <img src="./assets/img/galeria/img (7).jpg">
            </a>
            <a href="./assets/img/galeria/img (6).jpg" data-lightbox="models" data-title="Legenda 6">
                <img src="./assets/img/galeria/img (6).jpg">
            </a>
            <a href="./assets/img/galeria/img (15).jpg" data-lightbox="models" data-title="Legenda 7">
                <img src="./assets/img/galeria/img (15).jpg">
            </a>
            <a href="./assets/img/galeria/img (11).jpg" data-lightbox="models" data-title="Legenda 8">
                <img src="./assets/img/galeria/img (11).jpg">
            </a>
            <a href="./assets/img/galeria/img (14).jpg" data-lightbox="models" data-title="Legenda 8">
                <img src="./assets/img/galeria/img (14).jpg">
            </a>
            <a href="/imagens/galeria/img (19).jpg" data-lightbox="models" data-title="Legenda 8">
                <img src="./assets/img/galeria/img (19).jpg">
            </a>
        </div>
        </div>  
        
        <!-- fim galeria -->
        <div class="sponsor">
        <div class="sponsor-section">
            <h1>Nossos Patrocinadores</h1>
            <div class="sponsor-cards">
                <div class="card">
                    <img src="/imagens/galeria_falcon.jpg">
                    <h2>Patrocinador 1</h2>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit.</p>
                </div>
                <div class="card">
                    <img src="/imagens/galeria_falcon.jpg">
                    <h2>Patrocinador 2</h2>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit.</p>
                </div>
                <div class="card">
                    <img src="/imagens/galeria_falcon.jpg">
                    <h2>Patrocinador 3</h2>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit.</p>
                </div>
            </div>
        </div>
        </div>
    

    <!-- footer -->

    <?php include "./assets/footer.php";?>

    <!-- fim footer -->

    <script src="./assets/js/lightbox-plus-jquery.js"></script>
    <script type="text/javascript" src="./assets/js/poup.js"></script>
</div>
</body>
</html>