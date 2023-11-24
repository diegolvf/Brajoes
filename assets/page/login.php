<?php 
    session_start();
    require_once "verificalogin.php";

   require_once "config.php";

    // conexão banco de dados
    try {
        $pdo = new PDO("mysql:host=$host;dbname=$database", $username, $password);
        //configuração adicional para relatar erro do pdo
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    } catch(PDOException $e) {
        die("Erro ao conectar o banco de dados ". $e->getMessage());
    }


    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $username = $_POST["username"];
        $password = $_POST["password"]; 

        //consulta o banco de dados para verificar o usuário 

        $query = "SELECT * FROM users WHERE username = :username";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(":username", $username);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if($user){
            //verifica se a senha está correta
            if($password == $user["password"]){
                //Autenticação bem-sucedida
                
                $profile = $user["profile"];

                if($profile == "admin"){
                    echo "Autenticação bem sucedida com perfil admin";
                    //Armazernar as informações de login de sessão
                    $_SESSION["user_id"] = $user["id"];
                    $_SESSION["username"] = $user["username"];
                    $_SESSION["profile"] = $user["profile"];

                    //espera 3 segundos para redirecionar 

                    echo '<script>setTimeout(function(){ window.location.href="../welcome.php"; }, 3000);</script>';
                    exit();
                } 
            } else {
                //senha inválida
                echo "Credenciais inválidas. Tente novamente";
            }
        } else {
            //Usuário não encontrado
            echo "Credenciais inválidas. Tente novamente";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/login.css" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Black+Ops+One&display=swap" rel="stylesheet">
    <link rel="shortcut icon" type="imagex/png" href="./icon/favicon.ico">
    <title>Login Brajoes</title>
    
</head>
<body>

<header>
    <a href="../../index.php" class="btn__voltarLogin">Voltar</a>
</header>

<section class="session">
    <div class="form-container">
        <form action="" class="form" method="post"> <!-- Adicionado method="post" -->
            <h1>BEM VINDO.</h1>

            <label for="">USUARIO: </label>
            <input type="text" name="username" placeholder="seu nome..." /> <!-- corrigido para 'username' -->

            <label for="">SENHA: </label>
            <input type="password" name="password" placeholder="sua senha..." /> <!-- corrigido para 'password' -->

            <button type="submit" class="slide" class="">LOGIN</button>
        </form>
    </div>

    <img class="img-login" src="../img/imagelogin.png" />
</section>
     
</body>
</html>