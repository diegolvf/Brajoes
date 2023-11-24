<?php
// Verificação de envio usando o método POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include('db_connection.php');

        // Validação de entrada e prevenção contra injeção de SQL
        $conn = new mysqli($servername, $username, $password, $dbname);
    
        if ($conn->connect_error) {
            die("Erro na conexão com o banco de dados: " . $conn->connect_error);
        }
    
        // Obtenha os dados do formulário
        $title = $_POST["title"];
        $content = $_POST["content"]; // Substituí "text" por "content"
    
        // Validação de entrada: Verifica se os campos não estão vazios.
        if (empty($title) || empty($content)) {
            echo "Todos os campos são obrigatórios.";
            exit;
        }
    
        // Inserir no banco de dados
        $stmt = $conn->prepare("INSERT INTO posts (date, title, content) VALUES (NOW(), ?, ?)");
        $stmt->bind_param("ss", $title, $content);
    
        // Executa a instrução preparada para prevenir a injeção de SQL.
        if ($stmt->execute()) {
            echo "Post criado com sucesso!";
        } else {
            echo "Erro ao criar o post: " . $conn->error;
        }
        $stmt->close();
    
        // Feche a conexão com o banco de dados
        $conn->close();
    } else {
        echo "Acesso inválido ao script.";
    }
    header('location:post-view.php')
    ?>