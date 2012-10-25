<?php 
//debug($reclam);die;
App::import('Vendor','pdf/fpdf');  


$pdf = new FPDF('P', 'mm','A4', true, 'UTF-8', false);
$pdf->SetMargins(7, 7, 7);
$pdf->AliasNbPages();
$pdf->AddPage();
 
$pdf->SetFont("arial", 'B', 10);
$pdf->SetTextColor(0, 0, 0);
 //$pdf->SetTitle('Fiche Déclaration de panne Véhicule',$title);
 

  $pdf->Cell(20, 20, 'Déclaration'." ".$reclam['Reclamation']['identifiant']);

 
$pdf->Output($reclam['Reclamation']['identifiant'] . ".pdf", "D");
/*Output("fiche'".$reclam['Reclamation']['identifiant']."'.pdf", 'D');
$tcpdf = new XTCPDF('P', 'mm','A4', true, 'UTF-8', false); 
$textfont = 'freesans'; // looks better, finer, and more condensed than 'dejavusans' 
  
  
  // set document information
 
$tcpdf->SetAuthor("SNDP"); 
$tcpdf->SetAutoPageBreak( false ); 
$tcpdf->SetTitle('Déclaration de panne');
$tcpdf->setHeaderFont(array($textfont,'',10)); 
$tcpdf->SetSubject('Panne ');
//$pdf->SetKeywords('TCPDF, PDF, example, test, guide');
  
  // set default header data
  $tcpdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 001', PDF_HEADER_STRING, array(0,64,255), array(0,64,128));

 // $image = $tcpdf->Image('img/logosndp.png', 30, 30, 30, 30, 'PNG', '', '', true, 50, '', false, false, 1, false, false, false);
//$tcpdf->setHeaderData($image, '30', 'SNDP'.' 001', 'Fiche Déclaration de panne Véhicule');
$tcpdf->xheadertext = 'Fiche Déclaration de panne Véhicule'; 
$tcpdf->xfootertext = 'SNDP ©  . Tous les droits réservés.'; 
//$tcpdf->xheadercolor = array(0,0,100);
 /*
$tcpdf->SetAuthor("SNDP"); 
$tcpdf->SetAutoPageBreak( false ); 
$tcpdf->setHeaderFont(array($textfont,'',10)); 
//$tcpdf->SetHeaderData( $image , '10', 'SNDP'.' 009', 'Fiche Déclaration de panne Véhicule');
$tcpdf->SetHeaderData('img/logosndp.png', '150', 'SNDP'.' 009', 'Fiche Déclaration de panne Véhicule');
// $tcpdf->xheadercolor = array(150,0,0); 
$tcpdf->xheadertext = 'Fiche Déclaration de panne Véhicule'; 
$tcpdf->xfootertext = 'SNDP ©  . Tous les droits réservés.'; 
//$tcpdf->setPrintHeader(false);
// add a page (required with recent versions of tcpdf) 
$tcpdf->AddPage(); 
//$tcpdf->Image('img/logosndp.png', 30, 30, 30, 30, 'PNG', '', '', true, 50, '', false, false, 1, false, false, false);

// Now you position and print your page content 
// example:  
$tcpdf->SetTextColor(0, 0, 0); 
$tcpdf->SetFont($textfont,'B',20); 
//$tcpdf->Cell(0,14, "Fiche de déclaration de panne Véhicule", 0,1,'L'); 

 //$subtable = '<table border="1" cellspacing="6" cellpadding="4"><tr><td>a</td><td>b</td></tr><tr><td>c</td><td>d</td></tr></table>';

//$html =  "<div class=\"logo\">" ;
 //$html=$this->Html->image('img/logosndp.png', array('alt' => 'AGIL'))     

 $html= $reclam['Reclamation']['identifiant'] ;

 
 //$tcpdf->writeHTML($html, true, false, true, false, '');
// ... 
// etc. 
// see the TCPDF examples  
/
$tcpdf->AddPage(); 
$html= $reclam['Reclamation']['identifiant'] ;
$tcpdf->writeHTML($html, true, false, true, false, '');
echo $tcpdf->Output("fiche'".$reclam['Reclamation']['identifiant']."'.pdf", 'D'); 
 * 
 * 
 */
  
?>