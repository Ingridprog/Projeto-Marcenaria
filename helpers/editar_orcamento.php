<?php

require_once(dirname(__FILE__)."/../config.php");
require_once($base."/DAO/OrcamentoDao.php");
require_once($base."/DAO/PessoaFisicaDao.php");
require_once($base."/DAO/PessoaJuridicaDao.php");
require_once($base."/DAO/ItensOrcamentoDao.php");
require_once($base."/DAO/EnderecoDao.php");

$orcamentoDao = new OrcamentoDao($pdo);
$pessoaFisicaDao = new PessoaFisicaDao($pdo);
$pessoaJuridicaDao = new PessoaJuridicaDao($pdo);
$itensOrcamentoDao = new ItensOrcamentoDao($pdo);

$dadosOrcamento = [];
$dadosPessoaFisica = [];
$dadosPessoaFisica = [];
$valorTotal = array();
$button = "Gerar Orçamento";
$tipo = "";
$id = filter_input(INPUT_POST, 'id');



if(isset($id)){
    
    $button = "Editar";

    $dadosOrcamento = $orcamentoDao->findById($id);

    if($dadosOrcamento->getIdPessoaFisica() != NULL){
        $dadosPessoaFisica = $pessoaFisicaDao->findById($dadosOrcamento->getIdPessoaFisica());
        $tipo = 1;

        $json = [
            'id' => $dadosOrcamento->getId(),
            'vendedor' => $dadosOrcamento->getVendedor(),
            'hora' => $dadosOrcamento->getHora(),
            'data' => $dadosOrcamento->getData(),
            'observacoes' => $dadosOrcamento->getObservacoes(),
            'valor_desconto' => $dadosOrcamento->getValorDesconto(),
            'valor_total' => 0,
            'pessoa_fisica' => [
                'id' => $dadosPessoaFisica->getId(),
                'nome' => $dadosPessoaFisica->getNome(),
                'cpf' => $dadosPessoaFisica->getCpf(),
                'telefone' => $dadosPessoaFisica->getTelefone(),
                'celular' => $dadosPessoaFisica->getCelular(),
                'email' => $dadosPessoaFisica->getEmail()
            ],
            'condicao_pagamento' => $dadosOrcamento->getCondicaoPagamento(),
            'pessoa_juridica' => false,
            'itens_orcamento' => [],
            'id_endereco' => "",
            'cep' => "",
            'logradouro'=>"",
            'numero' => "",
            'complemento' => "",
            'bairro' => "",
            'cidade' => "",
            'uf' => ""
        ];
    }elseif($dadosOrcamento->getIdPessoaJuridica()){
        $dadosPessoaJuridica = $pessoaJuridicaDao->findById($dadosOrcamento->getIdPessoaJuridica());
        $tipo = 2;

        $json = [
            'id' => $dadosOrcamento->getId(),
            'vendedor' => $dadosOrcamento->getVendedor(),
            'hora' => $dadosOrcamento->getHora(),
            'data' => $dadosOrcamento->getData(),
            'observacoes' => $dadosOrcamento->getObservacoes(),
            'valor_desconto' => $dadosOrcamento->getValorDesconto(),
            'valor_total' => 0,
            'pessoa_juridica' => [
                'id' => $dadosPessoaJuridica->getId(),
                'razao_social' => $dadosPessoaJuridica->getRazaoSocial(),
                'nome_fantasia' => $dadosPessoaJuridica->getNomeFantasia(),
                'cnpj' => $dadosPessoaJuridica->getCnpj(),
                'telefone' => $dadosPessoaJuridica->getTelefone(),
                'celular' => $dadosPessoaJuridica->getCelular(),
                'email' => $dadosPessoaJuridica->getEmail()
            ],
            'condicao_pagamento' => $dadosOrcamento->getCondicaoPagamento(),
            'pessoa_fisica' => false,
            'itens_orcamento' => [],
            'id_endereco' => "",
            'cep' => "",
            'logradouro'=>"",
            'numero' => "",
            'complemento' => "",
            'bairro' => "",
            'cidade' => "",
            'uf' => ""
        ];
    }

    $enderecoDao = new EnderecoDao($pdo, $tipo);
    
    if($tipo == 1)
        $dadosEndereco = $enderecoDao->findByIdPessoa($dadosOrcamento->getIdPessoaFisica(), $tipo);
    else
        $dadosEndereco = $enderecoDao->findByIdPessoa($dadosOrcamento->getIdPessoaJuridica(), $tipo);

    //REFATORAR, RIDICULO
    $json['id_endereco'] = $dadosEndereco->getId();
    $json['cep'] = $dadosEndereco->getCep();
    $json['logradouro'] = $dadosEndereco->getLogradouro();
    $json['numero'] = $dadosEndereco->getNumero();
    $json['complemento'] = $dadosEndereco->getComplemento();
    $json['bairro'] = $dadosEndereco->getBairro();
    $json['cidade'] = $dadosEndereco->getCidade();
    $json['uf'] = $dadosEndereco->getEstado();

    $dadosItensOrcamento = $itensOrcamentoDao->findAllByOrcamento($id);

    if($dadosItensOrcamento){
        foreach($dadosItensOrcamento as $item){
            array_push($json['itens_orcamento'], $item);
            array_push($valorTotal, $item['preco'] * $item['quantidade']);
        }
    }else
        $json['itens_orcamento'] = FALSE;

    $json['valor_total'] = array_sum($valorTotal) - $json['valor_desconto'];

    echo(json_encode($json));
    // print_r($valorTotal);
}

?>