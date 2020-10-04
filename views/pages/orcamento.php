<?php

session_start();
 
    if(empty($_SESSION['token'])){
    
        header('Location: login.php');
    
    }

    $modo = filter_input(INPUT_GET, 'modo');
    $tipoDeCadastro = 'add';
    $txtButton = "Gerar orçamento";
    $textoConfirmacao = "Deseja gerar orçamento?";

    if(isset($modo)){
        if(strtoupper($modo) == "EDITAR"){
            $tipoDeCadastro = 'edit';
            $txtButton = 'Editar orçamento';
            $textoConfirmacao = 'Deseja salvar alterações?';
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>EXB</title>
        <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="../assets/css/styles.css">
        <script src="../assets/js/input_field_validators.js"></script>
    </head>
    <body>
        <div id="modal_itens">
            
        </div>
        <nav class="width-100p mb-3 navbar pd-zero navbar-expand-lg navbar-dark bg-primary">
            <div class="container d-flex justify-content-end">
                <div class="nav-item text-white d-flex justify-content-center align-items-center">
                    <a href="home.php" class="text-white font-weight-bold">Home</a>
                </div>

                <div class="ativar-nav-item nav-item text-white d-flex justify-content-center align-items-center">
                    <span class="font-weight-bold">Orçamento</span>
                </div>
            </div>
        </nav>
        <div class="row width-100p mb-3">
            <div class="container">
                <div class="col s12 d-flex justify-content-center">
                    <h1>Orçamento</h1>
                </div>
            </div>
        </div>
        <div class="row width-100p">
            <div class="container">
                <div class="col s12">
                    <!-- action="../../validacoes/validaForm.php" method="POST" -->
                    <form id="cadastro-orcamento" class="p-3 mb-5" >
                        
                        <div class="row mb-3">
                            <div class="col mb-3">
                                <label for="vendedor" >
                                    Vendedor
                                </label>
                                <input class="form-control"  type="text" name="vendedor" id="vendedor" onkeypress="return validarEntrada(event, 'numeric')">
                                <p class="text-muted">Campos marcados são obrigatórios (<span class="text-danger"> * </span>)</p>
                            </div>
                            <div class="col"></div>
                        </div>
                        <!-- DADOS DO CLIENTE -->
                        <div id="dados-cliente">
                            <div class="linha-dados-cliente mb-3">
                                Dados do cliente
                            </div>
                            <div class="form-row d-flex justify-content-center mb-3">
                                <!-- TIPO DE CLIENTE -->
                                <div class="form-check mr-5">
                                    <input onchange="mudarTipoCliente()" class="form-check-input"  type="radio" name="tipo-cliente" id="pessoa-fisica" value="1" checked>
                                    <label class="form-check-label" for="pessoa-fisica" >
                                        Pessoa Física
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input onchange="mudarTipoCliente()" class="form-check-input" type="radio" name="tipo-cliente" id="pessoa-juridica" value="2" >
                                    <label class="form-check-label" for="pessoa-juridica">
                                        Pessoa Jurídica
                                    </label>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col">
                                    <div id="nome-completo">
                                        <label for="">Nome completo <span class="text-danger">*</span> </label>
                                        <input  type="text" class="form-control" id="nome_completo" name="nome_completo" onkeypress="return validarEntrada(event, 'numeric')">
                                    </div>

                                    <div id="razao-social" class="d-none">
                                        <label for="">Razão social <span id="pj_razao" class="text-danger">*</span> </label>
                                        <input  type="text" class="form-control" id="razao_social" name="razao_social" >
                                    </div>
                                </div>
                                <div id="nome-fantasia" class="col d-none">
                                    <label for="">Nome fantasia <span id="pj_nome" class="text-danger">*</span> </label>
                                    <input  type="text" class="form-control" id="nome_fantasia" name="nome_fantasia" >
                                </div>

                                <div class="col">
                                    <div id="cpf-input">
                                        <label for="">CPF</label>
                                        <input type="text" class="form-control" id="cpf" name="cpf" onkeypress="return mascaraCPF(this,event)">
                                    </div>

                                    <div id="cnpj-input" class="d-none">
                                        <label for="">CNPJ</label>
                                        <input type="text" class="form-control" id="cnpj" name="cnpj" onkeypress="return mascaraCNPJ(this, event)">
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col">
                                    <label for="">CEP <span class="text-danger">*</span> </label>
                                    <input type="text" class="form-control" name="cep" id="cep" onblur="pesquisarCep(this.value)" maxlength="8" onkeypress="return mascaraCep(this, event)" placeholder="06622000">
                                </div>
                                <div class="col">
                                    <label for="">Logradouro</label>
                                    <input type="text" class="form-control" name="logradouro" id="logradouro" >
                                </div>
                                <div class="col">
                                    <label for="">Bairro</label>
                                    <input type="text" class="form-control" name="bairro" id="bairro">
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-2">
                                    <label for="">Número</label>
                                    <input type="text" class="form-control" name="numero" id="numero" onkeypress="return validarEntrada(event, 'string')">
                                </div>
                                <div class="col-3">
                                    <label for="">Cidade</label>
                                    <input type="text" class="form-control" name="cidade" id="cidade">
                                </div>
                                <div class="col-2">
                                    <div class="form-group">
                                        <label for="">UF</label>
                                        <input type="text" class="form-control" name="estado" id="uf" maxlength="2" onkeypress="return mascaraUf(this, event)">
                                    </div>
                                </div>
                                <div class="col-5">
                                    <label for="">Complemento</label>
                                    <input type="text" class="form-control" name="complemento" id="complemento">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-4">
                                    <label for="">Telefone</label>
                                    <input type="text" class="form-control" name="telefone" id="telefone" onkeypress="return mascaraFone(this, event)" placeholder="(11)40043555">
                                </div>
                                <div class="col-4">
                                    <label for="">Celular <span class="text-danger">*</span> </label>
                                    <input type="text" class="form-control" name="celular" id="celular" onkeypress="return mascaraFone(this, event)" placeholder="(11)955559999">
                                </div>
                                <div class="col">
                                    <label for="">Email</label>
                                    <input type="text" class="form-control" name="email" id="email">
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div id="dados-pedidos">
                            <div class="linha-dados-cliente mb-3">
                                Dados do pedido
                            </div>
                            <div class="row mb-4">
                                <!-- CADASTRAR ITENS NO PEDIDO -->
                                <div class="col-6">
                                    <label for="">Descrição do item</label>
                                    <input type="text" class="form-control" name="descricao_item" id="desc_item">
                                </div>
                                <div class="col-2">
                                    <label for="">Quantidade</label>
                                    <input type="text" class="form-control" name="quantidade" id="quantidade_item" onkeypress="return validarEntrada(event, 'string')">
                                </div>
                                <div class="col-2">
                                    <label for="">Preço</label>
                                    <input type="text" class="form-control" name="preco" id="preco_item"  onkeypress="return validarEntradaComVirgula(event)">
                                </div>
                                <div class="col-2 d-flex align-items-end">
                                    <input value="adicionar" type="button" onclick="adicionarItens()" class="form-control btn btn-info">
                                </div>
                            </div>
                            <!-- ITENS CADASTRADOS -->
                            <span class="sub-title"> Produtos cadastrados </span>
                            <table class="table table-striped table-hover mt-2 hoverble">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">Descrição do item</th>
                                        <th scope="col">Qtd</th>
                                        <th scope="col">Valor unitário</th>
                                        <th scope="col">Valor</th>
                                        <th scope="col">Opções</th>
                                    </tr>
                                </thead>
                                <tbody id="tbody">
                                    <!-- Linhas sendo cadastradas com JS -->
                                </tbody>
                            </table>
                            <div class="row mb-3 d-flex justify-content-between">
                                <!-- CADASTRAR ITENS NO PEDIDO -->
                                <div class="col-2">
                                    <label for="">Valor Desconto</label>
                                    <input type="text" class="form-control" id="valor_desconto" name="valor_desconto" value=""  onkeyup="aplicarDesconto()">
                                </div>
                                <div class="col-4 ">
                                    <label for="valor_total">Valor Total</label>
                                    <input class="form-control" type="text" id=valor_total readonly placeholder="Valor total" name="valor_total" value="0">
                                </div>
                            </div>
                            <hr>

                            <div id="condicao_pagamento_wrapper">
                                <div class="linha-dados-cliente mb-3">
                                    Condição de pagamento
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control" name="condicao_pagamento" id="condicao_pagamento"></textarea>
                                </div>
                            </div>
                            
                            
                        </div>
                        <hr>
                        <!-- OBSERVAÇÕES -->
                        <div id="observacoes-txt" class=" mb-4">
                            <div class="linha-dados-cliente mb-3">
                                Observações
                            </div>
                            <div class="form-group">
                                <textarea class="form-control no-resize" name="observacoes" id="observacoes"></textarea>
                            </div>
                        </div>

                        <div class="row d-flex justify-content-center">
                            <div class="col-6">
                                <button type="button" id="btn-cadastrar" onclick="return confirm('<?=$textoConfirmacao?>') ? cadastroOrcamento('<?=$tipoDeCadastro?>') : null" class="btn btn-primary btn-lg btn-block"><?=$txtButton?></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
        <footer class="d-flex justify-content-center align-items-center">
            <h5 class="text-white">2020 - EXB Marcenaria</h5>
        </footer>
        <script src="../assets/js/jquery.js"></script>
        <script src="../assets/js/formHelpers.js"></script>
        <script src="../assets/js/external_services.js"></script>
        <script src="../assets/js/ajax_cadastro_orcamento.js"></script>
        <script src="../assets/js/ajax_editar_orcamento.js"></script>
        <script src="../assets/js/orcamento.js"></script>
        <script src="../assets/js/modalHelpers.js"></script>
        
    </body>
</html>