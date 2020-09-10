<?php

require_once dirname(__FILE__)."/../config.php";
require_once $base."/interfaces/ResponsavelDAO.php";
require_once $base.'/models/Responsavel.php';


class ResponsavelDao implements DAOResponsavel
{
     private $pdo;

     public function __construct(PDO $pdo)
     {
          $this->pdo = $pdo;
     }

     private function gerarResponsavel($arr)
     {
          $responsavel = new Responsavel();
          $responsavel->id = $arr['id']?? 0;
          $responsavel->nome = $arr['nome']?? '';
          $responsavel->email = $arr['email']?? '';
          $responsavel->cpf = $arr['cpf']?? '';
          $responsavel->cnpj = $arr['cnpj']?? '';
          $responsavel->senha = $arr['senha']?? '';
          $responsavel->token = $arr['token']??'';

          return $responsavel;
     }

     public function findByToken($token)
     {
          if(!empty($token)){
               $sql = $this->pdo->prepare('SELECT * FROM tbl_responsavel WHERE token = :token');
               $sql->bindValue(":token", $token);
               $sql->execute();

               if($sql->rowCount() > 0){
                    $data = $sql->fetch(PDO::FETCH_ASSOC);
                    $responsavel = $this->gerarResponsavel($data);
                    return $responsavel;
               }
          }

          return FALSE;
     }

     public function findByEmail($email)
     {
          if(!empty($email)){
               $sql = $this->pdo->prepare('SELECT * FROM tbl_responsavel WHERE email = :email');
               $sql->bindValue(":email", $email);
               $sql->execute();

               if($sql->rowCount() > 0){
                    $data = $sql->fetch(PDO::FETCH_ASSOC);
                    $responsavel = $this->gerarResponsavel($data);
                    return $responsavel;
               }
          }

          return FALSE;
     }

     public function update($responsavel)
     {
          $sql = $this->pdo->prepare("UPDATE tbl_responsavel SET
               nome = :nome,
               email = :email,
               cpf = :cpf,
               senha = :senha,
               token = :token
               WHERE id = :id");


          $sql->bindValue(":id", $responsavel->id);
          $sql->bindValue(":nome", $responsavel->nome);
          $sql->bindValue(":email", $responsavel->email);
          $sql->bindValue(":cpf", $responsavel->cpf);
          $sql->bindValue(":senha", $responsavel->senha);
          $sql->bindValue(":token", $responsavel->token);
     }
}

?>