<?php

// session_start();


//Verifica se o usuário já está logado
if(isset($_SESSION['user_id'])){
    //O usuário já está logado, redireciona para a página principal

   

    header("Location: ../welcome.php");
    exit();
}


?>