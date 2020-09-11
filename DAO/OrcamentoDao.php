<?php

require_once(dirname(__FILE__)."/../config.php");
require_once("$base/models/Orcamento.php");

class OrcamentoDao /*implements DaoMysql*/
{
     private $pdo;
     private $tipo;

     public function __construct(PDO $pdo)
     {
          $this->pdo = $pdo;
         
     }
     
     public function add($orcamento, $tipo)
     {
          $this->tipo = trim(strtolower($tipo));

          $lastInsertId = $this->pdo->lastInsertId();

          if($this->tipo==1){
               // refatorar 
               $id = $this->pdo->query("SELECT id_pessoa_fisica FROM tbl_endereco WHERE id=$lastInsertId");
               $dados = $id->fetch(PDO::FETCH_ASSOC);
               $idCliente = $dados['id_pessoa_fisica'];

               $sql = $this->pdo->prepare("INSERT INTO tbl_orcamento 
                    (hora, data, observacoes, valor_desconto, valor_total, cnpj, data_entrega, situacao, 
                    id_pessoa_fisica) 
                    VALUES (:hora, :data, :observacoes, :valor_desconto, :valor_total, :cnpj, :data_entrega, 15, 
                    :id_cliente)");

          }elseif($this->tipo==2){
               // refatorar - ridiculo
               $id = $this->pdo->query("SELECT id_pessoa_juridica FROM tbl_endereco WHERE id=$lastInsertId");
               $dados = $id->fetch(PDO::FETCH_ASSOC);
               $idCliente = $dados['id_pessoa_juridica'];

               $sql = $this->pdo->prepare("INSERT INTO tbl_orcamento 
                    (hora, data, observacoes, valor_desconto, valor_total, cnpj, data_entrega, situacao, 
                    id_pessoa_juridica) 
                    VALUES (:hora, :data, :observacoes, :valor_desconto, :valor_total, :cnpj, :data_entrega, 15, 
                    :id_cliente)");
          }

          $sql->bindValue(":hora", $orcamento->getHora());
          $sql->bindValue(":data", $orcamento->getData());
          $sql->bindValue(":observacoes", $orcamento->getObservacoes());
          $sql->bindValue(":valor_desconto", $orcamento->getValorDesconto());
          $sql->bindValue(":valor_total", $orcamento->getValorTotal());
          $sql->bindValue(":cnpj", $orcamento->getCnpj());
          $sql->bindValue(":data_entrega", $orcamento->getDataEntrega());
          $sql->bindValue(":id_cliente", $idCliente);
          $sql->execute();

          if($sql->rowCount() > 0){
               $orcamento->setId($this->pdo->lastInsertId());
               return $orcamento;
          }else{
               return "Não foi";
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
          }else
               return false;
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