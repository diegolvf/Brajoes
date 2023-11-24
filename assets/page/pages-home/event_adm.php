<?php
    //configuração do banco de dados
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "brajoes";

    //conexão com o banco de dados usando PDO
    try {
        $pdo = new PDO("mysql:host=$servername;dbname=$dbname;", $username,$password);

    //configuração adicional para relatar erro do PDO
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        die("Erro ao conectar com o banco de dados:  " . $e->getMessage());
    }
    
    if ($_SERVER["REQUEST_METHOD"] == "POST"){

        //pegar informações do formulário
        $imagem = $_FILES["imagem"]["name"];
        $title = $_POST["title"];
        $cont = $_POST["cont"];
        $pais = $_POST["pais"];
        $uf = $_POST["uf"];
        $cidade = $_POST["cidade"];
        $bairro = $_POST["bairro"];
        $endereco = $_POST["endereco"];
        $numEndereco = $_POST["numEndereco"];
        $dma = $_POST["dma"];

    try {
        $pdo = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Move o arquivo enviado para a pasta de destino
        $uploadDir = "C:/xampp/htdocs/Brajoes2.0/brajoes/BancoImgEvent/"; // Substitua pelo caminho desejado
        $uploadFile = $uploadDir . basename($imagem);

        if (move_uploaded_file($_FILES["imagem"]["tmp_name"], $uploadFile)) {
            // Insere o novo carro no banco de dados
            $query = "INSERT INTO eventos (imagem, title, cont, pais, uf, cidade, bairro, endereco, numEndereco, dma) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt = $pdo->prepare($query);
            $stmt->execute([$imagem, $title, $cont, $pais, $uf, $cidade, $bairro, $endereco, $numEndereco, $dma]);

            echo "Evento adicionado com sucesso.";

            // Redirecionar para a página principal
            ?>
            <script>
                setTimeout(function(){
                    window.location.href = "event-adm.php";
                }, 2000)
            </script>
            <?php
            exit();
        } else {
            echo "Erro ao mover o arquivo carregado.";
        }
    } catch(PDOException $e){
        echo "Erro ao adicionar o usuário: " . $e->getMessage();
    }
}
?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src=".//tinymce/tinymce.min.js"></script>
    <title>Document</title>
</head>
<style>
    *{
        margin: 0;
        padding: 0;
    }
    h3{
        margin: 15px;
    }
    .container-event{
        font-family: Arial, Helvetica, sans-serif;
        background-color: whitesmoke;
        text-align: center;
        width: 1300px;
        margin: 30px 30px 30px 300px;
        padding: 10px;
        display: flex;
        justify-content: space-around;
    }
    .event-global{
        display: flex;
        flex-direction: column;
        justify-content: center;
    }
    .event-img{
        padding-bottom: 20px;
        display: flex;
        flex-direction: column;
        align-items: center;
    }
    .title-global{
        display: flex;
        flex-direction: column;
        align-items: center;
        padding-bottom: 30px;
    }
    #title{
        width: 400px;
        height: 20px;
    }
    .content-global{
        display: flex;
        flex-direction: column;
        padding-bottom: 30px;
        width: 60vh;
        height: 60vh;
    }
    .event-conf{
        width: 500px;
    }
    .event-button{
        margin-left: 250px;
        width: 100px;
        height: 50px;
        border-radius: 7px;
    }
    .event-button:hover{
        cursor: pointer;
        background-color: white;
    }
    .CONT-global{
        display: flex;
        flex-direction: column;
        align-items: center;
    }
    .PEC-global{
        display: flex;
        justify-content: center;
        padding: 10px;
        gap: 20px;
    }
    .BEN-global{
        display: flex;
        justify-content: center;
        padding: 10px;
        gap: 20px;
    }
    #cont{
        display: flex;
        width: 500px;
        height: 300px;
        max-width: 500px;
        max-height: 300px;
    }
    .DMA-global{
        display: flex;
        justify-content: center;
        padding: 10px;
        gap: 20px;
        padding-bottom: 20px;
    }
</style>
<body>
    <div class="container-event">
        <form method="POST" enctype="multipart/form-data">
            <div class="event-global">
                <h1>Cria Evento</h1>
                    <h3>Banner Do Evento</h3>
                    <div class="event-img"> 
                        <input type="file" name="imagem" id="imagem">
                    </div>
                    <h3>Titulo do Evento</h3>
                    <div class="title-global">
                        <input type="text" name="title" id="title" placeholder=" Crie o título do evento aqui... ">
                    </div>
                    <h3>Conteudo</h3>
                    <div class="CONT-global">
                        <textarea name="cont" id="cont" placeholder=" Digite o seu texto aqui..."></textarea>
                    </div>

                    <h3>Local Do Evento</h3 >
                    <div class="PEC-global">
                        <input type="text" name="pais" id="pais" placeholder=" PAIS...">

                        <input type="text" name="uf" id="uf" placeholder=" ESTADO...">

                        <input type="text" name="cidade" id="cidade" placeholder=" CIDADE...">
                    </div>
                    <div class="BEN-global">
                        <input type="text" name="bairro" id="bairro" placeholder=" BAIRRO...">

                        <input type="text" name="endereco" id="endereco" placeholder=" ENDEREÇO...">

                        <input type="text" name="numEndereco" id="numEndereco" placeholder=" NÚMERO...">
                    </div>
                    <h3>Data</h3 >
                    <div class="DMA-global">
                        <input type="date" name="dma" id="dma"?>'>
                    </div>
                    <input type="submit" class="event-button" value="Criar Evento">
            </div>
        </form>
    </div>
</body>
</html>