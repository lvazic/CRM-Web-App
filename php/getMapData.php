<?php


$url = 'http://localhost/crm/ws/mapdata';

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_HTTPHEADER, array('Accept: application/json'));
curl_setopt($curl, CURLOPT_HTTPGET, false);
$curl_odgovor = curl_exec($curl);
curl_close($curl);
echo $curl_odgovor;

/* $rating = json_decode($curl_odgovor);

    $data = array();
    $row = array();
    $rows = array();
foreach ($rating as $rat){
  
    $data=  array (
        0 => 
        array (
          'v' => $rat->rating,
        ),
        1 => 
        array (
          'v' => intval($rat->broj),
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
      'label' => 'Rating',
      'type' => 'string',
    ),
    1 => 
    array (
      'label' => 'Broj',
      'type' => 'number',
    ),
  );


$data = array (
  'cols' => $cols,
  'rows' => $rows
  
);

echo json_encode($data); */

?>