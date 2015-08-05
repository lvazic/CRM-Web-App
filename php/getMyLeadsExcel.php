<?php  

include "/broker.php";

$kid = $_GET['kid'];


$b = new Broker();

$b->open();

$result = $b->returnAssignedLeads($kid);

require_once 'Classes/PHPExcel.php';

    $objPHPExcel = new PHPExcel();
    $i = 2;
    while($row = $result->fetch_object()){
        $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A'.$i, $row->naziv)
            ->setCellValue('B'.$i, $row->telefon)
			->setCellValue('C'.$i, $row->email)
			->setCellValue('D'.$i, $row->websajt)
			->setCellValue('E'.$i, $row->potencijal)
			->setCellValue('F'.$i, $row->delatnost)
			->setCellValue('G'.$i, $row->napomene);


        $i++;
    }

    $objPHPExcel->getActiveSheet()->SetCellValue('A1', 'Naziv kompanije');
    $objPHPExcel->getActiveSheet()->SetCellValue('B1', 'Telefon');
	    $objPHPExcel->getActiveSheet()->SetCellValue('C1', 'Email');
    $objPHPExcel->getActiveSheet()->SetCellValue('D1', 'Websajt');
	    $objPHPExcel->getActiveSheet()->SetCellValue('E1', 'Potencijal');
		$objPHPExcel->getActiveSheet()->SetCellValue('F1', 'Delatnost');
		$objPHPExcel->getActiveSheet()->SetCellValue('G1', 'Napomene');
	
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
			$objPHPExcel->getActiveSheet()
    ->getColumnDimension('E')
    ->setWidth(15);
				$objPHPExcel->getActiveSheet()
    ->getColumnDimension('F')
    ->setWidth(15);
				$objPHPExcel->getActiveSheet()
    ->getColumnDimension('G')
    ->setWidth(50);
	
	$objPHPExcel->getActiveSheet()->getStyle('A1:G1')->getFont()->setBold(true);
	$objPHPExcel->getActiveSheet()->getStyle('A1:G1')->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_RED);



    $datum = Date("d.m.Y");
    header('Content-Type: application/vnd.ms-excel');
    $ime = "Moji Leadovi ".$datum.".xls";
    header('Content-Disposition: attachment;filename='.$ime.'');
    header('Cache-Control: max-age=0');
    $objPHPExcel->getActiveSheet()->setTitle('Adresar');
    $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
    $objWriter->save('php://output');



?>