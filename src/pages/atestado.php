<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/assets/fpdf/fpdf.php');

class PDF extends FPDF
{
    function Header()
    {
        // Cabeçalho
        $this->SetFont('Arial', 'B', 12);
        $this->Cell(0, 10, utf8_decode('Atestado Odontológico'), 0, 1, 'C');
        $this->Ln(10);
    }

    function Footer()
    {
        // Rodapé
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);
        $this->Cell(0, 10, utf8_decode('Rua Prefeito Cristiano Lages, 210, Itinga - Minas Gerais - MG - Fone (XX) XXXX XXXX'), 0, 0, 'C');
    }

    function Body($paciente, $tipo_atestado, $data_atestado, $quantidade, $cid)
    {
        // Corpo do atestado
        $this->SetFont('Arial', '', 12);
        
        $this->Cell(0, 10, 'Paciente: ' . $paciente, 0, 1);
        $this->Cell(0, 10, 'Tipo de Atestado: ' . $tipo_atestado, 0, 1);
        $this->Cell(0, 10, 'Data do Atestado: ' . $data_atestado, 0, 1);
        $this->Cell(0, 10, 'Quantidade (Dias/Horas no Consultorio): ' . $quantidade, 0, 1);
        $this->Cell(0, 10, 'CID: ' . $cid, 0, 1);
        
        // Pular para antes da assinatura, para colocá-la no final
        $this->Ln(20);

        // Mover a posição vertical para o final da página
        $this->SetY(-40); // Ajuste de acordo com a altura da assinatura

        // Linha para assinatura
        $this->Cell(0, 10, 'Carimbo e Assinatura: ___________________________', 0, 1,'C');
    }
}

// Cria instância do PDF
$pdf = new PDF();
$pdf->AddPage();


$paciente = isset($_GET['nomePaciente']) ? $_GET['nomePaciente'] : '';
$data_atestado = isset($_GET['dataAtestado']) ? $_GET['dataAtestado'] : '';
$quantidade_dias = isset($_GET['quantidade_dias']) ? $_GET['quantidade_dias'] : '';
$cid = isset($_GET['cid']) ? $_GET['cid'] : '';
$tipoAtestado = isset($_GET['tipoAtestado']) ? $_GET['tipoAtestado'] : '';


// Gerar o corpo do atestado
$pdf->Body($paciente, $tipoAtestado, $data_atestado, $quantidade_dias, $cid);

// Output do arquivo PDF
$pdf->Output();
?>
