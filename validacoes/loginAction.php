<?php

require_once('../config.php');
require_once("$base/models/Autenticacao.php");

$email = filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL);
$senha = filter_input(INPUT_POST, "senha");

if($email && $senha){
     $autenticacao = new Autenticacao($pdo, $base);
     if($autenticacao->validarLogin($email, $senha)){
          header("Location: ../views/pages/home.php");
          exit;
     }
}

$_SESSION['err'] = "Email e/ou senha incorretos!";
header('Location: ../views/pages/login.php');
exit;
     

?>