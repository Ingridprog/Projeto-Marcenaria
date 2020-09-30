<?php

require_once(dirname(__FILE__)."/../config.php");
require_once("$base/interfaces/OrcamentoInterface.php");
require_once("$base/models/Orcamento.php");

class OrcamentoDao implements OrcamentoInterface
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
                    (hora, data, observacoes, valor_desconto, valor_total, condicao_pagamento, cnpj,  situacao, 
                    vendedor, id_pessoa_fisica) 
                    VALUES (:hora, :data, :observacoes, :valor_desconto, :valor_total, :condicao_pagamento, :cnpj, 0, 
                    :vendedor, :id_cliente)");

          }elseif($this->tipo==2){
               // refatorar
               $id = $this->pdo->query("SELECT id_pessoa_juridica FROM tbl_endereco WHERE id=$lastInsertId");
               $dados = $id->fetch(PDO::FETCH_ASSOC);
               $idCliente = $dados['id_pessoa_juridica'];

               $sql = $this->pdo->prepare("INSERT INTO tbl_orcamento 
                    (hora, data, observacoes, valor_desconto, valor_total, condicao_pagamento, cnpj,  situacao, 
                    vendedor, id_pessoa_juridica) 
                    VALUES (:hora, :data, :observacoes, :valor_desconto, :valor_total, :condicao_pagamento, :cnpj, 0, 
                    :vendedor, :id_cliente)");
          }

          $sql->bindValue(":hora", $orcamento->getHora());
          $sql->bindValue(":data", $orcamento->getData());
          $sql->bindValue(":observacoes", $orcamento->getObservacoes());
          $sql->bindValue(":valor_desconto", $orcamento->getValorDesconto());
          $sql->bindValue(":valor_total", $orcamento->getValorTotal());
          $sql->bindValue(":condicao_pagamento", $orcamento->getCondicaoPagamento());
          $sql->bindValue(":cnpj", $orcamento->getCnpj());
          $sql->bindValue(":vendedor", $orcamento->getVendedor());
          $sql->bindValue(":id_cliente", $idCliente);
          $sql->execute();

          if($sql->rowCount() > 0){
               $orcamento->setId($this->pdo->lastInsertId());
               return $orcamento;
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
               $orcamento->setCondicaoPagamento($dados['condicao_pagamento']);
               $orcamento->setCnpj($dados['cnpj']);
               $orcamento->setSituacao($dados['situacao']);
               $orcamento->setVendedor($dados['vendedor']);
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
                    $orcamento->setCondicaoPagamento($dados['condicao_pagamento']);
                    $orcamento->setCnpj($dados['cnpj']);
                    $orcamento->setSituacao($dados['situacao']);
                    $orcamento->setVendedor($dados['vendedor']);
                    $orcamento->setIdPessoaFisica($dados['id_pessoa_fisica']);
                    $orcamento->setIdPessoaJuridica($dados['id_pessoa_juridica']);
     
                    $orcamentos[] = $orcamento;
               }

                return $orcamentos;
          }else
               return false;
     }

     public function findByClientName($nome)
     {
          $sql = $this->pdo->prepare("SELECT tbl_orcamento.*, tbl_pessoa_fisica.nome AS nome_pessoa_fisica, tbl_pessoa_juridica.razao_social, tbl_pessoa_juridica.nome_fantasia FROM tbl_orcamento LEFT JOIN tbl_pessoa_fisica ON tbl_orcamento.id_pessoa_fisica = tbl_pessoa_fisica.id LEFT JOIN tbl_pessoa_juridica ON tbl_orcamento.id_pessoa_juridica = tbl_pessoa_juridica.id WHERE tbl_pessoa_fisica.nome LIKE :nome OR tbl_pessoa_juridica.razao_social LIKE :nome OR tbl_pessoa_juridica.nome_fantasia LIKE :nome");

          $sql->bindValue(":nome", "%".$nome."%");
          $sql->execute();
          $dados = $sql->fetchAll(PDO::FETCH_ASSOC);

          if($sql->rowCount() > 0)
               return $dados;
          else
               return [];

     }

     public function findByDate($data)
     {
          $sql = $this->pdo->prepare("SELECT tbl_orcamento.*, tbl_pessoa_fisica.nome AS nome_pessoa_fisica, tbl_pessoa_juridica.razao_social, tbl_pessoa_juridica.nome_fantasia FROM tbl_orcamento LEFT JOIN tbl_pessoa_fisica ON tbl_orcamento.id_pessoa_fisica = tbl_pessoa_fisica.id LEFT JOIN tbl_pessoa_juridica ON tbl_orcamento.id_pessoa_juridica = tbl_pessoa_juridica.id WHERE tbl_orcamento.data = :data");

          $sql->bindValue(":data", $data);
          $sql->execute();
          $dados = $sql->fetchAll(PDO::FETCH_ASSOC);

          if($sql->rowCount() > 0)
               return $dados;
          else
               return [];

     }

     public function update($orcamento)
     {
          $sql = $this->pdo->prepare("UPDATE tbl_orcamento 
               SET hora=:hora, data=:data, observacoes=:observacoes,
               valor_desconto=:valor_desconto, valor_total=:valor_total, condicao_pagamento=:condicao_pagamento,
               cnpj=:cnpj, vendedor=:vendedor WHERE id=:id");

          $sql->bindValue(":id", $orcamento->getId());
          $sql->bindValue(":hora", $orcamento->getHora());
          $sql->bindValue(":data", $orcamento->getData());
          $sql->bindValue(":observacoes", $orcamento->getObservacoes());
          $sql->bindValue(":valor_desconto", $orcamento->getValorDesconto());
          $sql->bindValue(":valor_total", $orcamento->getValorTotal());
          $sql->bindValue(":condicao_pagamento", $orcamento->getCondicaoPagamento());
          $sql->bindValue(":cnpj", $orcamento->getCnpj());
          $sql->bindValue(":vendedor", $orcamento->getVendedor());
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