<?php

require_once(dirname(__FILE__)."/../config.php");
require_once("$base/interfaces/ItensOrcamentoInterface.php");
require_once("$base/models/Orcamento.php");

class ItensOrcamentoDao implements ItensOrcamentoInterface
{
     private $pdo;

     public function __construct(PDO $pdo)
     {
          $this->pdo = $pdo;
         
     }
     
     public function add($itensOrcamento)
     {

          $lastIdOrcamento = $this->pdo->prepare("SELECT id FROM tbl_orcamento ORDER BY id DESC LIMIT 1");
          $lastIdOrcamento->execute();
          
          $realLastIdOrcamento = $lastIdOrcamento->fetch(PDO::FETCH_ASSOC);

          $sql = $this->pdo->prepare("INSERT INTO tbl_itens_orcamento 
               (descricao_item, quantidade, preco, id_orcamento) 
               VALUES (:descricao_item, :quantidade, :preco, :id_orcamento)");

          $sql->bindValue(":descricao_item", $itensOrcamento->getDescricaoItem());
          $sql->bindValue(":quantidade", $itensOrcamento->getQuantidade());
          $sql->bindValue(":preco", $itensOrcamento->getPreco());
          $sql->bindValue(":id_orcamento", $realLastIdOrcamento['id']);
          $sql->execute();

          if($sql->rowCount() > 0){
               $itensOrcamento->setId($this->pdo->lastInsertId());
               return $itensOrcamento;
          }else{
               return FALSE;
          }
     }

     public function findById($id)
     {
          $sql = $this->pdo->prepare("SELECT * FROM tbl_orcamento WHERE id=:id");
          $sql->bindValue(":id", $id);
          $sql->execute();

          if($sql->rowCount() > 0)
          {
               $dados = $sql->fetch(PDO::FETCH_ASSOC);
               $orcamento = new Orcamento();
               $orcamento->setId($dados['id']);
               $orcamento->setHora($dados['hora']);
               $orcamento->setData($dados['data']);
               $orcamento->setObservacoes($dados['observacoes']);
               $orcamento->setValorDesconto($dados['valor_desconto']);
               $orcamento->setValorTotal($dados['valor_total']);
               $orcamento->setCnpj($dados['cnpj']);
               $orcamento->setSituacao($dados['situacao']);
               $orcamento->setIdPessoaFisica($dados['id_pessoa_fisica']);
               $orcamento->setIdPessoaJuridica($dados['id_pessoa_juridica']);

               return $orcamento;

          }else{
               return FALSE;
          }
     }

     public function findAll()
     {
          $orcamentos = [];

          $sql = $this->pdo->query("SELECT * FROM tbl_orcamento");

          if($sql->rowCount() > 0)
          {    
               $dadosOrcamentos = $sql->fetchAll(PDO::FETCH_ASSOC);
               foreach($dadosOrcamentos as $dados){
                    $orcamento = new Orcamento();
                    $orcamento->setId($dados['id']);
                    $orcamento->setHora($dados['hora']);
                    $orcamento->setData($dados['data']);
                    $orcamento->setObservacoes($dados['observacoes']);
                    $orcamento->setValorDesconto($dados['valor_desconto']);
                    $orcamento->setValorTotal($dados['valor_total']);
                    $orcamento->setCnpj($dados['cnpj']);
                    $orcamento->setSituacao($dados['situacao']);
                    $orcamento->setIdPessoaFisica($dados['id_pessoa_fisica']);
                    $orcamento->setIdPessoaJuridica($dados['id_pessoa_juridica']);
     
                    $orcamentos[] = $orcamento;
               }

                return $orcamentos;
          }else
               return FALSE;
     }

     public function update($orcamento)
     {
          
     }

     public function delete($id)
     {
          $sql = $this->pdo->prepare("DELETE FROM tbl_itens_orcamento WHERE id=:id");
          $sql->bindValue(":id", $id);
          $sql->execute();

          if($sql->rowCount() > 0){
               return TRUE;
          }else{
               return FALSE;
          }
     }

     public function findAllByOrcamento($idOrcamento)
     {
          $sql = $this->pdo->prepare("SELECT * FROM tbl_itens_orcamento WHERE id_orcamento = :id_orcamento");
          $sql->bindValue(":id_orcamento", $idOrcamento);
          $sql->execute();

          if($sql->rowCount() > 0){
               $dados = $sql->fetchAll(PDO::FETCH_ASSOC);
               return $dados;
          }else
               return FALSE;
     }
}

?>