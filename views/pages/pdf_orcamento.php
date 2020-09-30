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
        <nav id="heade_pdf">
            <div class="container">
                <div class="row">
                    <div class="col m4 d-flex justify-content-center align-items-center">
                        <div class="exb_logo d-flex justify-content-center align-items-center flex-column">
                            <p>EXB</p>
                            <p>Marcenaria</p>
                        </div>
                    </div>
                    <div class="col m4 d-flex justify-content-center align-items-center">
                        <h3>Orçamento</h3>
                    </div>
                    <div class="col m4 d-flex justify-content-center flex-column">
                        <p>Data do orçamento:</p>
                        <p>Vendedor:</p>
                    </div>
                </div>
            </div>
        </nav>
        <div id="exb_info">
            <div class="container">
                <div class="exb_info_wrapper overflow-hidden">
                    <div class="row border-bottom ">
                        <div class="col ">
                            Nome do Cliente
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            Endereço:
                        </div>

                        <div class="col">
                            Cidade:
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            Complemento:
                        </div>

                        <div class="col">
                            CEP:
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            E-mail:
                        </div>

                        <div class="col">
                            Bairro:
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            Celular:
                        </div>

                        <div class="col">
                            Telefone:
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="itens_wrapper" class="mb-3">
            <div class="container">
                <div class="itens_orcamento overflow-hidden">
                    <div class="row border-bottom">
                        <div class="col">
                            Orçamento valido por 30 dias
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <table class="table table-striped">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">Descrição do produto</th>
                                        <th scope="col">Qtd</th>
                                        <th scope="col">Valor unitário</th>
                                        <th scope="col">Valor Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Guarda-roupas</td>
                                        <td>2</td>
                                        <td>5.000,00</td>
                                        <td>10.000,00</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>    
                </div>
            </div>
        </div>

        <div id="exb_total" class="mb-3">
            <div class="container">
                <div class="valor_total pr-1 pl-1">
                    <div class="row ">
                        <div class="col d-flex justify-content-end"> 
                            Valor total: R$
                        </div>
                    </div>
                    <div class="row">
                        <div class="col d-flex justify-content-end">
                            Desconto á vista: R$
                        </div>
                    </div>
                    <div class="row">
                        <div class="col d-flex justify-content-end font-weight-bold">
                            Valor final: R$
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="exb_condicoes_pagamento" class="mb-3 ">
            <div class="container">
                <div class="condicoes_pagamento p-1">
                    <div class="row">
                        <div class="col d-flex justify-content-start"> 
                            <span class="font-weight-bold">Condições de pagamento</span> 
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="exb_observacoes" class="mb-3 ">
            <div class="container">
                <div class="observacoes p-1">
                    <div class="row">
                        <div class="col d-flex justify-content-start"> 
                            <span class="font-weight-bold">Observações:</span> 
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="exb_footer">
            <div class="container">
                <div class="info_footer_exb pl-2">
                    <div class="row">
                        <div class="col d-flex justify-content-start">
                            Nome fansatia: EXB Móveis e Serviços
                        </div>
                        <div class="col d-flex justify-content-center">
                            Endereço: R. Tietê, 20 - Jandira/SP
                        </div>
                    </div>

                    <div class="row">
                        <div class="col d-flex justify-content-start">
                            Razão social: Vitor Luan Pereira de Oliveira
                        </div>
                        <div class="col d-flex justify-content-center">
                            Bairro: Jd. das Margaridas
                        </div>
                    </div>

                    <div class="row">
                        <div class="col d-flex justify-content-start">
                            CNPJ: 28.194.290/0001-70
                        </div>
                        <div class="col d-flex justify-content-center">
                            CEP: 06622-130
                        </div>
                    </div>

                    <div class="row">
                        <div class="col d-flex justify-content-start">
                            Telefone: (11) 97702-4222
                        </div>
                        <div class="col d-flex justify-content-center">
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>