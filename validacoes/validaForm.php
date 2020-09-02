<?php

     require_once('../DAO/config.php');
     require_once('../DAO/PessoaFisicaDao.php');
     require_once('../DAO/PessoaJuridicaDao.php');
     require_once('../DAO/EnderecoDao.php');
     require_once('../DAO/OrcamentoDao.php');

     // Tipo
     $tipoCliente = filter_input(INPUT_POST, "tipo_cliente");

     $pessoaFisicaDao = new PesssoaFisicaDao($pdo);
     $pessoaJuridicaDao = new PesssoaJuridicaDao($pdo);
     $enderecoDao = new EnderecoDao($pdo, $tipoCliente);
     $orcamentoDao = new OrcamentoDao($pdo, $tipoCliente);

     // Pessoa física
     $nome = filter_input(INPUT_POST, "nome_completo", FILTER_SANITIZE_SPECIAL_CHARS);
     $telefone = filter_input(INPUT_POST, "telefone", FILTER_SANITIZE_SPECIAL_CHARS);
     $celular = filter_input(INPUT_POST, "celular", FILTER_SANITIZE_SPECIAL_CHARS);
     $email = filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL);
     $cpf = filter_input(INPUT_POST, "cpf", FILTER_SANITIZE_SPECIAL_CHARS);

     //Pessoa juridica
     $razaoSocial = filter_input(INPUT_POST, "razao_social");
     $nomeFantasia = filter_input(INPUT_POST, "nome_fantasia");
     $cnpj = filter_input(INPUT_POST, "nome_fantasia");
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

     //orçamento
     $descricaoItem = filter_input(INPUT_POST, "descricao_item", FILTER_SANITIZE_SPECIAL_CHARS);
     $quantidade = filter_input(INPUT_POST, "quantidade", FILTER_VALIDATE_INT);
     if($quantidade == ""){
          $quantidade = 0;
     }
     $preco = filter_input(INPUT_POST, "preco", FILTER_VALIDATE_FLOAT);
     $valorServico = filter_input(INPUT_POST, "valor_servico", FILTER_VALIDATE_FLOAT);
     $valorDesconto = filter_input(INPUT_POST, "valor_desconto", FILTER_VALIDATE_FLOAT);
     $valorMaterial = filter_input(INPUT_POST, "valor_material", FILTER_VALIDATE_FLOAT);
     $valorTotal = filter_input(INPUT_POST, "valor_total", FILTER_VALIDATE_FLOAT);
     $dataEntrega = filter_input(INPUT_POST, "data_entrega");
     $formaPagamento = filter_input(INPUT_POST, "forma_pagamento", FILTER_SANITIZE_SPECIAL_CHARS);
     $observacoes = filter_input(INPUT_POST, "observacoes", FILTER_SANITIZE_SPECIAL_CHARS);

     if($tipoCliente == "pessoa_fisica"){
          if($nome && $cpf && ($telefone || $celular || $email)){
               $pessoaFisica = new PessoaFisica();
               $pessoaFisica->setNome($nome);
               $pessoaFisica->setCpf($cpf);
               $pessoaFisica->setEmail($email);
               $pessoaFisica->setTelefone($telefone);
               $pessoaFisica->setCelular($celular);
     
               $pessoaFisicaDao->add($pessoaFisica);
          }
     }else{
          /* VALIDAR */
          if($cnpj && ($telefone || $celular || $email)){
               $pessoaJuridica = new PessoaJuridica();
               $pessoaJuridica->setRazaoSocial($razaoSocial);
               $pessoaJuridica->setNomeFantasia($nomeFantasia);
               $pessoaJuridica->setCnpj($cnpj);
               $pessoaJuridica->setTelefone($telefone);
               $pessoaJuridica->setCelular($celular);
               $pessoaJuridica->setEmail($email);

               $pessoaJuridicaDao->add($pessoaJuridica);
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

     $enderecoDao->add($endereco);
     

     //orçamento
     $date = new DateTime();
     $date->setTimezone(new DateTimeZone('America/Sao_Paulo'));
     $data = $date->format('yy-m-d');
     $hora = $date->format('H:i:s');

     $orcamento = new Orcamento();
     $orcamento->setHora($hora);
     $orcamento->setData($data);
     $orcamento->setObservacoes($observacoes);
     $orcamento->setDescricaoItem($descricaoItem);
     $orcamento->setQuantidade($quantidade);
     $orcamento->setPreco($preco);
     $orcamento->setValorMaterial($valorMaterial);
     $orcamento->setValorServico($valorServico);
     $orcamento->setValorDesconto($valorDesconto);
     $orcamento->setValorTotal($valorTotal);
     $orcamento->setDataEntrega($dataEntrega);
     
     $res = $orcamentoDao->add($orcamento);

     echo $orcamento->getQuantidade();

     print_r($res);
?>