<form id="formAnamnese">
                <div class="row">

                    <!-- Formulário cadastrar paciente -->
                    <div class="col-lg-8 offset-lg-2">
                            <div class="row card-box shadow rounded">

                                <div class="col-sm-12">
                                    <h3 class="page-title">Anamnese </h3>
                                </div>

                                <div class="col-lg-12 m-b-20">
                                    <a class="h5 text-primary" data-toggle="collapse" href="#collapseHistoricoMedico" role="button"
                                        aria-expanded="false" aria-controls="collapseExample">
                                        <i class="fa fa-caret-down" aria-hidden="true"></i>
                                        Histórico Médico
                                    </a>
                                </div>

                                <div class="col-sm-12 collapse show" id="collapseHistoricoMedico">
                                    <div class="form-group">
                                        <label>Você possui alguma doença sistêmica ? </label>
                                        <div class="input-group has-validation">
                                            <input class="form-control rounded" type="text" id="doencas_sistemicas" name="doencas_sistemicas" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12 collapse show" id="collapseHistoricoMedico">
                                    <div class="form-group">
                                        <label>Faz uso de algum medicamento? Se sim, qual(is)? </label>
                                        <div class="input-group has-validation">
                                            <input class="form-control rounded" type="text" id="uso_medicamentos" name="uso_medicamentos" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12 collapse show" id="collapseHistoricoMedico">
                                    <div class="form-group">
                                        <label>Já teve alguma reação alérgica a medicamentos ou anestésicos? Se sim, qual(is)?</label>
                                        <div class="input-group has-validation">
                                            <input class="form-control rounded" type="text" id="alergia_medicamentos" name="alergia_medicamentos" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12 collapse show" id="collapseHistoricoMedico">
                                    <div class="form-group">
                                        <label>Possui alguma condição alérgica? (ex.: látex, poeira, alimentos)</label>
                                        <div class="input-group has-validation">
                                            <input class="form-control rounded" type="text" id="condicao_alergica" name="condicao_alergica" required>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-sm-12 collapse show" id="collapseHistoricoMedico">
                                    <div class="form-group">
                                        <label>Já realizou alguma cirurgia ou tratamento médico significativo?</label>
                                        <div class="input-group has-validation">
                                            <input class="form-control rounded" type="text" id="cirurgias" name="cirurgias" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12 collapse show" id="collapseHistoricoMedico">
                                    <div class="form-group">
                                        <label>Está em tratamento médico atualmente? Qual?</label>
                                        <div class="input-group has-validation">
                                            <input class="form-control rounded" type="text" id="tratamento_medico" name="tratamento_medico" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12 collapse show" id="collapseHistoricoMedico">
                                    <div class="form-group gender-selected">
                                        <label class="gen-label">Já teve problemas de sangramento ou cicatrização?</label>
                                        <div class="form-check-inline">
                                            <label class="form-check-label">
                                                <input id="problemas_sangramento" type="radio" name="problemas_sangramento" class="form-check-input" value="1" >Sim
                                            </label>
                                        </div>
                                        <div class="form-check-inline">
                                            <label class="form-check-label">
                                                <input id="problemas_sangramento" type="radio" name="problemas_sangramento" class="form-check-input" value="0" checked>Não
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12 collapse show" id="collapseHistoricoMedico">
                                    <div class="form-group">
                                        <label>Tem ou já teve alguma doença transmissível? (ex.: hepatite, tuberculose, HIV)</label>
                                        <div class="input-group has-validation">
                                            <input class="form-control rounded" type="text" id="doencas_transmissiveis" name="doencas_transmissiveis" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-12 m-b-20">
                                    <a class="h5 text-primary" data-toggle="collapse" href="#collapseHistoricoOdontologico" role="button"
                                        aria-expanded="false" aria-controls="collapseExample">
                                        <i class="fa fa-caret-down" aria-hidden="true"></i>
                                        Histórico Odontológico
                                    </a>
                                </div>

                                <div class="col-sm-12 collapse show" id="collapseHistoricoOdontologico">
                                    <div class="form-group">
                                        <label>Qual foi a última vez que visitou um dentista?</label>
                                        <div class="input-group has-validation">
                                            <input class="form-control rounded" type="text" id="ultima_visita" name="ultima_visita" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12 collapse show" id="collapseHistoricoOdontologico">
                                    <div class="form-group">
                                        <label>Já fez algum tratamento odontológico? Qual?</label>
                                        <div class="input-group has-validation">
                                            <input class="form-control rounded" type="text" id="tratamentos_anteriores" name="tratamentos_anteriores" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12 collapse show" id="collapseHistoricoOdontologico">
                                    <div class="form-group gender-selected">
                                        <label class="gen-label">Tem medo ou ansiedade em relação ao tratamento odontológico?</label>
                                        <div class="form-check-inline">
                                            <label class="form-check-label">
                                                <input type="radio" name="medo_tratamento" class="form-check-input" value="1" >Sim
                                            </label>
                                        </div>
                                        <div class="form-check-inline">
                                            <label class="form-check-label">
                                                <input checked type="radio" name="medo_tratamento" class="form-check-input" value="0">Não
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12 collapse show" id="collapseHistoricoOdontologico">
                                    <div class="form-group gender-selected">
                                        <label class="gen-label">Sente dor ou desconforto nos dentes ou gengivas?</label>
                                        <div class="form-check-inline">
                                            <label class="form-check-label">
                                                <input id="dor_desconforto" type="radio" name="dor_desconforto" class="form-check-input" value="1" >Sim
                                            </label>
                                        </div>
                                        <div class="form-check-inline">
                                            <label class="form-check-label">
                                                <input checked type="radio" name="dor_desconforto" class="form-check-input" value="0">Não
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12 collapse show" id="collapseHistoricoOdontologico">
                                    <div class="form-group gender-selected">
                                        <label class="gen-label">Seus dentes são sensíveis a alimentos frios, quentes ou doces?</label>
                                        <div class="form-check-inline">
                                            <label class="form-check-label">
                                                <input id="sensibilidade" type="radio" name="sensibilidade" class="form-check-input" value="1" >Sim
                                            </label>
                                        </div>
                                        <div class="form-check-inline">
                                            <label class="form-check-label">
                                                <input checked type="radio" name="sensibilidade" class="form-check-input" value="0">Não
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12 collapse show" id="collapseHistoricoOdontologico">
                                    <div class="form-group gender-selected">
                                        <label class="gen-label">Tem sangramento gengival ao escovar os dentes ou ao usar fio dental?</label>
                                        <div class="form-check-inline">
                                            <label class="form-check-label">
                                                <input id="sangramento_gengival" type="radio" name="sangramento_gengival" class="form-check-input" value="1" >Sim
                                            </label>
                                        </div>
                                        <div class="form-check-inline">
                                            <label class="form-check-label">
                                                <input checked type="radio" name="sangramento_gengival" class="form-check-input" value="0">Não
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12 collapse show" id="collapseHistoricoOdontologico">
                                    <div class="form-group gender-selected">
                                        <label class="gen-label">Já teve ou tem mau hálito com frequência?</label>
                                        <div class="form-check-inline">
                                            <label class="form-check-label">
                                                <input id="mau_halito" type="radio" name="mau_halito" class="form-check-input" value="1" >Sim
                                            </label>
                                        </div>
                                        <div class="form-check-inline">
                                            <label class="form-check-label">
                                                <input checked type="radio" name="mau_halito" class="form-check-input" value="0">Não
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12 collapse show" id="collapseHistoricoOdontologico">
                                    <div class="form-group gender-selected">
                                        <label class="gen-label">Range ou aperta os dentes (bruxismo)?</label>
                                        <div class="form-check-inline">
                                            <label class="form-check-label">
                                                <input id="bruxismo" type="radio" name="bruxismo" class="form-check-input" value="1" >Sim
                                            </label>
                                        </div>
                                        <div class="form-check-inline">
                                            <label class="form-check-label">
                                                <input checked type="radio" name="bruxismo" class="form-check-input" value="0">Não
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12 collapse show" id="collapseHistoricoOdontologico">
                                    <div class="form-group gender-selected">
                                        <label class="gen-label">Tem o hábito de roer unhas ou morder objetos?</label>
                                        <div class="form-check-inline">
                                            <label class="form-check-label">
                                                <input id="roer_unhas" type="radio" name="roer_unhas" class="form-check-input" value="1" >Sim
                                            </label>
                                        </div>
                                        <div class="form-check-inline">
                                            <label class="form-check-label">
                                                <input checked type="radio" name="roer_unhas" class="form-check-input" value="0">Não
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12 collapse show" id="collapseHistoricoOdontologico">
                                    <div class="form-group gender-selected">
                                        <label class="gen-label">Usa ou já usou aparelho ortodôntico?</label>
                                        <div class="form-check-inline">
                                            <label class="form-check-label">
                                                <input id="uso_aparelho" type="radio" name="uso_aparelho" class="form-check-input" value="1" >Sim
                                            </label>
                                        </div>
                                        <div class="form-check-inline">
                                            <label class="form-check-label">
                                                <input checked type="radio" name="uso_aparelho" class="form-check-input" value="0">Não
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12 collapse show" id="collapseHistoricoOdontologico">
                                    <div class="form-group gender-selected">
                                        <label class="gen-label">Já realizou tratamento de canal em algum dente?</label>
                                        <div class="form-check-inline">
                                            <label class="form-check-label">
                                                <input id="tratamento_canal" type="radio" name="tratamento_canal" class="form-check-input" value="1" >Sim
                                            </label>
                                        </div>
                                        <div class="form-check-inline">
                                            <label class="form-check-label">
                                                <input checked type="radio" name="tratamento_canal" class="form-check-input" value="0">Não
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-12 m-b-20">
                                    <a class="h5 text-primary" data-toggle="collapse" href="#collapseHabitos" role="button"
                                        aria-expanded="false" aria-controls="collapseExample">
                                        <i class="fa fa-caret-down" aria-hidden="true"></i>
                                        Hábitos e estilo de vida
                                    </a>
                                </div>

                                <div class="col-sm-12 collapse show" id="collapseHabitos">
                                    <div class="form-group">
                                        <label>Com que frequência escova os dentes?</label>
                                        <div class="input-group has-validation">
                                            <input class="form-control rounded" type="text" id="frequencia_escovacao" name="frequencia_escovacao" required>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-sm-12 collapse show" id="collapseHabitos">
                                    <div class="form-group gender-selected">
                                        <label class="gen-label">Usa fio dental regularmente?</label>
                                        <div class="form-check-inline">
                                            <label class="form-check-label">
                                                <input id="uso_fio_dental" type="radio" name="uso_fio_dental" class="form-check-input" value="1" >Sim
                                            </label>
                                        </div>
                                        <div class="form-check-inline">
                                            <label class="form-check-label">
                                                <input checked type="radio" name="uso_fio_dental" class="form-check-input" value="0">Não
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12 collapse show" id="collapseHabitos">
                                    <div class="form-group gender-selected">
                                        <label class="gen-label">Faz uso de enxaguante bucal?</label>
                                        <div class="form-check-inline">
                                            <label class="form-check-label">
                                                <input id="uso_enxaguante" type="radio" name="uso_enxaguante" class="form-check-input" value="1" >Sim
                                            </label>
                                        </div>
                                        <div class="form-check-inline">
                                            <label class="form-check-label">
                                                <input checked type="radio" name="uso_enxaguante" class="form-check-input" value="0">Não
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12 collapse show" id="collapseHabitos">
                                    <div class="form-group gender-selected">
                                        <label class="gen-label">Consome muitos alimentos açucarados ou ácidos?</label>
                                        <div class="form-check-inline">
                                            <label class="form-check-label">
                                                <input id="consumo_acucar" type="radio" name="consumo_acucar" class="form-check-input" value="1" >Sim
                                            </label>
                                        </div>
                                        <div class="form-check-inline">
                                            <label class="form-check-label">
                                                <input checked type="radio" name="consumo_acucar" class="form-check-input" value="0">Não
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12 collapse show" id="collapseHabitos">
                                    <div class="form-group gender-selected">
                                        <label class="gen-label">Fumante?</label>
                                        <div class="form-check-inline">
                                            <label class="form-check-label">
                                                <input id="fumante" type="radio" name="fumante" class="form-check-input" value="1" >Sim
                                            </label>
                                        </div>
                                        <div class="form-check-inline">
                                            <label class="form-check-label">
                                                <input checked type="radio" name="fumante" class="form-check-input" value="0">Não
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12 collapse show" id="collapseHabitos">
                                    <div class="form-group gender-selected">
                                        <label class="gen-label">Consome bebidas alcoólicas com frequência?</label>
                                        <div class="form-check-inline">
                                            <label class="form-check-label">
                                                <input id="consumo_alcool" type="radio" name="consumo_alcool" class="form-check-input" value="1" >Sim
                                            </label>
                                        </div>
                                        <div class="form-check-inline">
                                            <label class="form-check-label">
                                                <input checked type="radio" name="consumo_alcool" class="form-check-input" value="0">Não
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12 collapse show" id="collapseHabitos">
                                    <div class="form-group gender-selected">
                                        <label class="gen-label">Tem o hábito de mascar chiclete frequentemente?</label>
                                        <div class="form-check-inline">
                                            <label class="form-check-label">
                                                <input id="mastiga_chiclete" type="radio" name="mastiga_chiclete" class="form-check-input" value="1" >Sim
                                            </label>
                                        </div>
                                        <div class="form-check-inline">
                                            <label class="form-check-label">
                                                <input checked type="radio" name="mastiga_chiclete" class="form-check-input" value="0">Não
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-12 m-b-20">
                                    <a class="h5 text-primary" data-toggle="collapse" href="#collapsePacientesMulheres" role="button"
                                        aria-expanded="false" aria-controls="collapseExample">
                                        <i class="fa fa-caret-down" aria-hidden="true"></i>
                                       Para Pacientes Mulheres
                                    </a>
                                </div>

                                <div class="col-sm-12 collapse show" id="collapsePacientesMulheres">
                                    <div class="form-group gender-selected">
                                        <label class="gen-label">Está grávida ou suspeita de gravidez?</label>
                                        <div class="form-check-inline">
                                            <label class="form-check-label">
                                                <input id="gravida" type="radio" name="gravida" class="form-check-input" value="1" >Sim
                                            </label>
                                        </div>
                                        <div class="form-check-inline">
                                            <label class="form-check-label">
                                                <input type="radio" name="gravida" class="form-check-input" value="0" checked>Não
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12 collapse show" id="collapsePacientesMulheres">
                                    <div class="form-group gender-selected">
                                        <label class="gen-label">Está amamentando?</label>
                                        <div class="form-check-inline">
                                            <label class="form-check-label">
                                                <input id="amamentando" type="radio" name="amamentando" class="form-check-input" value="1" >Sim
                                            </label>
                                        </div>
                                        <div class="form-check-inline">
                                            <label class="form-check-label">
                                                <input type="radio" name="amamentando" class="form-check-input" value="0" checked>Não
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12 collapse show" id="collapsePacientesMulheres">
                                    <div class="form-group gender-selected">
                                        <label class="gen-label">Faz uso de anticoncepcional hormonal?</label>
                                        <div class="form-check-inline">
                                            <label class="form-check-label">
                                                <input id="uso_anticoncepcional" type="radio" name="uso_anticoncepcional" class="form-check-input" value="1" >Sim
                                            </label>
                                        </div>
                                        <div class="form-check-inline">
                                            <label class="form-check-label">
                                                <input checked type="radio" name="uso_anticoncepcional" class="form-check-input" value="0">Não
                                            </label>
                                        </div>
                                    </div>
                                </div>




                                <div class="col-lg-12 text-center">
                                    <div class="form-group">
                                        <button onclick="salvarAnamnese()" type="button" id="btnSalvarAnamnense" class="btn btn-primary">Salvar</button>
                                    </div>
                                </div>

                            </div>
                    </div>
                </div>

</form>

<script src="../assets/js/jquery-3.2.1.min.js"></script>

<script>

        params = new URLSearchParams(window.location.search);
        id = params.get('id');

        $.ajax({
            url: '/src/ajax/getAnamnese.php',
            type: 'POST',
            data: { paciente_id: id },
            success: function(response) {
                response = JSON.parse(response); // Apenas atribuição, sem redeclarar
                if (response.status === 'success') {
                    anamnese = response.anamnese;

                    var form = document.getElementById('formAnamnese');
                    form.reset(); // Limpa todos os campos do formulário

                    Object.keys(anamnese).forEach(function (campo) {
                        var input = document.querySelector(`#formAnamnese [name="${campo}"]`);
                        
                        // Verifica se o campo existe no formulário
                        if (input) {
                            if (input.type === "checkbox" || input.type === "radio") {
                                // Para campos do tipo radio, devemos marcar o input com o valor correspondente
                                const radios = document.querySelectorAll(`#formAnamnese [name="${campo}"]`);
                                radios.forEach(function (radio) {
                                    // Verifica se o valor do radio corresponde ao valor de anamnese[campo]
                                    if (radio.value === String(anamnese[campo])) {
                                        radio.checked = true; // Marca o radio correspondente
                                    } else {
                                        radio.checked = false; // Desmarca os outros
                                    }
                                });
                            } else {
                                input.value = anamnese[campo] || ""; // Garante que campos vazios não quebrem o código
                            }
                        }
                    });


                }
            },
        });


        function salvarAnamnese() {
            // Obtém os dados do formulário e converte para JSON
            const form = document.getElementById('formAnamnese');
            const formData = new FormData(form);
            const data = Object.fromEntries(formData.entries());
            data.paciente_id = id;

            $.ajax({
                url: '/src/ajax/salvarAnamnese.php',
                type: 'POST',
                data: JSON.stringify(data),
                contentType: 'application/json', // Envia como JSON
                success: function(response) {
                    const res = JSON.parse(response);
                    alert(res.message);
                    if(res.status == 'success'){
                        location.reload();
                    }
                },
            });
        }

</script>