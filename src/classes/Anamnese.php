<?php

class Anamnese
{
    private $id, $paciente_id, $doencas_sistemicas, $uso_medicamentos, $alergia_medicamentos, $condicao_alergica,
            $cirurgias, $tratamento_medico, $problemas_sangramento, $doencas_transmissiveis, $ultima_visita,
            $tratamentos_anteriores, $medo_tratamento, $dor_desconforto, $sensibilidade, $sangramento_gengival,
            $mau_halito, $bruxismo, $roer_unhas, $uso_aparelho, $tratamento_canal, $frequencia_escovacao,
            $uso_fio_dental, $uso_enxaguante, $consumo_acucar, $fumante, $consumo_alcool, $mastiga_chiclete,
            $gravida, $amamentando, $uso_anticoncepcional;

    public function salvar(array $data)
    {
        require_once __DIR__ . '/../../config/Database.php';
        $dbConnection = Database::conectar();

        $sql = "INSERT INTO anamneses (paciente_id, doencas_sistemicas, uso_medicamentos, alergia_medicamentos, condicao_alergica,
                cirurgias, tratamento_medico, problemas_sangramento, doencas_transmissiveis, ultima_visita,
                tratamentos_anteriores, medo_tratamento, dor_desconforto, sensibilidade, sangramento_gengival,
                mau_halito, bruxismo, roer_unhas, uso_aparelho, tratamento_canal, frequencia_escovacao,
                uso_fio_dental, uso_enxaguante, consumo_acucar, fumante, consumo_alcool, mastiga_chiclete,
                gravida, amamentando, uso_anticoncepcional)
                VALUES (:paciente_id, :doencas_sistemicas, :uso_medicamentos, :alergia_medicamentos, :condicao_alergica,
                        :cirurgias, :tratamento_medico, :problemas_sangramento, :doencas_transmissiveis, :ultima_visita,
                        :tratamentos_anteriores, :medo_tratamento, :dor_desconforto, :sensibilidade, :sangramento_gengival,
                        :mau_halito, :bruxismo, :roer_unhas, :uso_aparelho, :tratamento_canal, :frequencia_escovacao,
                        :uso_fio_dental, :uso_enxaguante, :consumo_acucar, :fumante, :consumo_alcool, :mastiga_chiclete,
                        :gravida, :amamentando, :uso_anticoncepcional)";

        $stmt = $dbConnection->prepare($sql);

        foreach ($data as $key => $value) {
            $stmt->bindValue(':' . $key, $value ?? null);
        }

        return $stmt->execute();
    }

    public function alterar(array $data)
    {
        require_once __DIR__ . '/../../config/Database.php';
        $dbConnection = Database::conectar();

        $sql = "UPDATE anamneses SET paciente_id = :paciente_id, doencas_sistemicas = :doencas_sistemicas,
                uso_medicamentos = :uso_medicamentos, alergia_medicamentos = :alergia_medicamentos, condicao_alergica = :condicao_alergica,
                cirurgias = :cirurgias, tratamento_medico = :tratamento_medico, problemas_sangramento = :problemas_sangramento,
                doencas_transmissiveis = :doencas_transmissiveis, ultima_visita = :ultima_visita, tratamentos_anteriores = :tratamentos_anteriores,
                medo_tratamento = :medo_tratamento, dor_desconforto = :dor_desconforto, sensibilidade = :sensibilidade,
                sangramento_gengival = :sangramento_gengival, mau_halito = :mau_halito, bruxismo = :bruxismo,
                roer_unhas = :roer_unhas, uso_aparelho = :uso_aparelho, tratamento_canal = :tratamento_canal,
                frequencia_escovacao = :frequencia_escovacao, uso_fio_dental = :uso_fio_dental, uso_enxaguante = :uso_enxaguante,
                consumo_acucar = :consumo_acucar, fumante = :fumante, consumo_alcool = :consumo_alcool,
                mastiga_chiclete = :mastiga_chiclete, gravida = :gravida, amamentando = :amamentando,
                uso_anticoncepcional = :uso_anticoncepcional WHERE paciente_id = :paciente_id";

        $stmt = $dbConnection->prepare($sql);

        foreach ($data as $key => $value) {
            $stmt->bindValue(':' . $key, $value ?? null);
        }

        return $stmt->execute();
    }

    public function getById($paciente_id)
    {
        require_once __DIR__ . '/../../config/Database.php';
        $dbConnection = Database::conectar();

        $stmt = $dbConnection->prepare("SELECT * FROM anamneses WHERE paciente_id = :paciente_id");
        $stmt->bindValue(':paciente_id', $paciente_id, PDO::PARAM_INT);
        $stmt->execute();

       return $stmt->fetch(PDO::FETCH_ASSOC) ?: [];

    }

}
