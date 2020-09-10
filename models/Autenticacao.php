<?php

require_once dirname(__FILE__)."/../config.php";
require_once $base.'/DAO/ResponsavelDao.php';

class Autenticacao
{
     private $pdo;
     private $base;

     public function __construct(PDO $pdo, $base)
     {
          $this->pdo = $pdo;
          $this->base = $base;
     }

     public function verificarToken()
     {
          if(!empty($_SESSION['token'])){
               $token = $_SESSION['token'];
               
               $responsavelDao = new ResponsavelDao($this->pdo);
               $responsavel = $responsavelDao->findByToken($token);

               if($responsavel){
                    return $responsavel;
               }
          }
          header("location: views/pages/login.php");
          exit;
     }

     public function validarLogin($email, $senha)
     {
          $responsavelDao = new ResponsavelDao($this->pdo);
          $responsavel = $responsavelDao->findByEmail($email);
          
          if($responsavel){
               if(password_verify($senha, $responsavel->senha)){
                    $token = md5(time().rand(0, 9999));
                    $_SESSION['token'] = $token;
                    $responsavel->token = $token;

                    $responsavelDao->update($responsavel);

                    return TRUE;
               }    
          }

          return FALSE;
     }
}

?>