<?php
require('asset/fpdf/fpdf.php');

class PDF extends FPDF
{

    // Simple table
    function BasicTable($header, $data, $filter)
    {
        // Header
        $this->Cell(42*4,8,"Laporan Data Penjualan Berdasarkan ".$filter,1,0,"C");
        $this->Ln();
        foreach($header as $col){
            $this->Cell(42,4,$col,1,0,"C");
        }
        $this->Ln();
        // Data
        foreach($data as $row)
        {
            foreach($row as $col){
                $this->Cell(42,4,$col,1);
            }
            $this->Ln();
        }   
    }
}

$pdf = new PDF();
// Column headings
$header = array('Nama', 'Produk', 'Nomer HP','Email');
// Data loading
$data = $laporan->result();

$pdf->SetFont('Arial','',8);
$pdf->AddPage();
$pdf->BasicTable($header,$data,$filter);
$pdf->Output();
?>