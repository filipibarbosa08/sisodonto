<?php

ini_set("display_errors","on");
require_once($_SERVER['DOCUMENT_ROOT'] . '/assets/fpdf/fpdf.php');

class PDF extends FPDF
{
    function Header()
    {
        // Cabeçalho
        $this->SetFont('Arial', 'B', 12);
        $this->Cell(0, 10, utf8_decode('Receita Médica'), 0, 1, 'C');
        $this->Ln(10);
    }

    function Footer()
    {
        // Rodapé
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);
        $this->Cell(0, 10, utf8_decode('Rua Prefeito Cristiano Lages, 210, Itinga - Minas Gerais - MG - Fone (XX) XXXX XXXX'), 0, 0, 'C');
    }

    function Body($paciente, $medicamento,$quantidadeMedicamento, $posologia, $dataReceita)
    {
        // Corpo do atestado
        $this->SetFont('Arial', '', 12);
        
        $this->Cell(0, 10, 'Para: ' . $paciente, 0, 1);
        $this->Cell(0, 10, '1. ' . $medicamento . '______________________________' . $quantidadeMedicamento, 0, 1);
        $this->SetFont('Arial', '', 10);
        $this->Cell(0, 10, $posologia, 0, 1);

        $this->SetFont('Arial', '', 12);
        
        // Pular para antes da assinatura, para colocá-la no final
        $this->Ln(180); // Ajuste do espaço antes da data

        // Inserir a data um pouco acima da assinatura
        $this->Cell(0, 10, 'Data: ' . $dataReceita, 0, 1, 'C');

        // Pular para antes da assinatura
        $this->Ln(10); // Ajuste do espaço entre a data e a assinatura

        // Mover a posição vertical para o final da página
        $this->SetY(-40); // Ajuste de acordo com a altura da assinatura


        // Linha para assinatura
        $this->Cell(0, 10, 'Assinatura Profissional: ___________________________', 0, 1,'C');
    }
}

// Cria instância do PDF
$pdf = new PDF();
$pdf->AddPage();


$paciente = isset($_GET['nomePaciente']) ? $_GET['nomePaciente'] : '';
$medicamento = isset($_GET['medicamento']) ? $_GET['medicamento'] : '';
$quantidadeMedicamento = isset($_GET['quantidadeMedicamento']) ? $_GET['quantidadeMedicamento'] : '';
$posologia = isset($_GET['posologia']) ? $_GET['posologia'] : '';
$dataReceita = isset($_GET['dataReceita']) ? $_GET['dataReceita'] : '';

// Gerar o corpo do atestado
$pdf->Body($paciente, $medicamento,$quantidadeMedicamento, $posologia, $dataReceita);

// Output do arquivo PDF
$pdf->Output();
?>
