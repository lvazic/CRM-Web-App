<?php

include "/broker.php";

$b = new Broker();
$b->open();

$result = $b->returnSupplies();


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
          'v' => intval($row->kolicina),
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
      'label' => 'Naziv',
      'type' => 'string',
    ),
    1 => 
    array (
      'label' => 'Količina',
      'type' => 'number',
    ),
  );


$data = array (
  'cols' => $cols,
  'rows' => $rows
  
);

echo json_encode($data);

?>