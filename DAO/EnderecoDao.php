<?php

require_once('../interfaces/DaoMysql.php');
require_once('../models/Endereco.php');

class EnderecoDao implements DaoMysql
{
     private $pdo;
     private $tipo;

     public function __construct(PDO $pdo, $tipo)
     {
          $this->pdo = $pdo;
          $this->tipo = trim(strtolower($tipo));
     }
     
     public function add($endereco)
     {
          if($this->tipo=="pessoa_fisica"){
               $sql = $this->pdo->prepare("INSERT INTO tbl_endereco 
               (cep, logradouro, bairro, cidade, estado, numero, complemento, id_pessoa_fisica) 
               VALUES (:cep, :logradouro, :bairro, :cidade, :estado, :numero, :complemento, LAST_INSERT_ID())");
          }elseif($this->tipo=="pessoa_juridica"){
               $sql = $pdo->prepare("INSERT INTO tbl_endereco 
               (cep, logradouro, bairro, cidade, estado, numero, complemento, id_pessoa_juridica) 
               VALUES (:cep, :logradouro, :bairro, :cidade, :estado, :numero, :complemento, LAST_INSERT_ID())");
          }
          
          $sql->bindValue(":cep", $endereco->getCep());
          $sql->bindValue(":logradouro", $endereco->getLogradouro());
          $sql->bindValue(":bairro", $endereco->getBairro());
          $sql->bindValue(":cidade", $endereco->getCidade());
          $sql->bindValue(":estado", $endereco->getEstado());
          $sql->bindValue(":numero", $endereco->getNumero());
          $sql->bindValue(":complemento", $endereco->getComplemento());
          $sql->execute();

          if($sql->rowCount() > 0){
               $endereco->setId($this->pdo->lastInsertId());
               return $endereco;
          }else{
               return FALSE;
          }
     }

     public function findById($id)
     {
          $sql = $this->pdo->prepare("SELECT * FROM tbl_endereo WHERE id=:id");
          $sql->bindValue(":id", $id);
          $sql->execute();

          if($sql->rowCount() > 0)
          {
               $dados = $sql->fetch(PDO::FETCH_ASSOC);
               $endereco = new Endereco();
               $endereco->setId($dados['id']);
               $endereco->setCep($dados['cep']);
               $endereco->setLogradouro($dados['logradouro']);
               $endereco->setBairro($dados['bairro']);
               $endereco->setCidade($dados['cidade']);
               $endereco->setEstado($dados['estado']);
               $endereco->setNumero($dados['numero']);
               $endereco->setComplemento($dados['complemento']);
               $endereco->setIdPessoaFisica($dados['id_pessoa_fisica']);
               $endereco->setIdPessoaJuridica($dados['id_pessoa_juridica']);

               return $endereco;

          }else{
               return FALSE;
          }
     }

     public function findAll()
     {
          $enderecos = [];

          $sql = $this->pdo->query("SELECT * FROM tbl_endereco");

          if($sql->rowCount() > 0)
          {    
               $dados = $sql->fetchAll(PDO::FETCH_ASSOC);
               foreach($dados as $end){
                    $endereco = new Endereco();
                    $endereco->setId($end['id']);
                    $endereco->setCep($end['cep']);
                    $endereco->setLogradouro($end['logradouro']);
                    $endereco->setBairro($end['bairro']);
                    $endereco->setCidade($end['cidade']);
                    $endereco->setEstado($end['estado']);
                    $endereco->setNumero($end['numero']);
                    $endereco->setComplemento($end['complemento']);
                    $endereco->setIdPessoaFisica($end['id_pessoa_fisica']);
                    $endereco->setIdPessoaJuridica($end['id_pessoa_juridica']);

                    $enderecos[] = $endereco;
               }

               return $enderecos;
          }
     }

     public function update($endereco)
     {
          $sql = $this->pdo->prepare("UPDATE tbl_endereco 
               SET cep=:cep, logradouro=:logradouro, bairro=:bairro, cidade=:cidade, 
               estado=:estado, numero=:numero, complemento=:complemento, id_pessoa_fisica=:id_pessoa_fisica, id_pessoa_juridica=:id_pessoa_juridica
               WHERE id=:id");
          
          $sql->bindValue(":id", $endereco->getId());
          $sql->bindValue(":cep", $endereco->getCep());
          $sql->bindValue(":logradouro", $endereco->getLogradouro());
          $sql->bindValue(":bairro", $endereco->getBairro());
          $sql->bindValue(":cidade", $endereco->getCidade());
          $sql->bindValue(":estado", $endereco->getEstado());
          $sql->bindValue(":numero", $endereco->getNumero());
          $sql->bindValue(":complemento", $endereco->getComplemento());
          $sql->bindValue(":id_pessoa_fisica", $endereco->getIdPessoaFisica());
          $sql->bindValue(":id_pessoa_juridica", $endereco->getIdPessoaJuridica());
          $sql->execute();

          if($sql->rowCount() > 0){
               return $endereco;
          }else{
               return FALSE;
          }
     }

     public function delete($id)
     {
          $sql = $this->pdo->prepare("DELETE FROM tbl_endereco WHERE id=:id");
          $sql->bindValue(":id", $id);
          $sql->execute();

          if($sql->rowCount() > 0){
               return TRUE;
          }else{
               return FALSE;
          }
     }
}

?>