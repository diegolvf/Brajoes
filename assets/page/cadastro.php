<?php
// Verifica se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    // Obtém as informações do formulário
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $fullname = isset($_POST['nome']) ? $_POST['nome'] : '';
    $country = isset($_POST['country']) ? $_POST['country'] : '';
    $state = isset($_POST['state']) ? $_POST['state'] : '';
    $city = isset($_POST['city']) ? $_POST['city'] : '';
    $tel = isset($_POST['tel']) ? $_POST['tel'] : '';
    $news = isset($_POST['news']) ? 1 : 0;

    error_log("Nome: " . $fullname);
    error_log("Email: " . $email);
    // Conecta ao banco de dados
    require_once "../db_connection.php";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // INSERE O NOVO USUÁRIO NO BANCO DE DADOS
        $query = "INSERT INTO members (nome, email, country, state, city, tel, news, membro_premium, nicknames) VALUES (?, ?, ?, ?, ?, ?, ?, '', 'membro')";
        $stmt = $conn->prepare($query);
        $stmt->execute([$fullname, $email, $country, $state, $city, $tel, $news]);

        if ($news == 1) {
            echo "Você deseja receber as novidades por email!";
        } else {
            echo "Você não quer receber novidades por email...";
        }

        echo "Usuário cadastrado com sucesso.";
        // Redireciona para a página principal
        echo "<script>
            setTimeout(function() {
                window.location.href='index.php';
            },3000);
        </script>";

        exit();
    } catch (PDOException $e) {
        echo "Erro ao adicionar o usuário: " . $e->getMessage();
        die('Erro!');
    }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Brajoes cadastra-se</title>
    <link href="../css/cadastro.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Black+Ops+One&display=swap" rel="stylesheet">
    <link rel="shortcut icon" type="imagex/png" href="./icon/favicon.ico">
  
    
</head>
<body>

<header class="header_cadastro">
    <a href="../../index.php" class="btn__voltar">Voltar</a>
</header>

<section class="session-members">
        <div class="container-membro">
            <h1>Brajoes</h1>
            <p>seja membro !! faça parte da equipe</p>
            <img src="../img/img-ninja-gijoe.png" alt="Imagem" />
        </div>

        <div class="form-container">

            <form class="form" method="post" action="">
                <label for="nome">Nome Completo: </label>
                <input type="text" name="nome" placeholder="Seu nome..." />

                <label for="email">E-mail: </label>
                <input type="email" name="email" placeholder="Digite seu email..." />

                <!-- paises -->
                
                <div class="select_option form-country">
                    <div>
                        <label for="nome">Pais: </label>  
                        <select class="form-select country" aria-label="Default select example" onchange="loadStates()">
                            <option selected>Selecione</option>
                        </select>
                    </div>
                    
                    <div>
                        <label for="nome">Estado: </label> 
                        <select class="form-select state" aria-label="Default select example" onchange="loadCities()">
                            <option selected>Selecione seu estado</option>
                        </select>
                    </div>                   
                    
                </div>
                
                <label for="nome">Cidade: </label> 
                <select class="form-select city" aria-label="Default select example">
                        <option selected>Select City</option>
                    </select>

                <label for="tel">Telefone: </label>
                <input type="text" name="tel" placeholder="Informe seu telefone..." />

                <div class="form-checkbox">
                    <input type="checkbox" name="news" id="newslater" />
                    <label for="newslater">Receba nossas novidades</label><br>
                </div>

                <div class="form-checkbox">
                    <input type="checkbox" name="terms" id="terms">
                    <label for="terms">Aceitar os termos</label><br>
                </div>                

                <button class="button" name="submit">Cadastrar</button>
            </form>
        </div>
    </section>
    
    <script src="../js/script.js"></script>
    <script src="../js/api.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


</body>
</html>