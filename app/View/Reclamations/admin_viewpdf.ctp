<?php 
//debug($reclam);die;
App::import('Vendor','pdf/fpdf');  


$pdf = new FPDF('P', 'mm','A4', true, 'cp1250', false);
$pdf->SetMargins(7, 7, 7);
$pdf->AliasNbPages();
$pdf->AddPage();
 
$pdf->SetFont("arial", 'B', 15);
$pdf->SetTextColor(0, 0, 0);
 //$pdf->SetTitle('Fiche Déclaration de panne Véhicule',$title);

$pdf->Rect(5,50,200,220,'D');
  $pdf->Cell(30, 20, utf8_decode('Déclaration Num :')." ".$reclam['Reclamation']['identifiant'],0,1,'');
  
  $pdf->SetFont("arial", 'B', 10);
  $pdf->Cell(50,10, utf8_decode('Date de La déclaration : '));  $pdf->SetFont("arial", '', 9);$pdf->Cell(30,10, $this->Time->format('d/M/Y',$reclam['Reclamation']['created']),0,1,'L');
   $pdf->SetFont("arial", 'B', 10);
   $pdf->Cell(50,10, utf8_decode('Parc auto du Site  : '));  $pdf->SetFont("arial", '', 9);$pdf->Cell(30,10, $site["Site"]["nom"],0,1,'L');
   $pdf->SetFont("arial", 'B', 10);
   $pdf->Cell(50,10, utf8_decode('Déclarant : '));  $pdf->SetFont("arial", '', 9);$pdf->Cell(30,10, $reclam["User"]["nom"],0,1,'L');
   $pdf->SetFont("arial", 'B', 10);
   $pdf->Cell(50,10, utf8_decode('Status de la déclaration  : '));  $pdf->SetFont("arial", '', 9);$pdf->Cell(30,10, utf8_decode($reclam["Statu"]["label"]),0,1,'L');
    $pdf->SetFont("arial", 'B', 10);
  $pdf->Cell(50,10, utf8_decode('Type de panne : '));  $pdf->SetFont("arial", '', 9);$pdf->Cell(30,10, $reclam['Panne']['label'],0,1,'L');
   
   $pdf->Rect(20,100,175,35,'D');
    $pdf->Cell(15); $pdf->SetFont("arial", 'B', 11);$pdf->Cell(50,10, utf8_decode('Détails Véhicule'),0,1,'');
   $pdf->SetFont("arial", 'I', 10);
    $pdf->Cell(20);$pdf->Cell(50,5, utf8_decode('Matricule du véhicule : '));  $pdf->SetFont("arial", '', 9);$pdf->Cell(30,5, $reclam["Vehicule"]["matricule"],0,1,'L');
   $pdf->SetFont("arial", 'I', 10);
   $pdf->Cell(20); $pdf->Cell(50,5, utf8_decode('Marque du véhicule : '));  $pdf->SetFont("arial", '', 9);$pdf->Cell(30,5, $reclam["Vehicule"]["marque"],0,1,'L');
    $pdf->SetFont("arial", 'I', 10);
    $pdf->Cell(20);$pdf->Cell(50,5, utf8_decode('Modéle du véhicule : '));  $pdf->SetFont("arial", '', 9);$pdf->Cell(30,5, $reclam["Vehicule"]["model"],0,1,'L');
   $pdf->SetFont("arial", 'I', 10);
   $pdf->Cell(20); $pdf->Cell(50,5, utf8_decode('Date de mise en circulation : '));  $pdf->SetFont("arial", '', 9);$pdf->Cell(30,5, $this->Time->format($reclam["Vehicule"]["date_circulation"]),0,1,'L');
   
    $pdf->Cell(10,10,'',0,1,'');
    $pdf->Rect(20,140,175,40,'D');
    $pdf->Cell(15); $pdf->SetFont("arial", 'B', 11);$pdf->Cell(50,10, utf8_decode('Détails Mécanicien '),0,1,'');
   $pdf->SetFont("arial", 'I', 10);
    $pdf->Cell(20);$pdf->Cell(50,5, utf8_decode('Nom Social : '));  $pdf->SetFont("arial", '', 9);$pdf->Cell(30,5, utf8_decode($reclam["Reparator"]["ste"]),0,1,'L');
   $pdf->SetFont("arial", 'I', 10);
   $pdf->Cell(20); $pdf->Cell(50,5, utf8_decode('Non Contact : '));  $pdf->SetFont("arial", '', 9);$pdf->Cell(30,5, utf8_decode($reclam["Reparator"]["nom_contact"]),0,1,'L');
    $pdf->SetFont("arial", 'I', 10);
    $pdf->Cell(20);$pdf->Cell(50,5, utf8_decode('Adresse : '));  $pdf->SetFont("arial", '', 9);$pdf->Cell(30,5, utf8_decode($reclam["Reparator"]["adresse"]),0,1,'L');
   $pdf->SetFont("arial", 'I', 10);
   $pdf->Cell(20); $pdf->Cell(50,5, utf8_decode('Tel/Fax : '));  $pdf->SetFont("arial", '', 9);$pdf->Cell(30,5,$reclam["Reparator"]["tel"].' / '.$reclam["Reparator"]["fax"],0,1,'L');
    $pdf->SetFont("arial", 'I', 10);
   $pdf->Cell(20); $pdf->Cell(50,5, utf8_decode('Mail : '));  $pdf->SetFont("arial", '', 9);$pdf->Cell(30,5,$reclam["Reparator"]["mail"],0,1,'L');
   
    $pdf->Cell(10,5,'',0,1,'');
   $pdf->SetFont("arial", 'B', 10);
  $pdf->Cell(50,10, utf8_decode('Détails panne : '),0,1,''); 
   $pdf->Rect(35,185,130,60,'D');
   $pdf->SetFont("arial", '', 9);
    $pdf->Cell(30);$pdf->MultiCell(100,5,utf8_decode($reclam["Reclamation"]["panne"]),0,'j');
   
   
$pdf->Output($reclam['Reclamation']['identifiant'] . ".pdf", "D");

  
?>


