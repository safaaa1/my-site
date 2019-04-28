<?php

/*if(!empty($_POST['submit']))
{
	$id=$_POST['id'];
	$nom_prod=$_POST['nom_prod'];
	$qte_prod=$_POST['qte_prod'];
	$prix_total=$_POST['prix_total'];
*/

require("../fpdf/fpdf.php");
$pdf=new FPDF();
$pdf->AddPage();
$pdf->SetFont("Arial","B",16);
$pdf->Cell(10,10,"FACTURE",1,1);


$pdf->Cell(50,10,"quantite :",1,0);
$pdf->Cell(50,10,$_GET['qte_prod'],1,1);
$pdf->Cell(50,10,"prix :",1,0);
$pdf->Cell(50,10,$_GET['prix_total'],1,1);

$pdf->output();



?>
