<?php 

session_start();
session_destroy();

//Redirecionar para a página de login após o logout
header("Location: login.php");
exit();


?>