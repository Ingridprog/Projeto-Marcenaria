<?php

require_once(dirname(__FILE__)."/../config.php");
require_once($base."/DAO/OrcamentoDao.php");
require_once($base."/DAO/PessoaFisicaDao.php");
require_once($base."/DAO/PessoaJuridicaDao.php");
require_once($base."/DAO/ItensOrcamentoDao.php");

$orcamentoDao = new OrcamentoDao($pdo);
$pessoaFisicaDao = new PessoaFisicaDao($pdo);
$pessoaJuridicaDao = new PessoaJuridicaDao($pdo);
$itensOrcamentoDao = new ItensOrcamentoDao($pdo);

$dadosOrcamento = [];
$dadosPessoaFisica = [];
$dadosPessoaFisica = [];

$button = "Gerar Orçamento";
$tipo = "";

$id = filter_input(INPUT_POST, 'id');

if(isset($id)){
    
    $button = "Editar";

    $dadosOrcamento = $orcamentoDao->findById($id);

    if($dadosOrcamento->getIdPessoaFisica() != NULL){
        $dadosPessoaFisica = $pessoaFisicaDao->findById($dadosOrcamento->getIdPessoaFisica());
        $tipo = 'pessoa-fisica';

        $json = [
            'id' => $dadosOrcamento->getId(),
            'hora' => $dadosOrcamento->getHora(),
            'data' => $dadosOrcamento->getData(),
            'observacoes' => $dadosOrcamento->getObservacoes(),
            'valor_desconto' => $dadosOrcamento->getValorDesconto(),
            'valor_total' => $dadosOrcamento->getValorTotal(),
            'pessoa_fisica' => [
                'id' => $dadosPessoaFisica->getId(),
                'nome' => $dadosPessoaFisica->getNome(),
                'cpf' => $dadosPessoaFisica->getCpf(),
                'telefone' => $dadosPessoaFisica->getTelefone(),
                'celular' => $dadosPessoaFisica->getCelular(),
                'email' => $dadosPessoaFisica->getEmail()
            ],
            'itens_orcamento' => []
        ];
    }elseif($dadosOrcamento->getIdPessoaJuridica()){
        $dadosPessoaJuridica = $pessoaJuridicaDao->findById($dadosOrcamento->getIdPessoaJuridica());
        $tipo = 'pessoa-juridica';

        $json = [
            'id' => $dadosOrcamento->getId(),
            'hora' => $dadosOrcamento->getHora(),
            'data' => $dadosOrcamento->getData(),
            'observacoes' => $dadosOrcamento->getObservacoes(),
            'valor_desconto' => $dadosOrcamento->getValorDesconto(),
            'valor_total' => $dadosOrcamento->getValorTotal(),
            'pessoa_juridica' => [
                'id' => $dadosPessoaJuridica->getId(),
                'razao_social' => $dadosPessoaJuridica->getRazaoSocial(),
                'nome_fantasia' => $dadosPessoaJuridica->getNomeFantasia(),
                'cnpj' => $dadosPessoaJuridica->getCnpj(),
                'telefone' => $dadosPessoaJuridica->getTelefone(),
                'celular' => $dadosPessoaJuridica->getCelular(),
                'email' => $dadosPessoaJuridica->getEmail()
            ],
            'itens_orcamento' => []
        ];
    }

    $dadosItensOrcamento = $itensOrcamentoDao->findAllByOrcamento($id);

    if($json['itens_orcamento'] == [])
        $json['itens_orcamento'] = 'Sem itens';
    else{
        foreach($dadosItensOrcamento as $item){
            array_push($json['itens_orcamento'], $item);
        }
    }

    echo(json_encode($json));
}

?>