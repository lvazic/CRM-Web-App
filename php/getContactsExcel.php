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
    header('Content-Type: application/vnd.ms-excel');
    $ime = "Adresar ".$datum.".xls";
    header('Content-Disposition: attachment;filename='.$ime.'');
    header('Cache-Control: max-age=0');
    $objPHPExcel->getActiveSheet()->setTitle('Adresar');
    $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
    $objWriter->save('php://output');



?>