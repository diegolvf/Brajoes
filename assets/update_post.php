<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include('db_connection.php');

    // Verifique e limpe os dados do formulário
    $id = $_POST['id'];
    $title = $_POST['title'];
    $content = $_POST['content'];

    // Verifique se os dados não estão vazios
    if (empty($title) || empty($content)) {
        echo "O título e o conteúdo não podem estar vazios.";
    } else {
        // Atualize os dados no banco de dados
        $stmt = $conn->prepare("UPDATE posts SET title=?, content=? WHERE id=?");
        $stmt->bind_param("ssi", $title, $content, $id);

        if ($stmt->execute()) {
            // Redirecione para post-view.php
            header("Location: select_post.php");
            exit;
        } else {
            echo "Erro ao atualizar o post: " . $conn->error;
        }
        $stmt->close();
    }
    $conn->close();
}
?>