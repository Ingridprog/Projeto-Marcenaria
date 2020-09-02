<?php

require_once('../interfaces/DaoMysql.php');
require_once('../models/Orcamento.php');

class OrcamentoDao implements DaoMysql
{
     private $pdo;

     public function __construct(PDO $pdo, $tipo)
     {
          $this->pdo = $pdo;
          $this->tipo = trim(strtolower($tipo));
     }
     
     public function add($orcamento)
     {
          // if($this->tipo=="pessoa_fisica"){
               $sql = $this->pdo->prepare("INSERT INTO tbl_orcamento 
                    (hora, data, observacoes, descricao_item, quantidade/*, preco/*, valor_material, 
                    valor_servico, valor_desconto, valor_total, cnpj)/*, data_entrega, situacao, 
                    id_pessoa_fisica*/) 
                    VALUES (:hora, :data, :observacoes, :descricao_item, :quant)/*, :preco)/*, :valor_material, 
                    :valor_servico, :valor_desconto, :valor_total, :cnpj, :data_entrega, :situacao, 
                    LAST_INSERT_ID())*/");
          // }elseif($this->tipo=="pessoa_juridica"){
          //      $sql = $pdo->prepare("INSERT INTO tbl_orcamento 
          //           (hora, data, observacoes, descricao_item, quantidade, preco, valor_material, 
          //           valor_servico, valor_desconto, valor_total, cnpj, data_entrega, situacao, 
          //           id_pessoa_juridica) 
          //           VALUES (:hora, :data, :observacoes, :descricao_item, :quantidade, :preco, :valor_material, 
          //           :valor_servico, :valor_desconto, :valor_total, :cnpj, :data_entrega, :situacao, 
          //           LAST_INSERT_ID())");
          // }

          $sql->bindValue(":hora", $orcamento->getHora());
          $sql->bindValue(":data", $orcamento->getData());
          $sql->bindValue(":observacoes", $orcamento->getObservacoes());
          $sql->bindValue(":descricao_item", $orcamento->getDescricaoItem());
          $sql->bindValue(":quant", $orcamento->getQuantidade());
          // $sql->bindValue(":quantidade", $orcamento->getQuantidade());
          // $sql->bindValue(":preco", $orcamento->getPreco());
          // $sql->bindValue(":valor_material", $orcamento->getValorMaterial());
          // $sql->bindValue(":valor_servico", $orcamento->getValorServico());
          // $sql->bindValue(":valor_desconto", $orcamento->getValorDesconto());
          // $sql->bindValue(":valor_total", $orcamento->getValorTotal());
          // $sql->bindValue(":cnpj", $orcamento->getCnpj());
          // $sql->bindValue(":data_entrega", $orcamento->getDataEntrega());
          // $sql->bindValue(":situacao", $orcamento->getSituacao());
          $sql->execute();

          if($sql->rowCount() > 0){
               $orcamento->setId($this->pdo->lastInsertId());
               return $orcamento;
          }else{
               return $orcamento->getQuantidade();
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
               $orcamento->setDescricaoItem($dados['descricao_item']);
               $orcamento->setQuantidade($dados['quantidade']);
               $orcamento->setPreco($dados['preco']);
               $orcamento->setValorMaterial($dados['valor_material']);
               $orcamento->setValorServico($dados['valor_servico']);
               $orcamento->setValorDesconto($dados['valor_desconto']);
               $orcamento->setValorTotal($dados['valor_total']);
               $orcamento->setCnpj($dados['cnpj']);
               $orcamento->setDataEntrega($dados['data_entrega']);
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
                    $orcamento->setDescricaoItem($dados['descricao_item']);
                    $orcamento->setQuantidade($dados['quantidade']);
                    $orcamento->setPreco($dados['preco']);
                    $orcamento->setValorMaterial($dados['valor_material']);
                    $orcamento->setValorServico($dados['valor_servico']);
                    $orcamento->setValorDesconto($dados['valor_desconto']);
                    $orcamento->setValorTotal($dados['valor_total']);
                    $orcamento->setCnpj($dados['cnpj']);
                    $orcamento->setDataEntrega($dados['data_entrega']);
                    $orcamento->setSituacao($dados['situacao']);
                    $orcamento->setIdPessoaFisica($dados['id_pessoa_fisica']);
                    $orcamento->setIdPessoaJuridica($dados['id_pessoa_juridica']);
     
                    $orcamentos[] = $orcamento;
               }

               return $orcamentos;
          }
     }

     public function update($orcamento)
     {
          $sql = $this->pdo->prepare("UPDATE tbl_orcamento 
               SET hora=:hora, data=:data, observacoes=:observacoes, descricao_item=:descricao_item,
               quantidade=:quantidade, preco=:preco, valor_material=:valor_material, valor_servico=:valor_servico,
               valor_desconto=:valor_desconto, valor_total=:valor_total, cnpj=:cnpj, data_entrega=:data_entrega,

               WHERE id=:id");
          
          $sql->bindValue(":hora", $orcamento->getHora());
          $sql->bindValue(":data", $orcamento->getData());
          $sql->bindValue(":observacoes", $orcamento->getObservacoes());
          $sql->bindValue(":descricao_item", $orcamento->getDescricaoItem());
          $sql->bindValue(":quantidade", $orcamento->getQuantidade());
          $sql->bindValue(":preco", $orcamento->getPreco());
          $sql->bindValue(":valor_material", $orcamento->getValorMaterial());
          $sql->bindValue(":valor_servico", $orcamento->getValorServico());
          $sql->bindValue(":valor_desconto", $orcamento->getValorDesconto());
          $sql->bindValue(":valor_total", $orcamento->getValorTotal());
          $sql->bindValue(":cnpj", $orcamento->getCnpj());
          $sql->bindValue(":data_entrega", $orcamento->getDataEntrega());
          $sql->bindValue(":situacao", $orcamento->getSituacao());
          $sql->execute();

          if($sql->rowCount() > 0){
               return $orcamento;
          }else{
               return FALSE;
          }
     }

     public function delete($id)
     {
          $sql = $this->pdo->prepare("DELETE FROM tbl_orcamento WHERE id=:id");
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