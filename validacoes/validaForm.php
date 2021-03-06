<?php

     require_once(dirname(__FILE__).'/../config.php');
     require_once("$base/DAO/PessoaFisicaDao.php");
     require_once("$base/DAO/PessoaJuridicaDao.php");
     require_once("$base/DAO/EnderecoDao.php");
     require_once("$base/DAO/OrcamentoDao.php");
     require_once("$base/DAO/ItensOrcamentoDao.php");
     require_once("$base/models/ItensOrcamento.php");

     $botao = filter_input(INPUT_POST, 'botao');
     $tipoCadasto = filter_input(INPUT_POST, 'tipo_cadastro');
     $tipoCliente = filter_input(INPUT_POST, "tipo_cliente");
     
     $id = filter_input(INPUT_POST, 'id');
     echo $id;

     $id_pessoa_fisica = filter_input(INPUT_POST, 'id_pessoa_fisica');
     $id_pessoa_juridica = filter_input(INPUT_POST, 'id_pessoa_juridica');
     $id_endereco = filter_input(INPUT_POST, 'id_endereco');

     $pessoaFisicaDao = new PessoaFisicaDao($pdo);
     $pessoaJuridicaDao = new PessoaJuridicaDao($pdo);
     $enderecoDao = new EnderecoDao($pdo, $tipoCliente);
     $orcamentoDao = new OrcamentoDao($pdo);
     $itensOrcamentoDao = new ItensOrcamentoDao($pdo);

     // Pessoa física
     $nome = filter_input(INPUT_POST, "nome_completo", FILTER_SANITIZE_SPECIAL_CHARS);
     $telefone = filter_input(INPUT_POST, "telefone", FILTER_SANITIZE_SPECIAL_CHARS);
     $celular = filter_input(INPUT_POST, "celular", FILTER_SANITIZE_SPECIAL_CHARS);
     $email = filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL);
     $cpf = filter_input(INPUT_POST, "cpf", FILTER_SANITIZE_SPECIAL_CHARS);

     //Pessoa jurídica
     $razaoSocial = filter_input(INPUT_POST, "razao_social");
     $nomeFantasia = filter_input(INPUT_POST, "nome_fantasia");
     $cnpj = filter_input(INPUT_POST, "cnpj");
     $telefone = filter_input(INPUT_POST, "telefone", FILTER_SANITIZE_SPECIAL_CHARS);
     $celular = filter_input(INPUT_POST, "celular", FILTER_SANITIZE_SPECIAL_CHARS);
     $email = filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL);

     // Endereço
     $cep = filter_input(INPUT_POST, "cep", FILTER_SANITIZE_SPECIAL_CHARS);
     $logradouro = filter_input(INPUT_POST, "logradouro", FILTER_SANITIZE_SPECIAL_CHARS);
     $bairro = filter_input(INPUT_POST, "bairro", FILTER_SANITIZE_SPECIAL_CHARS);
     $cidade = filter_input(INPUT_POST, "cidade", FILTER_SANITIZE_SPECIAL_CHARS);
     $estado = filter_input(INPUT_POST, "estado");
     $numero = filter_input(INPUT_POST, "numero", FILTER_SANITIZE_SPECIAL_CHARS);
     $complemento = filter_input(INPUT_POST, "complemento", FILTER_SANITIZE_SPECIAL_CHARS);

     // Itens do orçamento
     $itensOrcamento = json_decode(filter_input(INPUT_POST, "itens"));
     // print_r($itensOrcamento);

     // Orçamento
     $valorDesconto = filter_input(INPUT_POST, "valor_desconto", FILTER_VALIDATE_FLOAT)? : 0.00;
     $valorTotal = filter_input(INPUT_POST, "valor_total", FILTER_VALIDATE_FLOAT)? : 0.00;
     $condicaoPagamento = filter_input(INPUT_POST, "condicao_pagamento")? : "";
     $observacoes = filter_input(INPUT_POST, "observacoes", FILTER_SANITIZE_SPECIAL_CHARS);
     $vendedor = filter_input(INPUT_POST, "vendedor")? : "";

     // clientes
     if($tipoCliente == 1){
          if($nome && ($telefone || $celular || $email)){
               $pessoaFisica = new PessoaFisica();
               $pessoaFisica->setNome($nome);
               $pessoaFisica->setCpf($cpf);
               $pessoaFisica->setEmail($email);
               $pessoaFisica->setTelefone($telefone);
               $pessoaFisica->setCelular($celular);

               if(strtoupper($tipoCadasto) == "ADD")
                    $pessoaFisicaDao->add($pessoaFisica);
               else{
                    $pessoaFisica->setId($id_pessoa_fisica);
                    $pessoaFisicaDao->update($pessoaFisica);
               }
                    
          }
     }else{
          if(($nomeFantasia || $razaoSocial) && ($telefone || $celular || $email)){
               $pessoaJuridica = new PessoaJuridica();
               $pessoaJuridica->setRazaoSocial($razaoSocial);
               $pessoaJuridica->setNomeFantasia($nomeFantasia);
               $pessoaJuridica->setCnpj($cnpj);
               $pessoaJuridica->setTelefone($telefone);
               $pessoaJuridica->setCelular($celular);
               $pessoaJuridica->setEmail($email);

               if(strtoupper($tipoCadasto) == "ADD")
                    $pessoaJuridicaDao->add($pessoaJuridica);
               else{
                    $pessoaJuridica->setId($id_pessoa_juridica);
                    $pessoaJuridicaDao->update($pessoaJuridica);
               }
                    
          }
     }

     //Endereço
     $endereco = new Endereco();
     $endereco->setCep($cep);
     $endereco->setLogradouro($logradouro);
     $endereco->setBairro($bairro);
     $endereco->setCidade($cidade);
     $endereco->setEstado($estado);
     $endereco->setNumero($numero);
     $endereco->setComplemento($complemento);

     if(strtoupper($tipoCadasto) == "ADD")
          $enderecoDao->add($endereco);
     else{
          $endereco->setId($id_endereco);
          $endereco->setIdPessoaFisica($id_pessoa_fisica);
          $enderecoDao->update($endereco);
     }
  
     //orçamento
     $date = new DateTime();
     $date->setTimezone(new DateTimeZone('America/Sao_Paulo'));
     $data = $date->format('yy-m-d');
     $hora = $date->format('H:i:s');

     $orcamento = new Orcamento();
     $orcamento->setHora($hora);
     $orcamento->setData($data);
     $orcamento->setObservacoes($observacoes);
     $orcamento->setValorDesconto($valorDesconto);
     $orcamento->setValorTotal($valorTotal);
     $orcamento->setCondicaoPagamento($condicaoPagamento);
     $orcamento->setVendedor($vendedor);

     $itens = new ItensOrcamentoDao($pdo);

     if(strtoupper($tipoCadasto) == "ADD")
          $orcamentoDao->add($orcamento, $tipoCliente);
     else{
          $orcamento->setId($id);
          $orcamentoDao->update($orcamento);
          $itens->deleteListItens($id);
     }

     if(!isset($id)){
          $id = 0;
     }

     foreach($itensOrcamento as $item){
          $itensOrcamento = new ItensOrcamento();
          $itensOrcamento->setDescricaoItem($item[1]);
          $itensOrcamento->setQuantidade($item[2]);
          $itensOrcamento->setPreco($item[3]);
          $itensOrcamentoDao->add($itensOrcamento, $id);
     }


?>