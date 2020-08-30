<?php

     require('DAO/config.php');
     require('DAO/PessoaFisicaDao.php');
     require('DAO/EnderecoDao.php');

     $pessoaFisicaDao = new PessoaFisicaDao($pdo);
     $enderecoDao = new EnderecoDao($pdo);
     $orcamentoDao = new OrcamentoDao($pdo);
     $tipo = "";

     // Pessoa física
     $nome = filter_input(INPUT_POST, "nome_completo", FILTER_SANITIZE_SPECIAL_CHARS);
     $cpf = filter_input(INPUT_POST, "cpf", FILTER_SANITIZE_SPECIAL_CHARS);
     $email = filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL);
     $telefone = filter_input(INPUT_POST, "telefone", FILTER_SANITIZE_SPECIAL_CHARS);
     $celular = filter_input(INPUT_POST, "celular", FILTER_SANITIZE_SPECIAL_CHARS);
     
     // Endereço
     $cep = filter_input(INPUT_POST, "cep", FILTER_SANITIZE_SPECIAL_CHARS);
     $logradouro = filter_input(INPUT_POST, "logradouro", FILTER_SANITIZE_SPECIAL_CHARS);
     $bairro = filter_input(INPUT_POST, "bairro", FILTER_SANITIZE_SPECIAL_CHARS);
     $cidade = filter_input(INPUT_POST, "cidade", FILTER_SANITIZE_SPECIAL_CHARS);
     $estado = filter_input(INPUT_POST, "estado", FILTER_SANITIZE_SPECIAL_CHARS);
     $numero = filter_input(INPUT_POST, "numero", FILTER_SANITIZE_SPECIAL_CHARS);
     $complemento = filter_input(INPUT_POST, "complemento", FILTER_SANITIZE_SPECIAL_CHARS);

     //Pedido
     $descricaoItem = filter_input(INPUT_POST, "descricao_item", FILTER_SANITIZE_SPECIAL_CHARS);
     $quantidade = filter_input(INPUT_POST, "quantidade", FILTER_VALIDATE_INT);
     $preco = filter_input(INPUT_POST, "preco", FILTER_VALIDATE_FLOAT);
     $valorServico = filter_input(INPUT_POST, "valor_servico", FILTER_VALIDATE_FLOAT);
     $valorDesconto = filter_input(INPUT_POST, "valor_desconto", FILTER_VALIDATE_FLOAT);
     $valorMaterial = filter_input(INPUT_POST, "valor_material", FILTER_VALIDATE_FLOAT);
     $valorTotal = filter_input(INPUT_POST, "valor_total", FILTER_VALIDATE_FLOAT);
     $dataEntrega = filter_input(INPUT_POST, "data_entrega");
     $formaPagamento = filter_input(INPUT_POST, "forma_pagamento", FILTER_SANITIZE_SPECIAL_CHARS);
     $observacoes = filter_input(INPUT_POST, "observacoes", FILTER_SANITIZE_SPECIAL_CHARS);

     if($nome && $cpf && ($telefone || $celular)){
          $pessoaFisica = new PessoaFisica();
          $pessoaFisica->setNome($nome);
          $pessoaFisica->setCpf($cpf);
          $pessoaFisica->setEmail($email);
          $pessoaFisica->setTelefone($telefone);
          $pessoaFisica->setCelular($celular);

          $pessoaFisicaDao->add($pessoaFisica);
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

     //Pedido
     $date = new DateTime();
     $date->setTimezone(new DateTimeZone('America/Sao_Paulo'));
     $data = $date->format('y/m/d');
     $hora = $date->format('H:i:s');

     $orcamento = new Orcamento();
     $orcamento->setDescricaoItem($descricaoItem);
     $orcamento->setQuantidade($quantidade);
     $orcamento->setPreco($preco);
     $orcamento->setValorServico($valorServico);
     $orcamento->setValorDesconto($valorDesconto);
     $orcamento->setValorMaterial($valorMaterial);
     $orcamento->setValorTotal($valorTotal);
     $orcamento->setDataEntrega($dataEntrega);
     $orcamento->setFormaPagamento($formaPagamento);
     $orcamento->setData($data);
     $orcamento->setHora($hora);
     $orcamento->setObservacoes($observacoes);

?>