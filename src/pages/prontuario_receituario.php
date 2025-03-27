<form id="formAtestado">
    <div class="card-box shadow rounded">
       <div class="row">

        <div class="col-lg-12">
           <h4 class="card-title">Receita Médica</h4>
       </div>

        <div class="col-lg-3">
            <div class="form-group">
                <label>Data </label>
                <div class="cal-icon">
                    <input id="data_receita" name="data_receita" type="text" class="form-control datetimepicker rounded">
                </div>
            </div>
        </div>


    </div>

<div class="row">

<div class="col-sm-3 " >
    <div class="form-group">
        <label>Medicamento: </label>
            <input class="form-control rounded" type="text" id="medicamento" name="medicamento" required>
    </div>
</div>

<div class="col-lg-3" >
    <label>Quantidade</label>
    <input id="quantidade_medicamento" name="quantidade_medicamento"  class="form-control rounded"  value="" type="text"
    >
</div>

    </div>

<div class="row">

<div class="col-sm-6 " >
    <div class="form-group">
        <label>Posologia: </label>
            <input class="form-control rounded" type="text" id="posologia" name="posologia" required>
    </div>
</div>

</div>

<div class="col-lg-12">
    <div class="d-flex justify-content-center">
        <button onclick="emitirReceita()" type="button" class="btn btn-lg  btn-success font-weight-bold"><i class="fa fa-print" aria-hidden="true"></i>
        EMITIR RECEITA</button>
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

function emitirReceita() {
    // Captura os valores das variáveis
    let nomePaciente = document.getElementById('nome').innerText;
    let dataReceita = document.getElementById('data_receita').value;
    let quantidadeMedicamento = document.getElementById('quantidade_medicamento').value;
    let posologia = document.getElementById('posologia').value;
    let medicamento = document.getElementById('medicamento').value;

    // Codifica os valores para garantir que sejam passados corretamente na URL
    nomePaciente = encodeURIComponent(nomePaciente);
    dataReceita = encodeURIComponent(dataReceita);
    quantidadeMedicamento = encodeURIComponent(quantidadeMedicamento);
    posologia = encodeURIComponent(posologia);
    medicamento = encodeURIComponent(medicamento);

    // Constrói a URL com os parâmetros GET
    let url = `src/pages/receita.php?nomePaciente=${nomePaciente}&dataReceita=${dataReceita}&quantidadeMedicamento=${quantidadeMedicamento}&posologia=${posologia}&medicamento=${medicamento}`;

    // Abre a nova página passando os dados via GET
    window.open(url, '_blank');
}


</script>
