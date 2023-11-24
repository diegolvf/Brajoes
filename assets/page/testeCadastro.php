<?php
// Verifica se o formulário foi submetido 
if($_SERVER["REQUEST_METHOD"]== "POST" && isset($_POST['submit'])){
    // Obtém as informações do formulário
    $email = $_POST['email'];
    $fullname = $_POST["nome"];
    $country = $_POST['country'];
    $state = $_POST['state'];
    $city = $_POST['city'];
    $tel = $_POST['tel'];
    $news = isset($_POST['news']) ? 1 : 0; // Alteração feita aqui

    // Conecta ao banco de dados
    require_once "config.php";

    try {
        $pdo = new PDO("mysql:host=$host;dbname=$database", $username, $password);
        // Configuração adicional para relatar erro do PDO
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // INSERE O NOVO USUÁRIO NO BANCO DE DADOS
        $query = "INSERT INTO members (nome, email, country, state, city, tel, news) VALUES(?, ?, ?, ?, ?, ?, ?)";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$fullname, $email, $country, $state, $city,$tel, $news]);

        if($news == 1)
        {
            echo "Você deseja receber as novidades por email!";
        }
        else
        {
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
    } catch(PDOException $e){
        echo "Erro ao adicionar o usuário: ". $e->getMessage();
    }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Brajoes cadastra-se</title>
    <link href="../css/signup.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Black+Ops+One&display=swap" rel="stylesheet">
</head>
<body>

<section class="session-members">
        <div class="container-membro">
            <h1>Brajoes</h1>
            <p>seja membro !! faça parte do equipe</p>
            <img src="../img/image.png" alt="Imagem" />
        </div>

        <div class="form-container">
            <form class="form" method="post" action="">
                <label for="nome">Nome Completo: </label>
                <input type="text" name="nome" placeholder="Seu nome..." />

                <label for="email">E-mail: </label>
                <input type="email" name="email" placeholder="Digite seu email..." />

                <!-- paises -->
                <div class="form-country">
                    <div>
                        <label for="country">País: </label>
                        <select name="country" id="country" onchange="populateStates(this.value)">
                            <option value="">Selecione o país</option>
                            <option value="AR">Argentina</option>
                            <option value="BO">Bolívia</option>
                            <option value="BR">Brasil</option>
                            <option value="CL">Chile</option>
                            <option value="CO">Colômbia</option>
                            <option value="EC">Equador</option>
                            <option value="GY">Guiana</option>
                            <option value="PY">Paraguai</option>
                            <option value="PE">Peru</option>
                            <option value="SR">Suriname</option>
                            <option value="UY">Uruguai</option>
                            <option value="VE">Venezuela</option>
                        </select>
                    </div>

                    <div>
                        <label for="state">Estado: </label>
                        <select name="state" id="state" onchange="populateCities(this.value)">
                            <option value="">Selecione o estado</option>
                            <!-- As opções de estado serão preenchidas dinamicamente pelo JavaScript -->
                        </select>
                    </div>
                </div>

                <label for="city">Cidade: </label>
                <input type="text" name="city">

                <label for="tel">Telefone: </label>
                <input type="text" name="tel" placeholder="Informe seu telefone..." />

                <div class="form-checkbox">
                    <input type="checkbox" name="news" id="newslater">
                    <label for="newslater">Receba nossas novidades</label><br>
                </div>

                <div class="form-checkbox">
                    <input type="checkbox" name="terms" id="terms">
                    <label for="terms">Aceitar os riscos</label><br>
                </div>

                <button type="submit" name="submit">Cadastrar</button>
            </form>
        </div>
    </section>
    <script src="../js/script.js"></script>

</body>
</html>
