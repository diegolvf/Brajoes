<?php
include('db_connection.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $newNickname = $_POST['newNickname'];

    // Atualiza o valor do nickname no banco de dados
    $updateSql = "UPDATE members SET nicknames='$newNickname' WHERE email='$email'";
    $updateResult = mysqli_query($conn, $updateSql);

    if ($updateResult) {
        echo json_encode(['success' => true, 'message' => 'Nickname atualizado com sucesso']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Erro ao atualizar o nickname: ' . mysqli_error($conn)]);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Método não permitido']);
}

mysqli_close($conn);
?>
