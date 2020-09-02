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
        <nav class="width-100p mb-5 navbar pd-zero navbar-expand-lg navbar-dark bg-primary">
            <div class="container d-flex justify-content-end">
                <div class="ativar-nav-item nav-item text-white d-flex justify-content-center align-items-center">
                    <a href="lista.php" class="text-white font-weight-bold">Home</a>
                </div>

                <div class="nav-item text-white d-flex justify-content-center align-items-center">
                    <a href="orcamento.php" class="text-white font-weight-bold">Orçamento</a>
                </div>
            </div>
        </nav>
        <div class="row width-100p mb-5">
            <div class="container">
                
                    <div class="row d-flex justify-content-center align-items-center">
                        <h1>Bem-vindo(a)</h1>
                    </div>
                
            </div>
        </div>
        <div class="row width-100p mb-5">
            <div class="col s11">
                <div class="container">
                    <div class="mb-3 row d-flex justify-content-center align-items-center">
                        Pesquisar por:
                    </div>

                    <div class="row d-flex mb-4 justify-content-center align-items-center">
                        <div class="form-check mr-4">
                            <input onchange="mudarTipoBusca()" class="form-check-input" type="radio" name="tipo-busca" id="nome" value="1">
                            <label class="form-check-label" for="nome">
                                Nome do cliente
                            </label>
                        </div>

                        <div class="form-check">
                            <input onchange="mudarTipoBusca()" class="form-check-input" type="radio" name="tipo-busca" id="data" value="2">
                            <label class="form-check-label" for="data">
                                Data do orçamento
                            </label>
                        </div>
                    </div>

                    <div class="row d-flex justify-content-center align-items-center">
                        <div class="form-group d-flex">
                            <input type="text" class="form-control big-input right-radius-none custom-bootstrap-input" id="busca"> <button class="botao-pesquisar right-radius-block"> <img class="button-icon" src="../assets/img/search.png" alt="search" /> </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row width-100p no-margin big-height overflow-auto">
           
                <table class="table md-table table-striped">
                    <thead class="table-head-bg text-white">
                        <tr>
                            <th scope="col">Data</th>
                            <th scope="col">Nome do cliente</th>
                            <th scope="col">Valor do orçamento</th>
                            <th scope="col">Opção</th>
                        </tr>     
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>Jacob</td>
                            <td>Thornton</td>
                            <td>@fat</td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td>Larry</td>
                            <td>the Bird</td>
                            <td>@twitter</td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td>Larry</td>
                            <td>the Bird</td>
                            <td>@twitter</td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td>Larry</td>
                            <td>the Bird</td>
                            <td>@twitter</td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td>Larry</td>
                            <td>the Bird</td>
                            <td>@twitter</td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td>Larry</td>
                            <td>the Bird</td>
                            <td>@twitter</td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td>Larry</td>
                            <td>the Bird</td>
                            <td>@twitter</td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td>Larry</td>
                            <td>the Bird</td>
                            <td>@twitter</td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td>Larry</td>
                            <td>the Bird</td>
                            <td>@twitter</td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td>Larry</td>
                            <td>the Bird</td>
                            <td>@twitter</td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td>Larry</td>
                            <td>the Bird</td>
                            <td>@twitter</td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td>Larry</td>
                            <td>the Bird</td>
                            <td>@twitter</td>
                        </tr>
                    </tbody>
                </table>
           
            
        </div>
        <footer class="d-flex justify-content-center align-items-center">
            <h5 class="text-white">2020 - EXB Marcenaria</h5>
        </footer>

        <script src="../assets/js/jquery.js"></script>
        <script src="../assets/js/formHelpers.js"></script>
    </body>
</html>