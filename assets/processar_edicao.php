<?php
include('db_connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validar e limpar os dados
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $membro_oficial = mysqli_real_escape_string($conn, $_POST["membro_oficial"]);
    $nickname = mysqli_real_escape_string($conn, $_POST["nickname"]);

    // Use prepared statement para prevenir injeção de SQL
    $updateQuery = "UPDATE members SET membro_oficial=?, nickname=? WHERE email=?";
    $stmt = mysqli_prepare($conn, $updateQuery);
    
    // Verifique se a preparação da consulta foi bem-sucedida
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "sss", $membro_oficial, $nickname, $email);
        $updateResult = mysqli_stmt_execute($stmt);

        if ($updateResult) {
            echo "Atualização bem-sucedida.";
        } else {
            echo "Erro na atualização: " . mysqli_error($conn);
        }

        // Feche o statement após o uso
        mysqli_stmt_close($stmt);
    } else {
        echo "Erro na preparação da consulta: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>
