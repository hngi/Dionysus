<?php 
include('includes/db/db_config.php');
include('includes/functions/functions.php');
include('includes/header.php');
$fdate= $_POST['fdate'];
$tdate= $_POST['tdate'];
$expense_reports = expenseReports($conn, $_SESSION['userid'], $fdate, $tdate);
$header = expenseReportsPdf($conn);
require('fpdf181/fpdf.php');
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',12);		
foreach($header as $heading) {
	foreach($heading as $column_heading)
		$pdf->Cell(90,12,$column_heading,1);
}
foreach($expense_reports as $row) {
	$pdf->SetFont('Arial','',12);	
	$pdf->Ln();
	foreach($row as $column)
		$pdf->Cell(90,12,$column,1);
}
$pdf->Output();
?>
