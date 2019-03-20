<?php
    include "pengaturan/koneksi.php";

    $Lapor = "SELECT id_anggota, nis, nama, kelas, email, no_hp, tgl_lahir, alamat FROM anggota ORDER by id_anggota";
    $Hasil = mysql_query($Lapor);
    $Data = array();
    while($row = mysql_fetch_assoc($Hasil)){
        array_push($Data, $row);
    }
    $Judul = "Data Anggota Perpustakaan SMA";
    $tgl= "Time : ".date("l, d F Y");
    $Header= array(
        array("label"=>"id_anggota", "length"=>22, "align"=>"L"),
        array("label"=>"NIS", "length"=>37, "align"=>"L"),
        array("label"=>"Nama", "length"=>60, "align"=>"L"),
        array("label"=>"Kelas", "length"=>20, "align"=>"L"),
        array("label"=>"Email", "length"=>37, "align"=>"L"),
        array("label"=>"No. Hp", "length"=>27, "align"=>"L"),
        array("label"=>"Tgl Lahir", "length"=>25, "align"=>"L"),
        array("label"=>"Alamat", "length"=>50, "align"=>"L"),
    );
    require ("cetak/fpdf.php");
    
    
    $pdf = new FPDF();
    $pdf->AddPage('L','A4','C');
    $pdf->Image('assets/img/sma.png',10,10,20);
    $pdf->SetFont('arial','B','15');
    $pdf->Cell(0, 15, $Judul, '0', 1, 'C');
    $pdf->SetFont('arial','i','9');
    $pdf->Cell(0, 10, $tgl, '0', 1, 'P');
    $pdf->SetFont('arial','','12');
    $pdf->SetFillColor(135,206,235);
    $pdf->SetTextColor(0);
    $pdf->setDrawColor(0,0,0);
    foreach ($Header as $Kolom){
        $pdf->Cell($Kolom['length'], 8, $Kolom['label'], 1, '0', $Kolom['align'], true);
    }
    $pdf->Ln();
    $pdf->SetFillColor(192,192,192);
    $pdf->SettextColor(0);
    $pdf->SetFont('arial','','10');
    $fill =false;
    foreach ($Data as $Baris){
        $i= 0;
        foreach ($Baris as $Cell){
            $pdf->Cell ($Header[$i]['length'], 7, $Cell, 2, '0', $Kolom['align'], $fill);
            $i++;
        }
        $fill = !$fill;
        $pdf->Ln();
    }
    $pdf->Output();
?>