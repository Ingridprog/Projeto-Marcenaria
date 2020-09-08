<?php

require_once('../config.php');
require_once('../models/Autenticacao.php');

$email = filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL);
$senha = filter_input(INPUT_POST, "senha");

if($email && $senha){
     $autenticacao = new Autenticacao($pdo, $base);
     if($autenticacao->validarLogin($email, $senha)){
          header('Location:'.$base);
     }
}

header('Location: '.$base.'/views/pages/login.php');
     

?>