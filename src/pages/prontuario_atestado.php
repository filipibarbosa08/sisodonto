<form id="formAtestado">
    <div class="card-box shadow rounded">
       <div class="row">

        <div class="col-lg-12">
           <h4 class="card-title">Atestado</h4>

       </div>

       <div class="col-lg-12">
           <div class="form-group w-25">
            <label>Dentista <span class="text-danger">*</span></label>

            <select id="dentista" name="dentista" class="form-control  rounded">
                <option>Dr. Odonto</option>
            </select>
        </div>
    </div>

    <div class="col-lg-12">
       <div class="form-group w-50 gender-selected ">
        <label class="gen-label " style="margin-bottom: 2px;">Tipo de atestado:</label>
        <div class="form-check-inline">
            <label class="form-check-label">
                <input value="Atestado de Dias"  id="tipo_atestado"  type="radio" name="tipo_atestado" class="form-check-input " checked>Atestado de dias
            </label>
        </div>
        <div class="form-check-inline">
            <label class="form-check-label ">
                <input value="presenca"  id="tipo_atestado" type="radio" name="tipo_atestado" class="form-check-input">Presença na consulta
            </label>
        </div>
    </div>
</div>

<div class="col-lg-3">
    <div class="form-group">
        <label>Data do atestado <span class="text-danger">*</span></label>
        <div class="cal-icon">
            <input id="data_emissao" name="data_emissao" type="text" class="form-control datetimepicker rounded">
        </div>
    </div>
</div>

<div class="col-lg-3" >
    <label>Quantidade de dias <span class="text-danger">*</span></label>
    <input id="quantidade_dias" name="quantidade_dias"  class="form-control rounded"  value="" type="number"
    min="1" max="1000" >
</div>

<div class="w-100"></div>


<div class="col-sm-3 " >
    <div class="form-group">
        <label>CID: </label>
            <input class="form-control rounded" type="text" id="cid" name="cid" required>
    </div>
</div>

<div class="col-lg-12">
    <div class="d-flex justify-content-center">
        <button onclick="emitirAtestado()" type="button" class="btn btn-lg  btn-success font-weight-bold"><i class="fa fa-print" aria-hidden="true"></i>
        EMITIR ATESTADO</button>
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

document.querySelectorAll('input[name="tipo_atestado"]').forEach(input => {
    input.addEventListener('change', function() {
        if(this.value == "presenca"){
            document.getElementById('quantidade_dias').disabled = true;
            document.getElementById('quantidade_dias').value = 1;
            return;
        }

        document.getElementById('quantidade_dias').disabled = false;


    });
});

function emitirAtestado() {
    // Captura os valores das variáveis
    let nomePaciente = document.getElementById('nome').innerText;
    let dataAtestado = document.getElementById('data_emissao').value;
    let quantidade_dias = document.getElementById('quantidade_dias').value;
    let cid = document.getElementById('cid').value;
    let tipoAtestado = document.querySelector('input[name="tipo_atestado"]:checked').value;

    // Codifica os valores para garantir que sejam passados corretamente na URL
    nomePaciente = encodeURIComponent(nomePaciente);
    dataAtestado = encodeURIComponent(dataAtestado);
    quantidade_dias = encodeURIComponent(quantidade_dias);
    cid = encodeURIComponent(cid);
    tipoAtestado = encodeURIComponent(tipoAtestado);

    // Constrói a URL com os parâmetros GET
    let url = `src/pages/atestado.php?nomePaciente=${nomePaciente}&dataAtestado=${dataAtestado}&quantidade_dias=${quantidade_dias}&cid=${cid}&tipoAtestado=${tipoAtestado}`;

    // Abre a nova página passando os dados via GET
    window.open(url, '_blank');
}


</script>
