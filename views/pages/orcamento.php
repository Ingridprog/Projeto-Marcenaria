<?php
    $modo = filter_input(INPUT_GET, 'modo');
    $tipoDeCadastro = 'add';
    $txtButton = "Gerar orçamento";

    if(isset($modo)){
        if(strtoupper($modo) == "EDITAR"){
            $tipoDeCadastro = 'edit';
            $txtButton = 'Editar orçamento';
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
    </head>
    <body>
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
                        <!-- TIPO DE CLIENTE -->
                        <div class="form-row d-flex justify-content-center mb-3">
                            <div class="form-check mr-5">
                                <input onchange="mudarTipoCliente()" class="form-check-input"  type="radio" name="tipo-cliente" id="pessoa-fisica" value="1" >
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
                        <!-- DADOS DO CLIENTE -->
                        <div id="dados-cliente">
                            <div class="linha-dados-cliente mb-3">
                                Dados do cliente
                            </div>
                            <div class="row mb-2">
                                <div class="col">
                                    <div id="nome-completo">
                                        <label for="">Nome completo</label>
                                        <input type="text" class="form-control" id="nome_completo" name="nome_completo" >
                                    </div>

                                    <div id="razao-social" class="d-none">
                                        <label for="">Razão social</label>
                                        <input type="text" class="form-control" id="razao_social" name="razao_social" >
                                    </div>
                                </div>
                                <div id="nome-fantasia" class="col d-none">
                                    <label for="">Nome fantasia</label>
                                    <input type="text" class="form-control" id="nome_fantasia" name="nome_fantasia" >
                                </div>

                                <div class="col">
                                    <div id="cpf-input">
                                        <label for="">CPF</label>
                                        <input type="text" class="form-control" id="cpf" name="cpf" >
                                    </div>

                                    <div id="cnpj-input" class="d-none">
                                        <label for="">CNPJ</label>
                                        <input type="text" class="form-control" id="cnpj" name="cnpj" >
                                    </div>
                                </div>
                                
                                
                            </div>
                            <div class="row mb-2">
                                <div class="col">
                                    <label for="">CEP</label>
                                    <input type="text" class="form-control" name="cep" id="cep" onblur="pesquisarCep(this.value)" maxlength="8">
                                </div>
                                <div class="col">
                                    <label for="">Logradouro</label>
                                    <input type="text" class="form-control" name="logradouro" id="logradouro">
                                </div>
                                <div class="col">
                                    <label for="">Bairro</label>
                                    <input type="text" class="form-control" name="bairro" id="bairro">
                                </div>
                            </div>

                            <div class="row mb-2">
                                <div class="col-2">
                                    <label for="">Número</label>
                                    <input type="text" class="form-control" name="numero" id="numero">
                                </div>
                                <div class="col-3">
                                    <label for="">Cidade</label>
                                    <input type="text" class="form-control" name="cidade" id="cidade">
                                </div>
                                <div class="col-2">
                                    <div class="form-group">
                                        <label for="">UF</label>
                                        <input type="text" class="form-control" name="estado" id="uf" maxlength="2">
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
                                    <input type="text" class="form-control" name="telefone" id="telefone">
                                </div>
                                <div class="col-4">
                                    <label for="">Celular</label>
                                    <input type="text" class="form-control" name="celular" id="celular">
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
                                    <input type="text" class="form-control" name="quantidade" id="quantidade_item">
                                </div>
                                <div class="col-2">
                                    <label for="">Preço</label>
                                    <input type="text" class="form-control" name="preco" id="preco_item">
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
                                        <th scope="col">Qth</th>
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
                                <button type="button" id="btn-cadastrar" onclick="cadastroOrcamento(<?=$tipoDeCadastro?>)" class="btn btn-primary btn-lg btn-block"><?=$txtButton?></button>
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
        
    </body>
</html>