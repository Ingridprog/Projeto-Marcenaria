
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
                    <a href="lista.php" class="text-white font-weight-bold">Home</a>
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
                                <input onchange="mudarTipoCliente()" class="form-check-input" type="radio" name="tipo-cliente" id="pessoa-fisica" value="1" >
                                <label class="form-check-label" for="pessoa-fisica">
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
                                        <input type="text" class="form-control" name="nome_completo">
                                    </div>

                                    <div id="razao_social" class="d-none">
                                        <label for="">Razão social</label>
                                        <input type="text" class="form-control" name="razao_social">
                                    </div>
                                </div>
                                <div id="nome-fantasia" class="col d-none">
                                    <label for="">Nome fantasia</label>
                                    <input type="text" class="form-control" name="nome_fantasia">
                                </div>

                                <div class="col">
                                    <div id="cpf-input">
                                        <label for="">CPF</label>
                                        <input type="text" class="form-control" name="cpf">
                                    </div>

                                    <div id="cnpj-input" class="d-none">
                                        <label for="">CNPJ</label>
                                        <input type="text" class="form-control" name="cnpj">
                                    </div>
                                </div>
                                
                                
                            </div>
                            <div class="row mb-2">
                                <div class="col">
                                    <label for="">CEP</label>
                                    <input type="text" class="form-control" name="cep">
                                </div>
                                <div class="col">
                                    <label for="">Logradouro</label>
                                    <input type="text" class="form-control" name="logradouro">
                                </div>
                                <div class="col">
                                    <label for="">Bairro</label>
                                    <input type="text" class="form-control" name="bairro">
                                </div>
                            </div>

                            <div class="row mb-2">
                                <div class="col-2">
                                    <label for="">Número</label>
                                    <input type="text" class="form-control" name="numero">
                                </div>
                                <div class="col-3">
                                    <label for="">Cidade</label>
                                    <input type="text" class="form-control" name="cidade">
                                </div>
                                <div class="col-2">
                                    <div class="form-group">
                                        <label for="">Estado</label>
                                        <select class="form-control" name="estado">
                                        <option selected disabled name="estado">Estado</option>
                                        <option value='São Paulo'>SP</option>
                                        <option value='Rio de Janeiro'>RJ</option>  
                                        </select>
                                    </div>
                                </div>
                                <div class="col-5">
                                    <label for="">Complemento</label>
                                    <input type="text" class="form-control" name="complemento">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-4">
                                    <label for="">Telefone</label>
                                    <input type="text" class="form-control" name="telefone">
                                </div>
                                <div class="col-4">
                                    <label for="">Celular</label>
                                    <input type="text" class="form-control" name="celular">
                                </div>
                                <div class="col">
                                    <label for="">Email</label>
                                    <input type="text" class="form-control" name="email">
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
                                    <input type="text" class="form-control" name="descricao_item">
                                </div>
                                <div class="col-2">
                                    <label for="">Quantidade</label>
                                    <input type="text" class="form-control" name="quantidade">
                                </div>
                                <div class="col-2">
                                    <label for="">Preço</label>
                                    <input type="text" class="form-control" name="preco">
                                </div>
                                <div class="col-2 d-flex align-items-end">
                                    <input value="adicionar" type="submit" class="form-control btn btn-info">
                                </div>
                            </div>
                            <!-- ITENS CADASTRADOS -->
                            <span class="sub-title"> Produtos cadastrados </span>
                            <table class="table mt-2">
                                <tbody>
                                    <tr>
                                        <td>Descrição do item</td>
                                        <td>Qtd</td>
                                        <td>Preço</td>
                                        <td class="small-column">
                                           <button class="btn btn-sm btn-warning">Editar</button>
                                           <button class="btn btn-sm btn-danger">Excluir</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Descrição do item</td>
                                        <td>Qtd</td>
                                        <td>Preço</td>
                                        <td class="small-column">
                                            <button class="btn btn-sm btn-warning">Editar</button>
                                            <button class="btn btn-sm btn-danger">Excluir</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Descrição do item</td>
                                        <td>Qtd</td>
                                        <td>Preço</td>
                                        <td class="small-column">
                                            <button class="btn btn-sm btn-warning">Editar</button>
                                            <button class="btn btn-sm btn-danger">Excluir</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="row mb-3">
                                <!-- CADASTRAR ITENS NO PEDIDO -->
                                <div class="col-2">
                                    <label for="">Valor Serviço</label>
                                    <input type="text" class="form-control" name="valor_servico">
                                </div>
                                <div class="col-2">
                                    <label for="">Valor Desconto</label>
                                    <input type="text" class="form-control" name="valor_desconto">
                                </div>
                                <div class="col-4">
                                    <label for="">Valor material</label>
                                    <input type="text" class="form-control" name="valor_material">
                                </div>
                                <div class="col-4 d-flex align-items-end">
                                    <input class="form-control" type="text" readonly placeholder="Valor total" name="valor_total">
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
                                <button type="button" class="btn btn-primary btn-lg btn-block">Gerar orçamento</button>
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
    </body>
</html>