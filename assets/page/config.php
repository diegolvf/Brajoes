<?php 

    //configuração banco de dados
    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "brajoes";

    // conexão banco de dados
    try {
        $pdo = new PDO("mysql:host=$host;dbname=$database", $username, $password);
        //configuração adicional para adicional para relatar erro do pdo
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    } catch(PDOException $e) {
        die("Erro ao conectar o banco de dados ". $e -> getMessage());
    }


?>