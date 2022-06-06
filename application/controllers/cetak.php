<?php
    require('../fpdf/fpdf.php');
    $pdf = new FPDF('p','mm','A4');
    $pdf->AddPage();
    $pdf->SetFont('Arial','B',20);
	$pdf->Cell(80,15,'Cosmetic Shop',0,1,'C');
	$pdf->SetFont('Arial','',12);
	$pdf->Cell(80,8,'JL. Sudirman No.1',0,1,'C');
	$pdf->Cell(50,9,'=======================================================',0,1,'C');
    include '../koneksi.php';
	$id_transaksi = $_GET['cetak'];
	$sql = mysqli_query($koneksi, "SELECT * FROM transaksi_view WHERE id_transaksi='$idtransaksi'");
	while($hasil = mysqli_fetch_array($sql)){
	$pdf->Cell(5,2,'No. Nota : ',0,0,'C');
    $pdf->Cell(30,2,$hasil['id_transaksi'],0,0,'C');
    $pdf->Cell(5,5,'',0,1);
    $pdf->Cell(27,2,'Tanggal Pembayaran :',0,0,'C');
    $pdf->Cell(90,2,$hasil['tanggalmasuk'],0,1,'C');
    $pdf->SetFont('Arial','',18);
    $pdf->Cell(27,2,'Tanggal Keluar :',0,0,'C');
    $pdf->Cell(90,2,$hasil['tanggalkeluar'],0,1,'C');
    $pdf->SetFont('Arial','',18);
	$pdf->Cell(-20,15,'-------------------------------------------------------------------------------------------------',0,1,'C');
	$pdf->SetFont('Arial','',12);
	$pdf->Cell(10,2,' Nama ',0,0,'C');
	$pdf->Cell(60,0,' Berat ',0,0,'C');
	$pdf->Cell(1,2,' Jumlah Paket ',0,0,'C');
	$pdf->Cell(1,2,' Jenis Laundry ',0,0,'C');
	$pdf->Cell(1,2,' Jenis Cucian ',0,0,'C');
	$pdf->Cell(1,2,' Bayar ',0,0,'C');
	$pdf->Cell(1,2,' Total Bayar ',0,0,'C');

	$pdf->Cell(30,2,' Total ',0,0,'C');
	$pdf->Cell(5,2,'',0,1);
    $pdf->Cell(10,15,$hasil['id_pelanggan'],0,0,'C');
    $pdf->Cell(60,15,$hasil['berat'],0,0,'C');
    $pdf->Cell(1,15,$hasil['jumlahpaket'],0,0,'C');
    $pdf->Cell(30,15,$hasil['id_jenis'],0,1,'C');
    $pdf->Cell(30,15,$hasil['id_pakaian'],0,1,'C');
    $pdf->Cell(30,15,$hasil['bayar'],0,1,'C');
    $pdf->Cell(30,15,$hasil['totalbayar'],0,1,'C');
	$pdf->Cell(50,0,'=======================================================',0,1,'C');
	$pdf->Cell(120,15,'Tunai :',0,0,'C');
	$pdf->Cell(-70,15,$hasil['tunai'],0,1,'C');
	$pdf->Cell(110,5,'Kembalian :',0,0,'C');
	$pdf->Cell(-60,5,$hasil['kembalian'],0,1,'C');
    $pdf->Cell(50,10,'=======================================================',0,1,'C');
    $pdf->Cell(80,8,'Terima kasih atas kunjungan Anda',0,1,'C');
    }
	$pdf->Output();
	
?>