<form id="formOrcamento">
    <div class="card-box profile-header">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-12">
                        <h4 class="page-title">Lista de Orçamentos</h4>
                    </div>
                    <div class="col-6">
                        <a href="#" class="btn btn-primary btn-rounded" data-toggle="modal" data-target="#modalOrcamento"><i class="fa fa-plus"></i> Novo Orçamento</a>
                    </div>
                </div>
            </div>
        </div>


                <div class="row">
                    <div class="col-md-12">
                        <div class=" ">

                            <div class="tab-content">
                                <div class="tab-pane show active" id="bottom-tab1">
                                    <div class="table-responsive">

                                        <table class="table mb-0 new-patient-table card  " id="tableOrcamentos">
                                            <thead class=" ">
                                                <tr>
                                                    <th>Data</th>
                                                    <th>Descrição</th>
                                                    <th>Valor</th>
                                                    <th>Status</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody class="text-dark">


                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>


                </div>
    </div>


<div class="modal fade" tabindex="-1" id="modalOrcamento" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Orçamento</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body modal-orcamento">
                <form id="formOrcamento" action="" method="POST" enctype="multipart/form-data">

                    <div class="row">
                        <div class="col-sm-9">
                            <div class="form-group">
                                <label>Descrição <span class="text-danger">*</span></label>
                                <input class="form-control rounded" type="text" id="orcamentoDescricao" name="orcamentoDescricao" value="<?php echo 'Tratamento ' . $paciente[0]['nome']; ?>">
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="form-group">
                                <label>Data</label>
                                <div class="cal-icon">
                                    <input type="text" id="orcamentoData" name="orcamentoData" class="form-control datetimepicker rounded" value="<?php echo date('d/m/Y'); ?>">
                                </div>
                            </div>
                        </div>
                    </div>

                    <h5 class="">Lista de procedimentos</h5>

                    <div id="lista_procedimentos">
                        <dl id="procedimentos">
                            <dt class="h5 list">
                                <div class="card-box border rounded bg-light">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label>Plano <span class="text-danger">*</span></label>
                                                <select class="form-control rounded" id="orcamentoPlano" name="orcamentoPlano[]">
                                                    <option value="particular">Particular</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-sm-7">
                                            <div class="form-group">
                                                <label>Dentista <span class="text-danger">*</span></label>
                                                <select class="form-control rounded" id="orcamentoDentista" name="orcamentoDentista[]">
                                                    <option value="Admin">Admin</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-sm-7">
                                            <div class="form-group">
                                                <label>Procedimento <span class="text-danger">*</span></label>
                                                <select id="orcamentoProcedimento" name="orcamentoProcedimento[]" class="form-control rounded selProcedimento" data-index="1" onchange="">
                                                        <option value="">Selecione...</option>
                                                        <option value="limpeza">Limpeza</option>
                                                        <option value="restauracao">Restauração</option>
                                                        <option value="canal">Tratamento de Canal</option>
                                                        <option value="extracao">Extração</option>
                                                        <option value="clareamento">Clareamento Dental</option>
                                                        <option value="aparelho">Colocação de Aparelho</option>
                                                        <option value="implante">Implante Dentário</option>
                                                        <option value="protetico">Prótese Dentária</option>
                                                        <option value="gengivoplastia">Gengivoplastia</option>
                                                        <option value="radiografia">Radiografia Odontológica</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label>Dentes/Região</label>
                                                <select id="orcamentoDente" name="orcamentoDente[]" class="form-control rounded">
                                                    <option value="vazio"></option>
                                                    <option value="vazio"></option>
                                                    <option value="11">11</option>
                                                    <option value="12">12</option>
                                                    <option value="13">13</option>
                                                    <option value="14">14</option>
                                                    <option value="15">15</option>
                                                    <option value="16">16</option>
                                                    <option value="17">17</option>
                                                    <option value="18">18</option>
                                                    <option value="21">21</option>
                                                    <option value="22">22</option>
                                                    <option value="23">23</option>
                                                    <option value="24">24</option>
                                                    <option value="25">25</option>
                                                    <option value="26">26</option>
                                                    <option value="27">27</option>
                                                    <option value="28">28</option>
                                                    <option value="31">31</option>
                                                    <option value="32">32</option>
                                                    <option value="33">33</option>
                                                    <option value="34">34</option>
                                                    <option value="35">35</option>
                                                    <option value="36">36</option>
                                                    <option value="37">37</option>
                                                    <option value="38">38</option>
                                                    <option value="41">41</option>
                                                    <option value="42">42</option>
                                                    <option value="43">43</option>
                                                    <option value="44">44</option>
                                                    <option value="45">45</option>
                                                    <option value="46">46</option>
                                                    <option value="47">47</option>
                                                    <option value="48">48</option>
                                                    <option value="51">51</option>
                                                    <option value="52">52</option>
                                                    <option value="53">53</option>
                                                    <option value="54">54</option>
                                                    <option value="55">55</option>
                                                    <option value="61">61</option>
                                                    <option value="62">62</option>
                                                    <option value="63">63</option>
                                                    <option value="64">64</option>
                                                    <option value="65">65</option>
                                                    <option value="71">71</option>
                                                    <option value="72">72</option>
                                                    <option value="73">73</option>
                                                    <option value="74">74</option>
                                                    <option value="75">75</option>
                                                    <option value="81">81</option>
                                                    <option value="82">82</option>
                                                    <option value="83">83</option>
                                                    <option value="84">84</option>
                                                    <option value="85">85</option>
                                                    <option value="maxila">Maxila</option>
                                                    <option value="mandibula">Mandíbula</option>
                                                    <option value="face">Face</option>
                                                    <option value="arcadasup">Arcada Superior</option>
                                                    <option value="arcadainf">Arcada Inferior</option>
                                                    <option value="arcadas">Arcadas</option>
                                                    <!-- Adicione as outras opções conforme necessário -->
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-sm-2">
                                            <div class="form-group">
                                                <label>Valor (R$) <span class="text-danger">*</span></label>
                                                <input id="valorProcedimento" name="valorProcedimento[]" class="form-control rounded dinheiro valor" type="text" onChange="totalOrcamento()">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </dt>
                        </dl>

                        <div class="text-center">
                            <button type="button" class="btn btn-outline-secondary shadow btn-rounded" onclick="addProcedimento(1)">Adicionar novo procedimento</button>
                        </div>

                        <div class="card-personalizado" style="margin-top: 40px">
                            <div class="row invoice-payment">
                                <div class="col-sm-7">

                                    <div class="w-100"></div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>
                                                <input id="isParcela" type="checkbox" name="checkbox" onChange="selectParcelamento(1)"> Parcelar Tratamento
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div id="parcela" class="row d-none">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Parcelas: <span class="text-danger">*</span></label>
                                            <input id="quantidadeParcelas" class="form-control rounded" type="number" name="quantidadeParcelas" value="1" onChange="changeParcelas()" min="1">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Valor da parcela:</label>
                                            <input id="valorParcela" name="valorParcela" class="rounded form-control-plaintext" readonly type="text" placeholder="R$0,00">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-5">
                                <div class="m-b-20">
                                    <div class="table-responsive no-border">
                                        <table class="table table-borderless table-light mb-0">
                                            <tbody>
                                                <tr>
                                                    <th>Total:</th>
                                                    <td id="totalOrcamento" name="totalOrcamento" class="text-right text-primary">R$ 0,00</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-3 font-weight-bold">Após salvar orçamento:</div>

                        <div class="col-sm-3">
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="aprovarOrcamento">
                                <label class="custom-control-label" for="aprovarOrcamento">Aprovar orçamento</label>
                            </div>
                        </div>
                    </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                <button type="button" class="btn btn-primary" onclick="salvarOrcamento()">Salvar</button>
            </div>
        </div>
    </div>
</div>
</form>



<div id="visualizar_orcamento" class="modal fade delete-modal" role="dialog">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-body ">

                <div class="row">
                    <div class="col-lg-12">
                        <h4 class="card-title">Visualizando procedimentos</h4>
                        <div class="table-responsive">
                            <table id="tabelaVisualizacaoProcedimentos" class="table mb-0 table-striped">
                                <thead>
                                    <tr>
                                        <th>Procedimento</th>
                                        <th>Dente</th>
                                        <th>Valor</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="row">



                    <div class="col-sm-12 ">

                        <div class="table-responsive no-border">
                            <table class="table table-borderless table-light table-sm">
                                <tbody>
                                    <tr>
                                        <th id="totalVisuOrcamento">Total:</th>

                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        
                    </div>

                </div>


            </div>


            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Sair</button>
            </div>



            
        </div>
    </div>
</div>


</form>





<div class="sidebar-overlay" data-reff=""></div>
<script src="../assets/js/jquery-3.2.1.min.js"></script>
<script src="../assets/js/popper.min.js"></script>
<script src="../assets/js/bootstrap.min.js"></script>
<script src="../assets/js/jquery.slimscroll.js"></script>
<script src="../assets/js/select2.min.js"></script>
<script src="../assets/js/jquery.dataTables.min.js"></script>
<script src="../assets/js/dataTables.bootstrap4.min.js"></script>
<script src="../assets/js/moment.min.js"></script>
<script src="../assets/js/bootstrap-datetimepicker.min.js"></script>
<script src="../assets/js/app.js"></script>
<script src="../assets/js/utils.js"></script>

<script>
    table = $('#tableOrcamentos').DataTable({
        "bJQueryUI": true,
        "oLanguage": {
            "sProcessing": "Processando...",
            "sLengthMenu": "Mostrar _MENU_ registros",
            "sZeroRecords": "Não foram encontrados resultados",
            "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
            "sInfoEmpty": "Mostrando de 0 até 0 de 0 registros",
            "sInfoFiltered": "",
            "sInfoPostFix": "",
            "sSearch": "Buscar:",
            "sUrl": "",
            "oPaginate": {
                "sFirst": "Primeiro",
                "sPrevious": "Anterior",
                "sNext": "Seguinte",
                "sLast": "Último"
            }
        }
    });

    function loadOrcamentos(){
               $.ajax({
                url: '/src/ajax/getOrcamentos.php',
                type: 'POST',
                data: JSON.stringify({ paciente_id: id}),
                contentType: 'application/json', // Envia como JSON
                success: function(response) {
                    var response = JSON.parse(response);

                    dados = response.orcamentos;

                    table.clear();

                    dados.forEach(function(item) {


                        let status = item.orcamento_aprovado == 1 ? 'Aprovado' : `<a class="btn status-green  text-dark  btn-rounded fa-1x " onclick="aprovarOrcamento('${item.id}')">
                                Aprovar orçamento
                            </a>`;

                let acoes = item.orcamento_aprovado == 1 ? 
                    `<a class="btn btn-white text-dark btn-rounded fa-1x " onclick="visualizarOrcamento('${item.id}')">
                        <i class="fas fa-eye"></i> <!-- Ícone de visualização -->
                    </a>` : 
                    `<a class="btn btn-white text-dark btn-rounded fa-1x " onclick="visualizarOrcamento('${item.id}')">
                        <i class="fas fa-eye"></i> <!-- Ícone de visualização -->
                    </a> 
                    <a class="btn btn-white text-dark btn-rounded fa-1x " onclick="excluirOrcamento('${item.id}')">
                        <i class="fas fa-trash-alt"></i> <!-- Ícone de exclusão -->
                    </a>`;


                        table.row.add([
                            item.data_orcamento ? item.data_orcamento.split('-').reverse().join('/') : '',
                            item.descricao || '', 
                            item.valor_total || '',
                            status,
                            acoes
                        ]);

                    });


                    // Redesenhar a tabela para mostrar as novas linhas
                    table.draw();


                    if (response.status === 'success') {
                        //window.location.href = '../index.php?page=dashboard'; 
                    } 
                },
            });
    }

    function loadTratamentos(){
                    $.ajax({
                url: '/src/ajax/getTratamentos.php',
                type: 'POST',
                data: JSON.stringify({ paciente_id: id}),
                contentType: 'application/json', // Envia como JSON
                success: function(response) {
                    var response = JSON.parse(response);

                    dados = response.tratamentos;

                    tableTratamentos.clear();

                    // Loop pelos dados e adicionar ao DataTable
                    dados.forEach(function(item) {

                        tableTratamentos.row.add([
                            item.data_orcamento ? item.data_orcamento.split('-').reverse().join('/') : '',
                            item.descricao || '', 
                            item.valor_total || '',
                            `<a class="btn btn-primary btn-sm">
                                Visualizar Tratamento
                            </a>`
                        ]);

                    });


                    // Redesenhar a tabela para mostrar as novas linhas
                    tableTratamentos.draw();


                    if (response.status === 'success') {
                        //window.location.href = '../index.php?page=dashboard'; 
                    } 
                },
            });
    }

    loadOrcamentos();
     

    function totalOrcamento() {
        var v = document.getElementsByClassName("valor");
        var total = 0;
        var valor = 0;

        for (var i = 0; i < v.length; i++) {
            valor = v[i].value.replace(/[.]+/g, '');
            valor = valor.replace(/[,]+/g, '.');
            total = Number(valor) + Number(total);
        }

        var dinheiro = total.toLocaleString('pt-br', { style: 'currency', currency: 'BRL' });
        var totalOrcamento = document.getElementById("totalOrcamento");
        totalOrcamento.innerText = dinheiro;
        
        var valorParcela = document.getElementById("valorParcela");
        valorParcela.value = totalOrcamento.innerText;
        
        var parcela = document.getElementById("quantidadeParcelas");
        parcela.value = 1;
    }

    function selectParcelamento() {
        var isParcela = document.getElementById("isParcela");
        if (isParcela.checked == true) {
            document.getElementById('parcela').classList.remove('d-none');
            var totalOrcamento = document.getElementById("totalOrcamento");
            var valorParcela = document.getElementById("valorParcela");
            valorParcela.value = totalOrcamento.innerText;
        } else {
            document.getElementById('parcela').classList.add('d-none');
        }
    }

    function changeParcelas() {
        var quantidadeParcelas = document.getElementById("quantidadeParcelas");
        var valorParcela = document.getElementById("valorParcela");
        var totalOrcamento = document.getElementById("totalOrcamento");
        
        quantidadeParcelas = quantidadeParcelas.value;

        var valorTotal = 0;
        valorTotal = totalOrcamento.innerText.slice(3);
        valorTotal = valorTotal.replace(/[.]+/g, '');
        valorTotal = valorTotal.replace(/[,]+/g, '.');

        valorParcela.value = (Number(valorTotal) / quantidadeParcelas).toLocaleString('pt-br', { style: 'currency', currency: 'BRL' });
    }

    function addProcedimento() {
        // Seleciona a última tag <dt class="h5 list"> dentro de <dl id="procedimentos">
        var dtList = document.querySelectorAll("#procedimentos dt.h5.list");
        var ultimoDT = dtList[dtList.length - 1]; // Seleciona o último da lista

        if (ultimoDT) {
            // Clona o último <dt> encontrado
            var novoDT = ultimoDT.cloneNode(true);

            // Garante que o botão de remoção seja único dentro do novo <dt>
            var btnRemover = novoDT.querySelector(".close"); // Seleciona o botão existente

            if (!btnRemover) {
                // Se o botão de remoção não existir no clone, criamos um novo
                btnRemover = document.createElement("button");
                btnRemover.innerHTML = "&times;";
                btnRemover.type = "button";
                btnRemover.classList.add("close"); // Mantém a mesma classe do original
                btnRemover.setAttribute("aria-label", "Close");

                // Cria uma div para conter o botão, seguindo a mesma estrutura do original
                var colBtn = document.createElement("div");
                colBtn.classList.add("col-sm-1");
                colBtn.appendChild(btnRemover);

                // Adiciona no final da estrutura do clone
                novoDT.querySelector(".row").appendChild(colBtn);
            }

            // Define o evento de remoção no botão
            btnRemover.onclick = function () {
                novoDT.remove();
            };

            // Adiciona o novo <dt> ao final de <dl id="procedimentos">
            document.getElementById("procedimentos").appendChild(novoDT);
        } else {
            console.warn("Nenhum <dt class='h5 list'> encontrado para replicar.");
        }
    }

    // Função auxiliar para remover um <dt>
    function removeProcedimento(elemento) {
        elemento.remove();
    }

    function salvarOrcamento(){
                    
                const form = document.getElementById('formOrcamento');
                const formData = new FormData(form);
                const data = Object.fromEntries(formData.entries());

                data.descricao = document.getElementById('orcamentoDescricao').value;
                data.data_orcamento = document.getElementById('orcamentoData').value.split('/').reverse().join('-');

                valor_total = document.getElementById('totalOrcamento').innerText;
                valor_total = valor_total.replace(/\s*R\$\s*/, '');
                valor_total = valor_total.replace(',', '.');
                data.valor_total = parseFloat(valor_total).toFixed(2);

                valor_parcelas = document.getElementById('valorParcela').value;
                valor_parcelas = valor_parcelas.replace(/\s*R\$\s*/, '');
                valor_parcelas = valor_parcelas.replace(',', '.');
                data.valor_parcelas = parseFloat(valor_parcelas).toFixed(2);

                orcamento_aprovado = document.getElementById('aprovarOrcamento');
                data.orcamento_aprovado = orcamento_aprovado.checked ? 1 : 0;

                data.parcelas = document.getElementById('quantidadeParcelas').value;

                data.paciente_id = id;

                            // Iterando sobre os campos do FormData para garantir que campos [] sejam tratados como arrays
                formData.forEach((value, key) => {
                    // Se a chave termina com "[]", tratamos isso como um array
                    if (key.endsWith('[]')) {
                        const cleanKey = key.slice(0, -2); // Remove o "[]"
                        if (!data[cleanKey]) {
                            data[cleanKey] = [];
                        }
                        data[cleanKey].push(value);
                    } else {
                        // Para os outros campos, apenas adicionamos normalmente
                        data[key] = value;
                    }
                });


                $.ajax({
                    url: '/src/ajax/salvarTratamento.php',
                    type: 'POST',
                    data: JSON.stringify(data),
                    contentType: 'application/json', // Envia como JSON
                    success: function(response) {
                        const res = JSON.parse(response);
                        alert(res.message);
                        loadOrcamentos();
                        loadTratamentos();
                    },
                });
    }

    function aprovarOrcamento(idOrcamento){
        var confirmacao = confirm("Você tem certeza que deseja aprovar este orçamento?");

        if (confirmacao) {

            $.ajax({
                    url: '/src/ajax/aprovarOrcamento.php',
                    type: 'POST',
                    data: { id: idOrcamento},
                    success: function(response) {
                        const res = JSON.parse(response);
                        alert(res.message);
                        loadOrcamentos();
                        loadTratamentos();
                    },
            });
        }
    
    }

    function visualizarOrcamento(idOrcamento){


            $.ajax({
                    url: '/src/ajax/visualizarOrcamento.php',
                    type: 'POST',
                    data: { id: idOrcamento},
                    success: function(response) {
                        let res = JSON.parse(response);
                        dadosOrcamento = res.dadosOrcamento;


                            let tabelaBody = document.querySelector("#tabelaVisualizacaoProcedimentos tbody");
                            tabelaBody.innerHTML = ""; 
                            let valorTotal = 0;

                            dadosOrcamento.forEach(dado => {
                                let linha = `
                                    <tr>
                                        <td>${dado.procedimento}</td>
                                        <td>${dado.dente_regiao}</td>
                                        <td>${dado.valor}</td>
                                    </tr>
                                `;
                                tabelaBody.innerHTML += linha;
                                valorTotal += parseFloat(dado.valor); 
                            });

                            document.getElementById('totalVisuOrcamento').innerText = 'Total: R$ ' + valorTotal;

                            $('#visualizar_orcamento').modal('show');


                    },
            });


    }

    function excluirOrcamento(idOrcamento){
        var confirmacao = confirm("Você tem certeza que deseja excluir este orçamento?");

        if (confirmacao) {

            $.ajax({
                    url: '/src/ajax/excluirOrcamento.php',
                    type: 'POST',
                    data: { id: idOrcamento},
                    success: function(response) {
                        const res = JSON.parse(response);
                        alert(res.message);
                        loadOrcamentos();
                        loadTratamentos();
                    },
            });
        }
    
    }

</script>
