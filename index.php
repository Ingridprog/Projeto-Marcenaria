<?php

require_once "config.php";

require_once $base.'/models/Autenticacao.php';

$autenticacao = new Autenticacao($pdo, $base);
$autenticaInfo = $autenticacao->verificarToken();

header("location: views/pages/home.php");

// echo md5(time().rand(0, 9999));

// echo password_hash('123', PASSWORD_DEFAULT);

?>