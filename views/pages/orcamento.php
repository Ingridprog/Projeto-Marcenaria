<?php
    require_once(dirname(__FILE__)."/../../config.php");
    require_once($base."/DAO/OrcamentoDao.php");
    require_once($base."/DAO/PessoaFisicaDao.php");
    require_once($base."/DAO/PessoaJuridicaDao.php");

    $orcamentoDao = new OrcamentoDao($pdo);
    $pessoaFisicaDao = new PessoaFisicaDao($pdo);
    $pessoaJuridicaDao = new PessoaJuridicaDao($pdo);

    $dadosOrcamento = [];
    $dadosPessoaFisica = [];
    $dadosPessoaFisica = [];

    $button = "Gerar Orçamento";
    $tipo = "";

    $id = filter_input(INPUT_GET, 'id');
    $modo = filter_input(INPUT_GET, 'modo');
    if(isset($modo)){
        if(strtoupper($modo) == "EDITAR"){
            $button = "Editar";

            $dadosOrcamento = $orcamentoDao->findById($id);

            if($dadosOrcamento->getIdPessoaFisica() != NULL){
                $dadosPessoaFisica = $pessoaFisicaDao->findById($dadosOrcamento->getIdPessoaFisica());
                $tipo = 'pessoa-fisica';
            }elseif($dadosOrcamento->getIdPessoaJuridica()){
                $dadosPessoaJuridica = $pessoaJuridicaDao->findById($dadosOrcamento->getIdPessoaJuridica());
                $tipo = 'pessoa-juridica';
            }
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
                    <form id="cadastro-orcamento" class="p-3 mb-5" action="../../validacoes/validaForm.php" method="POST">
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
                                    <div id="nome_completo">
                                        <label for="">Nome completo</label>
<<<<<<< HEAD
                                        <input type="text" class="form-control" name="nome_completo" id="nome_completo">
=======
                                        <input type="text" class="form-control" name="nome_completo" value="<?=$dadosPessoaFisica->getNome()?>">
>>>>>>> cf32c6bfc1c13d733f2b08c38eb56c4aa5c363e9
                                    </div>

                                    <div id="razao_social" class="d-none">
                                        <label for="">Razão social</label>
<<<<<<< HEAD
                                        <input type="text" class="form-control" name="razao_social" id="razao_social">
=======
                                        <input type="text" class="form-control" name="razao_social" value="<?php echo (($dadosPessoaJuridica->getRazaoSocial())? "TESTE" :NULL);?>">
>>>>>>> cf32c6bfc1c13d733f2b08c38eb56c4aa5c363e9
                                    </div>
                                </div>
                                <div id="nome-fantasia" class="col d-none">
                                    <label for="">Nome fantasia</label>
                                    <input type="text" class="form-control" name="nome_fantasia" id="nome_fantasia">
                                </div>

                                <div class="col">
                                    <div id="cpf-input">
                                        <label for="">CPF</label>
                                        <input type="text" class="form-control" name="cpf" id="cpf">
                                    </div>

                                    <div id="cnpj-input" class="d-none">
                                        <label for="">CNPJ</label>
                                        <input type="text" class="form-control" name="cnpj" id="cnpj">
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
                                        <td>Descrição do item</td>
                                        <td>Qtd</td>
                                        <td>Valor unitário</td>
                                        <td>Valor</td>
                                        <td>Opções</td>
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
                                    <input type="text" class="form-control" name="valor_desconto" value="" id="valor_desconto" onkeyup="aplicarDesconto()">
                                </div>
                                <div class="col-4 ">
                                    <label for="valor_total">Valor Total</label>
                                    <input class="form-control" type="text" id=valor_total readonly placeholder="Valor total" name="valor_total" value="0">
                                </div>
                            </div>
                            
                            
                        </div>
                        <hr>
                        <!-- OBSERVAÇÕES -->
                        <div id="observacoes" class=" mb-4">
                            <div class="linha-dados-cliente mb-3">
                                Observações
                            </div>
                            <div class="form-group">
                                <textarea class="form-control no-resize" name="observacoes"></textarea>
                            </div>
                        </div>

                        <div class="row d-flex justify-content-center">
                            <div class="col-6">
                                <button type="button" id="btn-cadastrar" onclick="cadastroOrcamento()" class="btn btn-primary btn-lg btn-block"><?=$button?></button>
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
    </body>
</html>