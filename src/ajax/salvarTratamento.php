<?php

require_once '../classes/Tratamento.php';
require_once '../classes/Parcela.php';
require_once '../classes/ProcedimentoDoTratamento.php';

$data = json_decode(file_get_contents('php://input'), true);

$tratamento = new Tratamento();
$parcela = new Parcela();
$procedimentoDoTratamento = new ProcedimentoDoTratamento();


try {
    // Salva o paciente usando o array de dados


       $tratamento_id = $tratamento->salvar($data);


       for($i=0; $i < $data['parcelas']; $i++){

                    // Criar a data de vencimento, começando pela data atual
            $vencimento = new DateTime(); // Data atual
            $vencimento->modify('+' . $i . ' month'); // Adicionar 1 mês por iteração

            // Formatar a data para o formato desejado (Y-m-d)
            $vencimentoFormatted = $vencimento->format('Y-m-d');


            $dadosParcela = [
                'valor' => $data['valor_parcelas'],
                'vencimento' => $vencimentoFormatted,  // Data formatada
                'status_pagamento' => 0, 
                'tratamento_id' => $tratamento_id,  // ID do tratamento
            ];

            $parcela->salvar($dadosParcela);
       }


        // Loop para percorrer os dados
        for ($i = 0; $i < count($data['orcamentoProcedimento']); $i++) {
            // Acessando os valores de todos os arrays na mesma iteração
            $orcamentoPlano = isset($data['orcamentoPlano'][$i]) ? $data['orcamentoPlano'][$i] : null;
            $orcamentoDentista = isset($data['orcamentoDentista'][$i]) ? $data['orcamentoDentista'][$i] : null;
            $orcamentoProcedimento = isset($data['orcamentoProcedimento'][$i]) ? $data['orcamentoProcedimento'][$i] : null;
            $orcamentoDente = isset($data['orcamentoDente'][$i]) ? $data['orcamentoDente'][$i] : null;
            $valorProcedimento = isset($data['valorProcedimento'][$i]) ? $data['valorProcedimento'][$i] : null;

                    // Criando o array 'procedimento' com os dados da iteração atual
            $procedimento = [
                'dentista_id' => 1,
                'procedimento' => $orcamentoProcedimento,
                'dente_regiao' => $orcamentoDente,
                'valor' => $valorProcedimento,
                'status' => "Pendente",
                'tratamento_id' => $tratamento_id, 
            ];

            $procedimentoDoTratamento->salvar($procedimento);

        }

        echo json_encode([
            'status' => 'success',
            'message' => 'Orçamento salvo com sucesso!',
        ], JSON_UNESCAPED_UNICODE);
    
} catch (PDOException $e) {
    echo json_encode([
        'status' => 'error',
        'message' => 'Erro de banco de dados. Por favor, tente novamente mais tarde.' . $e->getMessage(),
    ], JSON_UNESCAPED_UNICODE);
} catch (Exception $e) {
    echo json_encode([
        'status' => 'error',
        'message' => 'Ocorreu um erro inesperado. Tente novamente.',
    ], JSON_UNESCAPED_UNICODE);
}
