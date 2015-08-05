<?php  

include "/broker.php";

$b = new Broker();

$b->open();

$result = $b->returnSupplies();

require_once 'Classes/PHPExcel.php';

    $objPHPExcel = new PHPExcel();
    $i = 2;
    while($row = $result->fetch_object()){
        $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A'.$i, $row->naziv)
            ->setCellValue('B'.$i, $row->kolicina);

        $i++;
    }

    $objPHPExcel->getActiveSheet()->SetCellValue('A1', 'Naziv proizvoda');
    $objPHPExcel->getActiveSheet()->SetCellValue('B1', 'Količina proizvoda');
	
	$objPHPExcel->getActiveSheet()
    ->getColumnDimension('A')
    ->setWidth(50);
		$objPHPExcel->getActiveSheet()
    ->getColumnDimension('B')
    ->setWidth(20);
	
	$objPHPExcel->getActiveSheet()->getStyle('A1:B1')->getFont()->setBold(true);



    $datum = Date("d.m.Y");
    header('Content-Type: application/vnd.ms-excel');
    $ime = "Zalihe na datum ".$datum.".xls";
    header('Content-Disposition: attachment;filename='.$ime.'');
    header('Cache-Control: max-age=0');
    $objPHPExcel->getActiveSheet()->setTitle('Adresar');
    $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
    $objWriter->save('php://output');



?>