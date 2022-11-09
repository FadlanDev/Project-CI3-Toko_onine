<?php
require('asset/fpdf/fpdf.php');

class PDF extends FPDF
{

    // Simple table
    function BasicTable($header, $data, $filter)
    {
        // Header
        $this->Cell(25*7,8,"Laporan Data Product Berdasarkan ".$filter,1,0,"C");
        $this->Ln();
        foreach($header as $col){
            $this->Cell(25,8,$col,1,0,"C");
        }
        $this->Ln();
        // Data
        foreach($data as $row)
        {
            foreach($row as $col){
                $this->Cell(25,7,$col,1);
            }
            $this->Ln();
        }   
    }
}

$pdf = new PDF();
// Column headings
$header = array('Kode Barang', 'Nama Barang', 'Satuan','Stok','Stokmin', 'Stokmaks', 'Harga');
// Data loading
$data = $laporan->result();

$pdf->SetFont('Arial','',8);
$pdf->AddPage();
$pdf->BasicTable($header,$data,$filter);
$pdf->Output();
?>