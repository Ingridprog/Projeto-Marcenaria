<?php

require_once('interfaces/DaoMysql.php');
require_once('models/DadosExb.php');

class DadosExbDao implements DaoMysql
{
     private $pdo;

     public function __construct(PDO $pdo)
     {
          $this->pdo = $pdo;
     }
     
     public function add($dadosExb)
     {
          $sql = $pdo->prepare("INSERT INTO tbl_dados_exb 
               (cnpj, razao_social, nome_fantasia, email, cep, logradouro, bairro, cidade, estado, numero, complemento) 
               VALUES (:cnpj, :razao_social, :nome_fantasia, :email, :cep, :logradouro, :bairro, :cidade, :estado, :numero, :complemento)");

          $sql->bindValue(":cnpj", $dadosExb->getCnpj());
          $sql->bindValue(":razao_social", $dadosExb->getRazaoSocial());
          $sql->bindValue(":nome_fantasia", $dadosExb->getNomeFantasia());
          $sql->bindValue(":email", $dadosExb->getEmail());
          $sql->bindValue(":cep", $dadosExb->getCep());
          $sql->bindValue(":logradouro", $dadosExb->getLogradouro());
          $sql->bindValue(":bairro", $dadosExb->getBairro());
          $sql->bindValue(":cidade", $dadosExb->getCidade());
          $sql->bindValue(":estado", $dadosExb->getEstado());
          $sql->bindValue(":numero", $dadosExb->getNumero());
          $sql->bindValue(":complemento", $dadosExb->getComplemento());
          $sql->execute();

          if($sql->rowCount() > 0){
               $dadosExb->setId($this->pdo->lastInsertId());
               return $dadosExb;
          }else{
               return FALSE;
          }
     }

     public function findById($cnpj)
     {
          $sql = $this->pdo->prepare("SELECT * FROM tbl_dados_exb WHERE cnpj=:cnpj");
          $sql->bindValue(":cnpj", $cnpj);
          $sql->execute();

          if($sql->rowCount() > 0)
          {
               $dados = $sql->fetch(PDO::FETCH_ASSOC);
               $dadosExb = new DadosExb();
               $dadosExb->setCnpj($dados['cnpj']);
               $dadosExb->setRazaoSocial($dados['razao_social']);
               $dadosExb->setNomeFantasia($dados['nome_fantasia']);
               $dadosExb->setEmail($dados['email']);
               $dadosExb->setCep($dados['cep']);
               $dadosExb->setLogradouro($dados['logradouro']);
               $dadosExb->setBairro($dados['bairro']);
               $dadosExb->setCidade($dados['cidade']);
               $dadosExb->setEstado($dados['estado']);
               $dadosExb->setNumero($dados['numero']);
               $dadosExb->setComplemento($dados['complemento']);

               return $dadosExb;

          }else{
               return FALSE;
          }
     }

     public function findAll()
     {
          $sql = $this->pdo->query("SELECT * FROM tbl_dados_exb");

          if($sql->rowCount() > 0)
          {    
               $dados = $sql->fetchAll(PDO::FETCH_ASSOC);
               foreach($dados as $dado){
                    $dadosExb = new DadosExb();
                    $dadosExb->setCnpj($dado['cnpj']);
                    $dadosExb->setRazaoSocial($dado['razao_social']);
                    $dadosExb->setNomeFantasia($dado['nome_fantasia']);
                    $dadosExb->setEmail($dado['email']);
                    $dadosExb->setCep($dado['cep']);
                    $dadosExb->setLogradouro($dado['logradouro']);
                    $dadosExb->setBairro($dado['bairro']);
                    $dadosExb->setCidade($dado['cidade']);
                    $dadosExb->setEstado($dado['estado']);
                    $dadosExb->setNumero($dado['numero']);
                    $dadosExb->setComplemento($dado['complemento']);
               }

               return $dadosExb;
          }
     }

     public function update($dadosExb)
     {
          $sql = $this->pdo->prepare("UPDATE tbl_dados_exb 
          SET razao_social=:razao_social, nome_fantasia=:nome_fantasia, email=:email, cep=:cep, logradouro=:logradouro, 
          bairro=:bairro, cidade=:cidade, estado=:estado, numero=:numero, complemento=:complemento
          WHERE cnpj=:cnpj");
     
          $sql->bindValue(":cnpj", $dadosExb->getCnpj());
          $sql->bindValue(":razao_social", $dadosExb->getRazaoSocial());
          $sql->bindValue(":nome_fantasia", $dadosExb->getNomeFantasia());
          $sql->bindValue(":email", $dadosExb->getEmail());
          $sql->bindValue(":cep", $dadosExb->getCep());
          $sql->bindValue(":logradouro", $dadosExb->getLogradouro());
          $sql->bindValue(":bairro", $dadosExb->getBairro());
          $sql->bindValue(":cidade", $dadosExb->getCidade());
          $sql->bindValue(":estado", $dadosExb->getEstado());
          $sql->bindValue(":numero", $dadosExb->getNumero());
          $sql->bindValue(":complemento", $dadosExb->getComplemento());
          $sql->bindValue(":id_pessoa_fisica", $dadosExb->getIdPessoaFisica());
          $sql->bindValue(":id_pessoa_juridica", $dadosExb->getIdPessoaJuridica());
          $sql->execute();

          if($sql->rowCount() > 0){
               return $dadosExb;
          }else{
               return FALSE;
          }
     }

     public function delete($cnpj)
     {
          $sql = $this->pdo->prepare("DELETE FROM tbl_dados_exb WHERE cnpj=:cnpj");
          $sql->bindValue(":cnpj", $cnpj);
          $sql->execute();

          if($sql->rowCount() > 0){
               return TRUE;
          }else{
               return FALSE;
          }
     }
}

?>