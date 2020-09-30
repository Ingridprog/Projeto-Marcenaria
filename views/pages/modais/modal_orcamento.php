<div class="content p-3">
    <div class="row mb-2">
        <div class="col d-flex justify-content-center">
            <h5>Resumo do orçamento</h5>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <p >Data: </p>
        </div>  
    </div>

    <div id="tipo_cliente_wrapper">
        <div class="row">
            <div class="col">
                <p>Nome completo: Pedro Medeiros</p>
            </div>  
            <div class="col">
                <p>CPF: 456.057.368-95</p>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <p>Celular:</p>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <p>Telefone:</p>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <p>Email:</p>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <h6>Itens do orçamento</h6>
        </div>  
        <div class="col">
            <h6>Total:</h6>
        </div>
    </div>
    
    <div id="table_wrapper" class="fix-height overflow-auto mb-3">
        <table class="table table-striped table-hover mt-2 hoverble ">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Descrição do item</th>
                    <th scope="col">Qth</th>
                    <th scope="col">Valor unitário</th>
                    <th scope="col">Valor</th>
                </tr>
            </thead>
            <tbody id="tbody-modal" >
            <tr>
                    <td>Descrição do item</td>
                    <td>Qtd</td>
                    <td>Valor unitário</td>
                    <td>Valor</td>
                </tr>
                <tr>
                    <td>Descrição do item</td>
                    <td>Qtd</td>
                    <td>Valor unitário</td>
                    <td>Valor</td>
                </tr>
                <tr>
                    <td>Descrição do item</td>
                    <td>Qtd</td>
                    <td>Valor unitário</td>
                    <td>Valor</td>
                </tr>
                <tr>
                    <td>Descrição do item</td>
                    <td>Qtd</td>
                    <td>Valor unitário</td>
                    <td>Valor</td>
                </tr>
                <tr>
                    <td>Descrição do item</td>
                    <td>Qtd</td>
                    <td>Valor unitário</td>
                    <td>Valor</td>
                </tr>
                <tr>
                    <td>Descrição do item</td>
                    <td>Qtd</td>
                    <td>Valor unitário</td>
                    <td>Valor</td>
                </tr>
                <tr>
                    <td>Descrição do item</td>
                    <td>Qtd</td>
                    <td>Valor unitário</td>
                    <td>Valor</td>
                </tr>
                <!-- Linhas sendo cadastradas com JS -->
            </tbody>
        </table>
    </div>

    <div class="row">
        <div class="col d-flex justify-content-center">
            <button class="btn btn-success" >
                Gerar PDF
                <img src="../assets/img/pdf-file.png" class="button-icon" alt="pdf">
            </button>
            
        </div>
        <div class="col d-flex justify-content-center">
            <button class="btn btn-danger" onclick="fecharModal()">Fechar 
                <img src="../assets/img/x-mark.png" class="button-icon" alt="close">
            </button>
        </div>
    </div>
    
</div>