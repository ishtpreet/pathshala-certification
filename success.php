<?php
session_start();
$serial = $_SESSION['certnumber'];
$event = $_SESSION['event'];
require_once 'config.php';
require_once 'vendor/autoload.php';

$query = mysql_query("SELECT * FROM $event WHERE `cert number` = '$serial'");
$row = mysql_fetch_array($query);

function test()
{
$serial = $_SESSION['certnumber'];
$event = $_SESSION['event'];
$query = mysql_query("SELECT * FROM $event WHERE `cert number` = '$serial'");
$row = mysql_fetch_array($query);
$pdf = new FPDF('L');
$pdf->AddPage();
$pdf->Image('templates/cert.jpg',0,0,297,210);

$pdf->AddFont('Lucida Console','','Lucida Console.php');
$pdf->SetTextColor(190,140,39);
$pdf->SetFont('Lucida Console','',32);
$pdf->SetXY(10, 94);
$pdf->Cell(0,10,$row['name'],0,0,'C');
//$pdf->Write(0, $row['name']);


$pdf->AddFont('Montserrat-Medium','','Montserrat-Medium.php');
$pdf->SetTextColor(0,0,0);
$pdf->SetFont('Montserrat-Medium','',14);
$pdf->SetXY(136, 130);
$pdf->Write(0, $row['cert number']);

$pdf->SetFont('Montserrat-Medium','',14);
$pdf->SetXY(235, 148);
$pdf->Write(0, "2020");

$pdf->Output('',$serial,'');
}

switch($event)
{
	case "test":test();
	break;

}
