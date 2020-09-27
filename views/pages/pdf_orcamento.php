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

        <div id="itens_wrapper">
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
    </body>
</html>