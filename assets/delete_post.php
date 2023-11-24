<?php
// Verificar se o ID do post foi fornecido
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    // Conexão com o banco de dados
    include('db_connection.php');

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Erro na conexão com o banco de dados: " . $conn->connect_error);
    }

    // Evitar injeção de SQL usando prepared statements
    $postId = $conn->real_escape_string($_GET['id']);

    // Consulta SQL para excluir o post
    $sql = "DELETE FROM posts WHERE id = ?";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $postId);

    if ($stmt->execute()) {
        // Redirecionar de volta para a página de posts após excluir com sucesso
        header("Location: select_post.php");
        exit();
    } else {
        echo "Erro ao excluir o post: " . $conn->error;
    }

    $stmt->close();
    $conn->close();
} else {
    echo "ID inválido ou não fornecido.";
}
?>