<?php
/*
	case 'I':	//Send to standard output
	case 'D':	//Download file
	case 'F':	//Save to local file
	case 'S':	//Return as a string
*/

 	define('FPDF_FONTPATH','../_fpdf/font/');
 	ob_start();
 	include(dirname(__FILE__).'/data.html');
	$content = ob_get_clean();
	
	// conversion HTML => PDF
	require_once('../html2pdf.class.php');
	$html2pdf = new HTML2PDF('P','A4','en');
	// $html2pdf->setModeDebug();
	$html2pdf->AddFont('impact','','impact.php');
	$html2pdf->AddFont('comic','','comic.php');
	$html2pdf->setDefaultFont('Arial');
	$html2pdf->WriteHTML($content, isset($_GET['vuehtml']));
	$html2pdf->Output('data.pdf','D');
?>