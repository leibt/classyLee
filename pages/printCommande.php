<?php
require '../admin/lib/php/dbConnect.php';
require '../admin/lib/php/classes/Connexion.class.php';
require '../admin/lib/php/classes/Vue_commandeDB.class.php';

$cnx = Connexion::getInstance($dsn, $user, $pass);

$obj = new Vue_commandeDB($cnx);
$com = $obj->getCommande($_GET['id']);

$details=$obj->getDetails($_GET['id']);
$nbr = count($details);
//var_dump($com);
require '../admin/lib/php/fpdf/fpdf181/fpdf.php';


$pdf=new FPDF('P','cm','A4');
$pdf->AddPage();
$pdf->SetFont('Times','',25);
$pdf->SetDrawColor(0,0,0);
$pdf->SetFillColor(255,255,255);
//$pdf->SetTextColor(255,255,255);
$pdf->SetXY(2.5,3);
$pdf->Cell(16,4,'C l a s s y  L e e',1,1,'C',1);


/*$pdf->SetDrawColor(0,0,0);
$pdf->SetFillColor(255,255,255);
$pdf->SetTextColor(0,0,0);
$pdf->SetXY(0,3);
$pdf->Cell(0,0,'C l a s s y  L e e',1,0,'C');*/



//$pdf->SetDrawColor(0,0,0);
//$pdf->SetFillColor(255,255,255);
$pdf->SetTextColor(0,0,0);
$pdf->SetFont('Times','',10);


$pdf->SetXY(2.5,8);
$pdf->Cell(0,0,'Merci pour votre commande chez Classy Lee',0,0,'L',1);

$pdf->SetXY(2.5,9);
$pdf->SetFont('Times','B',11);
$pdf->SetTextColor(102, 102, 102);
$pdf->Cell(0,1,"NUMERO DE COMMANDE : ".$com[0]['id_commande'],0,1,'L',1);

$pdf->SetXY(2.5,9.60);
$pdf->SetFont('Times','',10);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(0,1,"Date de la commande : ".$com[0]['date_commande'],0,1,'L',1);

$pdf->SetXY(2.5,11);
$pdf->SetFont('Times','I',13);
$pdf->SetTextColor(102, 102, 102);
$pdf->Cell(0,1,utf8_decode("Vos informations "),0,1,'L',1);

$pdf->SetXY(2.5,12);
$pdf->SetFont('Times','',11);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(0,1,"NOM : ".$com[0]['nom'],0,1,'L',1);

$pdf->SetXY(2.5,12.50);
$pdf->SetFont('Times','',11);
$pdf->Cell(0,1,"PRENOM : ".$com[0]['prenom'],0,1,'L',0);

$pdf->SetXY(2.5,13);
$pdf->SetFont('Times','',11);
$pdf->Cell(0,1,"ADRESSE : ".$com[0]['adresse']."  ".$com[0]['cp'],0,1,'L',0);

$pdf->SetXY(2.5,13.5);
$pdf->SetFont('Times','',11);
$pdf->Cell(0,1,"TELEPHONE : ".$com[0]['telephone'],0,1,'L',0);

$pdf->SetXY(2.5,15);
$pdf->SetFont('Times','I',13);
$pdf->SetTextColor(102, 102, 102);
$pdf->Cell(0,1,utf8_decode("Détails de votre commande"),0,1,'L',1);


$pdf->SetFont('Times','',11);
$pdf->SetTextColor(0,0,0);
$pdf->SetXY(2.5,16);
$pdf->Cell(16,1,  utf8_decode("REF"),0,1,'L',1);

$pdf->SetXY(4.5,16);
$pdf->Cell(16,1,  utf8_decode("LIBELLE"),0,1,'L',1);

$pdf->SetXY(9.5,16);
$pdf->Cell(16,1,  utf8_decode("TAILLE"),0,1,'L',1);

$pdf->SetXY(12.5,16);
$pdf->Cell(16,1,  utf8_decode("PRIX U"),0,1,'L',1);

$pdf->SetXY(15.5,16);
$pdf->Cell(16,1,  utf8_decode("QUANTITE"),0,1,'L',1);

$x=2.5;
$y=17;
for($i=0;$i<$nbr;$i++){
    $pdf->SetXY($x,$y);
    $pdf->Cell(16,1,$details[$i]['id_produit'],0,1,'L',1);
    
    $pdf->SetXY($x+2,$y);
    $pdf->Cell(16,1,$details[$i]['libelle'],0,1,'L',1);
    
    $pdf->SetXY($x+7.5,$y);
    $pdf->Cell(16,1,$details[$i]['taille'],0,1,'L',1);
    
    $pdf->SetXY($x+10.2,$y);
    $pdf->Cell(16,1,$details[$i]['prix'],0,1,'L',1);
    
    $pdf->SetXY($x+14,$y);
    $pdf->Cell(16,1,$details[$i]['quantite_com'],0,1,'L',1);
    
    /*$pdf->SetX(12,$y);
    $pdf->Cell(16,1,$liste[$i]['prix_unitaire'],0,1,'L',1);*/
    $y+=0.8;
}


$pdf->SetFont('Times','',13);
$pdf->SetXY(0,$y+2);
$pdf->Cell(16,1,"TOTAL : ".$com[0]['total'],0,1,'R',1);
/*$pdf->SetDrawColor(0,0,0);
$pdf->SetFillColor(255,255,255);
$pdf->SetTextColor(0,0,0);
$pdf->SetFont('Arial','',12);
$pdf->SetXY(2.5,4);
$x=2.5;
$y=4;
for($i=0;$i<$nbr;$i++){
    $pdf->SetXY($x+0.5,$y);
    $pdf->Cell(16,1,  utf8_decode($liste[$i]['nom_gateau']),0,1,'L',1);
    $pdf->SetX(12,$y);
    $pdf->Cell(16,1,$liste[$i]['prix_unitaire'],0,1,'L',1);
    $y+=0.8;
}
*/

$pdf->Output();

 
?>