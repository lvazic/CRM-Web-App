<?php  

include "/broker.php";

$b = new Broker();

$b->open();

$result = $b->returnAllContacts();

require_once 'Classes/PHPExcel.php';

    $objPHPExcel = new PHPExcel();
    $i = 2;
    while($row = $result->fetch_object()){
        $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A'.$i, $row->imeprezime)
            ->setCellValue('B'.$i, $row->telefon)
			->setCellValue('C'.$i, $row->email)
			->setCellValue('D'.$i, $row->naziv);

        $i++;
    }

    $objPHPExcel->getActiveSheet()->SetCellValue('A1', 'Ime i prezime');
    $objPHPExcel->getActiveSheet()->SetCellValue('B1', 'Telefon');
	    $objPHPExcel->getActiveSheet()->SetCellValue('C1', 'Email');
    $objPHPExcel->getActiveSheet()->SetCellValue('D1', 'Kompanija');
	
	$objPHPExcel->getActiveSheet()
    ->getColumnDimension('A')
    ->setWidth(20);
		$objPHPExcel->getActiveSheet()
    ->getColumnDimension('B')
    ->setWidth(20);
		$objPHPExcel->getActiveSheet()
    ->getColumnDimension('C')
    ->setWidth(30);
		$objPHPExcel->getActiveSheet()
    ->getColumnDimension('D')
    ->setWidth(50);
	
	$objPHPExcel->getActiveSheet()->getStyle('A1:D1')->getFont()->setBold(true);



    $datum = Date("d.m.Y");
    header('Content-Type: application/pdf');
    $ime = "Adresar ".$datum.".pdf";
    header('Content-Disposition: attachment;filename='.$ime.'');
    header('Cache-Control: max-age=0');
    $objPHPExcel->getActiveSheet()->setTitle('Adresar');
	
$rendererName = PHPExcel_Settings::PDF_RENDERER_TCPDF;
//$rendererLibrary = 'tcPDF5.9';
//$rendererLibrary = 'mPDF5.4';
$rendererLibrary = 'tcpdf';
$rendererLibraryPath = "Classes/".$rendererLibrary;
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'PDF');	
	
	
$objWriter = new PHPExcel_Writer_PDF($objPHPExcel);
$objWriter->save('php://output');



?>