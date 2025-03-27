<form id="formTratamentos">
    <div class="card-box profile-header">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-6">
                        <h4 class="page-title">Lista de Documentos</h4>
                    </div>
                    <div class="col-6 float-right">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#uploadModal">
                            Adicionar Documento
                        </button>
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

                                        <table class="table mb-0 new-patient-table card  " id="tableArquivos">
                                            <thead class=" ">
                                                <tr>
                                                    <th>Nome do Documento</th>
                                                    <th>Documento</th>
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

</form>

<!-- Modal para upload do documento -->
<div class="modal fade" id="uploadModal" tabindex="-1" role="dialog" aria-labelledby="uploadModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="uploadModalLabel">Adicionar Documento</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="uploadForm" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="descricao">Descrição</label>
                        <input type="text" class="form-control" id="descricao" name="descricao" required>
                    </div>
                    <div class="form-group">
                        <label for="arquivo">Escolher Arquivo</label>
                        <input type="file" class="form-control-file" id="arquivo" name="arquivo" required>
                    </div>
                    <button type="button" class="btn btn-primary" onclick="salvarArquivo()">Salvar Documento</button>
                </form>
            </div>
        </div>
    </div>
</div>


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
    tableArquivos = $('#tableArquivos').DataTable({
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

        // Função para enviar o arquivo
    function salvarArquivo() {

        var formData = new FormData($('#uploadForm')[0]); // Pega o formulário pelo ID 'uploadForm'
        formData.append('id', id);

        $.ajax({
            url: '/src/ajax/salvarArquivo.php',
            type: 'POST',
            data: formData,
            contentType: false, // Importante para enviar o arquivo corretamente
            processData: false, // Impede o jQuery de processar os dados
            success: function(response) {
                
                var resposta = JSON.parse(response);
                alert(resposta.message) // Supondo que o servidor retorne os dados em formato JSON
                //adicionarDocumentoTabela(novoDocumento);
            },
            error: function() {
                alert('Erro ao fazer upload. Tente novamente.');
            }
        });
    }

function listarDocumentos() {
    $.ajax({
        url: '/src/ajax/carregarArquivos.php', // Substitua pela URL correta do seu script PHP
        type: 'POST',
        dataType: 'json',
         data: { id: id},
        success: function(response) {
            // Limpar a tabela antes de adicionar os novos documentos
            tableArquivos.clear();

            // Função para detectar o tipo de arquivo com base no conteúdo base64
function detectarTipoArquivo(base64) {
    // PDF
    if (base64.startsWith("JVBERi0x")) {
        return "pdf";
    }
    // PNG
    else if (base64.startsWith("iVBOR")) {
        return "image";
    }
    // JPEG
    else if (base64.startsWith("/9j/")) {
        return "image";
    }
    // Arquivo DOCX (Word) - Verificando conteúdo interno
    else if (base64.startsWith("UEsDB")) { 
        // Arquivos ZIP como DOCX/PPTX/XLSX começam com 'PK' mas são tratados como ZIP
        // Verificando o conteúdo específico de DOCX
        let binaryString = atob(base64); // Decodifica a string base64
        if (binaryString.includes("word/document.xml")) {
            return "docx"; // Confirmado como DOCX
        }
    }
    // Arquivo Excel (XLSX)
    else if (base64.startsWith("UEsDBB")) {
        return "xlsx"; // XLSX específico
    }
    // Arquivo ZIP
    else if (base64.startsWith("PK")) {
        return "zip"; // Identifica arquivos ZIP, PPTX, etc.
    }
    // Tipo desconhecido
    else {
        return "unknown";
    }
}


            // Adicionar os documentos à tabela
            response.forEach(function(doc) {
                var arquivo = doc.arquivo; // O arquivo em base64
                var descricao = doc.descricao; // O nome do arquivo (coluna 'descricao')

                // Detecta o tipo de arquivo
                var tipoArquivo = detectarTipoArquivo(arquivo);

                // Determina o link de visualização com base no tipo de arquivo detectado
                var linkVisualizacao;

                if (tipoArquivo === 'pdf') {
                    linkVisualizacao = '<a href="data:application/pdf;base64,' + arquivo + '" target="_blank">Visualizar PDF</a>';
                } else if (tipoArquivo === 'image') {
                    // Se for imagem, assume-se JPEG ou PNG
                    linkVisualizacao = '<a href="data:image/jpeg;base64,' + arquivo + '" target="_blank">Visualizar Imagem</a>';
                } else if (tipoArquivo === 'zip') {
                    // Exemplo para ZIP (ou outro tipo)
                    linkVisualizacao = '<a href="data:application/zip;base64,' + arquivo + '" target="_blank">Baixar Arquivo ZIP</a>';
                } else if (tipoArquivo === 'xlsx') {
                    // Para arquivos Excel (XLSX)
                    linkVisualizacao = '<a href="data:application/vnd.openxmlformats-officedocument.spreadsheetml.sheet;base64,' + arquivo + '" target="_blank">Baixar Excel</a>';
                } else if (tipoArquivo === 'docx') {
                    // Para arquivos Word (DOCX)
                    linkVisualizacao = '<a href="data:application/vnd.openxmlformats-officedocument.wordprocessingml.document;base64,' + arquivo + '" target="_blank">Baixar Word</a>';
                } else {
                    linkVisualizacao = '<a href="data:application/octet-stream;base64,' + arquivo + '" target="_blank">Baixar Arquivo</a>';
                }

                // Adiciona a linha à tabela
                tableArquivos.row.add([
                    descricao, // Nome do arquivo
                    linkVisualizacao // Link adaptado para o tipo de arquivo
                ]).draw();
            });
        },
        error: function(xhr, status, error) {
            // Exibir detalhes do erro no console para depuração
            console.error("Erro na requisição AJAX:");
            console.error("Status: " + status);
            console.error("Erro: " + error);
            console.error("Resposta do servidor: " + xhr.responseText);
            
            alert('Erro ao carregar documentos. Verifique o console para mais detalhes.');
        }
    });
}



listarDocumentos();


</script>
