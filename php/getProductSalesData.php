<?php

include "/broker.php";


$b = new Broker();

$b->open();

$result = $b->returnProductSalesByMonth();


    $data = array();
    $row = array();
    $rows = array();
	$i = 0;
	while($row = $result->fetch_object())
{
		
		$phpdate = strtotime( $row->datum );
		
$mysqldate = date('Y, m, d',$phpdate);
$delim = explode(", ", $mysqldate);
		
		$i++;
		
		
    $data=  array (
        0 => 
        array (
          'v' => "Date(".$delim[0].", ".intval($delim[1]-1).", ".$delim[2].")",
        ),
        1 => 
        array (
          'v' => intval($row->ukupno),
        ),

      );
	  
	      $row = array (
      'c' => $data
     
    );
    
    
    array_push($rows, $row);
}
	



$cols = array (
    0 => 
    array (
      'label' => 'Datum',
      'type' => 'date',
    ),

    1 => 

	array (
      'label' => 'Prodaja',
      'type' => 'number',
    ),
  );


$data = array (
  'cols' => $cols,
  'rows' => $rows
  
);

echo json_encode($data);

?>