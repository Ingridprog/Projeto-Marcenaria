<?php
require_once('../../config.php');

if(empty($_SESSION['token'])){
   
    header('Location: login.php');
 
}

require_once("$base/DAO/OrcamentoDao.php");
require_once("$base/DAO/PessoaFisicaDao.php");
require_once("$base/DAO/PessoaJuridicaDao.php");
require_once("$base/DAO/EnderecoDao.php");
require_once("$base/DAO/ItensOrcamentoDao.php");

$orcamentoDao = new OrcamentoDao($pdo);
$pessoaFisicaDao = new PessoaFisicaDao($pdo);
$pessoaJuridicaDao = new PessoaJuridicaDao($pdo);

$itensOrcamentoDao = new ItensOrcamentoDao($pdo);

$id = filter_input(INPUT_GET, 'id');
$tipo = 0;

if(isset($id)){
    $dadosOrcamento = $orcamentoDao->findById($id);
    $nomeCliente = "";
    
    if($dadosOrcamento->getIdPessoaJuridica() == null){
        $tipo=1;
        $dadosCliente = $pessoaFisicaDao->findById($dadosOrcamento->getIdPessoaFisica());
        $nomeCliente = $dadosCliente->getNome();
    }else{
        $tipo=2;
        $dadosCliente = $pessoaJuridicaDao->findById($dadosOrcamento->getIdPessoaJuridica());
        $nomeCliente = $dadosCliente->getNomeFantasia();
    }
    $enderecoDao = new EnderecoDao($pdo, $tipo);
    $dadosEndereco = $enderecoDao->findByIdPessoa($dadosCliente->getId(),$tipo);

    $itens = $itensOrcamentoDao->findAllByOrcamento($id);
    $dataFormatada = explode("-",$dadosOrcamento->getData());
    $dataFormatada = $dataFormatada[2]."/".$dataFormatada[1]."/".$dataFormatada[0];
}




?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>EXB - Marcenaria</title>
        <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="../assets/css/pdf_styles.css">
    </head>
    <body>
        <table>
            <thead class="manter_header " >
                <tr>
                    <td>
                        <div class="header_fake mb-4"></div>
                    </td>
                </tr>
                
            </thead>
            <tbody class="conteundo_page max-width">
                <tr class="max-width">
                    <td class="max-width">
                        <div class="conteudo_dinamico">
                            <div class="container altura-fixa">
                                <div id="exb_info" >
                                    <div class="container">
                                        <div class="exb_info_wrapper overflow-hidden pt-2">
                                            <div class="row ">
                                                <div class="col ">
                                                    <span class="bolder"> Nome do Cliente: <?=$nomeCliente?> </span>
                                                </div>

                                                <div class="col ">
                                                    Vendedor: <?=$dadosOrcamento->getVendedor()?>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col">
                                                    Endereço: <?=$dadosEndereco->getLogradouro()?> - <?=$dadosEndereco->getNumero()?>
                                                </div>

                                                <div class="col">
                                                    Cidade: <?=$dadosEndereco->getCidade()?> - <?=$dadosEndereco->getEstado()?>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    Complemento: <?=$dadosEndereco->getComplemento()?>
                                                </div>

                                                <div class="col">
                                                    CEP: <?=$dadosEndereco->getCep()?>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col">
                                                    E-mail: <?=$dadosCliente->getEmail()?>
                                                </div>

                                                <div class="col">
                                                    Bairro: <?=$dadosEndereco->getBairro()?>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col">
                                                    Celular: <?=$dadosCliente->getCelular()?>
                                                </div>

                                                <div class="col">
                                                    Telefone: <?=$dadosCliente->getTelefone()?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div id="itens_wrapper" class="mb-3">
                                    <div class="container">
                                        <div class="itens_orcamento overflow-hidden">
                                            <div class="row">
                                                <div class="col">
                                                    Orçamento gerado: <?=$dataFormatada?> 
                                                </div>
                                                <div class="col">
                                                    Orçamento valido por 30 dias
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <table class="table table-striped">
                                                        <thead class="thead-dark all_borders">
                                                            <tr>
                                                                <th scope="col">Descrição do produto</th>
                                                                <th scope="col">Qtd</th>
                                                                <th scope="col">Valor unitário</th>
                                                                <th scope="col">Valor Total</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            $totalSemDesconto = 0;
                                                                foreach($itens as $item):
                                                                    $totalSemDesconto += ($item['preco'] * $item['quantidade']);
                                                            ?>
                                                            <tr>
                                                                <td><?=$item['descricao_item']?></td>
                                                                <td><?=$item['quantidade']?></td>
                                                                <td>R$ <?=number_format($item['preco'], 2, ",", "")?></td>
                                                                <td>R$ <?=number_format($item['preco'] * $item['quantidade'], 2, ",","")?></td>
                                                            </tr>
                                                            <?php endforeach;?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>    
                                        </div>
                                    </div>
                                </div>

                                <div id="exb_total" class="mb-3">
                                    <div class="container">
                                        <div class="valor_total  pl-1">
                                            <div class="row ">
                                                <div class="col d-flex justify-content-end pr-5"> 
                                                    Valor total: R$ <?=number_format($totalSemDesconto, 2, ",", "")?>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col d-flex justify-content-end border-bottom pr-5">
                                                    Desconto á vista: R$<?=number_format($dadosOrcamento->getValorDesconto(), 2, ",", "")?>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col d-flex justify-content-end font-weight-bold total_valor pr-5">
                                                    Valor final: R$<?=number_format($dadosOrcamento->getValorTotal(), 2, ",", "")?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div id="exb_condicoes_pagamento" class="mb-3 ">
                                    <div class="container">
                                        <div class="condicoes_pagamento p-1">
                                            <div class="row">
                                                <div class="col d-flex align-items-start flex-column"> 
                                                    <span class="font-weight-bold">Condições de pagamento</span>
                                                    <p><?=$dadosOrcamento->getCondicaoPagamento()?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div id="exb_observacoes" class="mb-3 ">
                                    <div class="container">
                                        <div class="observacoes p-1">
                                            <div class="row">
                                                <div class="col d-flex align-items-start flex-column"> 
                                                    <span class="font-weight-bold">Observações:</span>
                                                    <p><?=$dadosOrcamento->getObservacoes()?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
            </tbody>
            <tfoot class="report_foot">
                <tr>
                    <td>
                        <div class="footer_fake"></div>
                        
                    </td>
                </tr>
                
            </tfoot>
        </table>
        <div id="heade_pdf">
            
                <div class="row no_m_p">
                    <div class="col m4 d-flex justify-content-center align-items-center bg-white">
                        <div class="exb_logo d-flex justify-content-center align-items-center flex-column">
                            <img src="../assets/img/logo.png" alt="exb_logo">
                        </div>
                    </div>
                    <div class="col m4 d-flex justify-content-center align-items-center degrade_top1">
                        
                    </div>
                    <div class="col m4 d-flex justify-content-center flex-column degrade_top2">
                        <h2 class="text-white">ORÇAMENTO</h2>
                    </div>
                </div>
            
        </div>
        <div id="exb_footer">
            
                <div class="info_footer_exb pl-2">
                    <div class="row">
                        <div class="col d-flex justify-content-start">
                            Nome fansatia: EXB Móveis e Serviços
                        </div>
                        <div class="col d-flex justify-content-center text-white">
                            Endereço: R. Tietê, 20 - Jandira/SP
                        </div>
                    </div>

                    <div class="row">
                        <div class="col d-flex justify-content-start ">
                            Razão social: Vitor Luan Pereira de Oliveira
                        </div>
                        <div class="col d-flex justify-content-center text-white">
                            Bairro: Jd. das Margaridas
                        </div>
                    </div>

                    <div class="row">
                        <div class="col d-flex justify-content-start">
                            CNPJ: 28.194.290/0001-70
                        </div>
                        <div class="col d-flex justify-content-center text-white">
                            CEP: 06622-130
                        </div>
                    </div>

                    <div class="row">
                        <div class="col d-flex justify-content-start">
                            Telefone: (11) 97702-4222
                        </div>
                        <div class="col d-flex justify-content-center text-white">
                            
                        </div>
                    </div>
                </div>
            
        </div>
        <script src="js/jquery.js"></script>
        <script>
            window.onload = function(){
                window.print();
                setTimeout(window.close,0);
            }
        </script>
    </body>
</html>