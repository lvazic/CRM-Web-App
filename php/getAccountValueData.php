<?php

include "/broker.php";

$b = new Broker();
$b->open();
$kid = $_GET['kid'];
$result = $b->returnAccountValue($kid);


    $data = array();
    $row = array();
    $rows = array();
	while($row = $result->fetch_object())
{
    $data=  array (
        0 => 
        array (
          'v' => $row->naziv,
        ),
        1 => 
        array (
          'v' => floatval($row->ukupno),
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
      'label' => 'Account',
      'type' => 'string',
    ),
    1 => 
    array (
      'label' => 'Ukupna vrednost',
      'type' => 'number',
    ),
  );


$data = array (
  'cols' => $cols,
  'rows' => $rows
  
);

echo json_encode($data);

?>