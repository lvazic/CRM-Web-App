<?php

include "/broker.php";

$b = new Broker();
$b->open();

$result = $b->returnDelatnost();

$rows = array();
while($row = $result->fetch_object())
{
    $rows[] = $row;
}

 
//Return result to jTable
echo json_encode($rows);
$b->close();

?>