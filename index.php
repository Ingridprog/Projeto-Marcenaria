<?php

require_once('config.php');
require_once('models/Autenticacao.php');

$autenticacao = new Autenticacao($pdo, $base);
$autenticaInfo = $autenticacao->verificarToken();

header('location: views/pages/home.php');

?>